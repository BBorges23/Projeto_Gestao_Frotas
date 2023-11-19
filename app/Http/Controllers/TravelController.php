<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TravelController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos',
        'max' => 'Coordenadas tem de estar entre 3 e 255 carateres'

    ];

    protected $rules_create = [
        'vehicle_id' => 'required',
        'driver_id' => 'required',
        'coords_origem'=>'required|max:255',
        'coords_destino' => 'required|max:255',
        'date_start'=> 'required',
        'date_end'=> 'required'
    ];

    protected $rules_update = [
        'vehicle_id' => 'required',
        'driver_id' => 'required',
        'coords_origem'=>'required|max:255',
        'coords_destino' => 'required|max:255',
        'state' => 'required'
    ];

    public function pesquisar(Request $request)
    {
        // Atualiza ou remove os estados selecionados se o formulário de estados foi submetido
        if ($request->has('status')) {
            $selectedStatuses = $request->input('status', []);
            session(['selectedStatuses' => $selectedStatuses]);
        } elseif ($request->has('deselect_status')) {
            // Se uma checkbox foi desmarcada, remove esse estado da sessão
            $deselectedStatus = $request->input('deselect_status');
            $selectedStatuses = session('selectedStatuses', []);
            if(($key = array_search($deselectedStatus, $selectedStatuses)) !== false) {
                unset($selectedStatuses[$key]);
            }
            session(['selectedStatuses' => $selectedStatuses]);
        } else {
            // Se o formulário de estados não foi submetido, usa os estados da sessão
            $selectedStatuses = session('selectedStatuses', []);
        }

        // Recebe a pesquisa de texto se foi submetida
        $pesquisa = $request->input('campo_de_pesquisa', '');

        // Inicia a consulta com os joins necessários
        $query = Travel::query()
            ->select('travels.*', 'vehicles.licence_plate as vehicle_licence_plate', 'users.name as driver_name') // Especifica as colunas e usa alias para evitar conflito
            ->join('vehicles', 'travels.vehicle_id', '=', 'vehicles.id')
            ->join('drivers', 'travels.driver_id', '=', 'drivers.id')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->distinct(); // Adiciona distinct para evitar duplicatas

        // Se houver estados selecionados, filtra as viagens que correspon
        //dem a qualquer um dos estados selecionados
        if (!empty($selectedStatuses)) {
            $query->whereIn('travels.driver_state', $selectedStatuses);
        }

        // Aplica a pesquisa de texto independentemente dos estados selecionados
        if (!empty($pesquisa)) {
            $query->where(function ($subquery) use ($pesquisa) {
                $subquery->where('vehicles.licence_plate', 'like', '%' . $pesquisa . '%')
                    ->orWhere('users.name', 'like', '%' . $pesquisa . '%')
                    ->orWhere('travels.coords_origem', 'like', '%' . $pesquisa . '%')
                    ->orWhere('travels.coords_destino', 'like', '%' . $pesquisa . '%');
            });
        }
        $query->groupBy('travels.id');
        // Obtém os resultados da consulta
        $resultados = $query->get();

        // Retorna a view com as viagens filtradas
        return view('pages.travel.index', compact('resultados'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::where('state', 'PROCESSANDO')
            ->orderBy('updated_at', 'desc') // Adiciona ordenação por updated_at em ordem decrescente
            ->paginate(16);
//        $travels = Travel::paginate(16);

        return view('pages.travel.index',
            ['travels'=> $travels
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pages.travel.create',[
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules_create, $this->msg);
        $travel = new Travel($data);
        $travel->save();
        return redirect()->route(auth()->user()->getTypeUser().'.travels.show',$travel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {


        return view('pages.travel.show', [
            'travel' => $travel,
            'driver'=>  $travel->driver,
            'vehicle' => $travel->vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('pages.travel.edit',[
            'travel' => $travel,
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $newState = $request->input('state');

        if ($newState === 'CANCELADO') {
            $travel->is_traveling = 0;
            $travel->state = $newState;
        }
        elseif ($newState === 'CONCLUIDO')
        {
            $travel->is_traveling = 0;
            $travel->state = $newState;
        }
        else
        {
            $travel->is_traveling = 1;
            $travel->state = $newState;
        }

        $data = $request->validate($this->rules_update,$this->msg);
        $travel->update($data);
        $travel->save();
        return redirect()->route('admin.travels.show', ['travel' => $travel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        $travel->update(['is_traveling' => 0]);
        $travel->state = 'CANCELADO';
        $travel->save();
        $travel->delete();
        return redirect()->route('admin.travels.index');
    }

    public function cancel(Request $request, Travel $travel)
    {
        $user_log = User::where('id', auth()->user()->id)->first();
        $name = $user_log->name;
        $description = $travel->comments ."\n". date('d-m-Y H:i') . " - " . $name . ": " . $request->input('text');

        if ($description) {

            $travel->update(['state' => 'CANCELADO','is_traveling' => 0, 'comments' => $description]);
            $travel->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);
    }

    public function conclude(Request $request, Travel $travel)
    {
        $user_log = User::where('id', auth()->user()->id)->first();
        $name = $user_log->name;

        $description = $travel->comments ."\n". date('d-m-Y H:i') . " - " . $name . ": " . $request->input('text');

        if ($description) {

            $guarda_estado = $travel->driver_state;

            //driver
            if($guarda_estado === 'ACEITE' || $guarda_estado === 'PROBLEMAS')
            {
                $travel->update(['is_traveling' => 0, 'comments' => $description, 'driver_state' => 'CONCLUIDO']);
                $travel->save();

                $driver_condition = $travel->driver;

                if ($driver_condition) {
                    $driver_condition->condition = 'DISPONIVEL';
                    $driver_condition->save();
                }

                return response()->json(['message' => 'Descrição atualizada com sucesso']);
            }

            //gestor
            $travel->update(['state' => 'CONCLUIDO','is_traveling' => 0, 'comments' => $description]);
            $travel->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }
        return response()->json(['message' => 'Falha na atualização da descrição'], 400);
    }

    public function accept(Travel $travel)
    {
        $travel_active = Travel::where('driver_id', auth()->id())
            ->where('driver_state', 'ACEITE')
            ->first();


        if($travel_active)
        {
            return response()->json([
                'message' => 'Já tem viagem em andamento',403
            ]);
        }

        $travel->update(['is_traveling' => 1, 'driver_state' => 'ACEITE']);
        $travel->save();

        $driver_condition = $travel->driver;
        if ($driver_condition) {
            $driver_condition->condition = 'EM TRABALHO';
            $driver_condition->save();
        }

        return response()->json(['message' => 'Viagem aceite com sucesso']);
    }

    public function problems(Request $request,Travel $travel)
    {
        $user_log = User::where('id', auth()->user()->id)->first();
        $name = $user_log->name;

        $description = $travel->comments ."\n". date('d-m-Y H:i') . " - " . $name . ": " . $request->input('text');

        if($description)
        {
            $travel->update(['is_traveling' => 0, 'driver_state' => 'PROBLEMAS','comments'=>$description]);
            $travel->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);

    }
}
