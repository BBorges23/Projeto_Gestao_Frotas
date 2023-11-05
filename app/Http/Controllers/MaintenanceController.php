<?php
namespace App\Http\Controllers;
use App\Models\Maintenance;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use function Sodium\add;

class MaintenanceController extends Controller
{
    protected $msg = [
        'required' => 'Preencha todos os campos'
    ];

    protected  $rules_create = [
        'vehicle_id' => 'required',
        'motive' => 'required',
        'date_entry' => 'required'

    ];

    protected  $rules_update = [
        'vehicle_id' => 'required',
        'motive' => 'required',
        'date_entry' => 'required',
        'date_exit' => 'required'

    ];


    public function pesquisar(Request $request){
        $pesquisa = $request->input('campo_de_pesquisa');

        if (empty($pesquisa)) {
            return redirect()->route(auth()->user()->getTypeUser().'.maintenances.index');
        }

        $resultados = Maintenance::join('vehicles', 'maintenances.vehicle_id', '=','vehicles.id')
            ->where('maintenances.motive', 'like', '%' . $pesquisa . '%')
            ->orWhere('vehicles.licence_plate', 'like', '%' . $pesquisa . '%')
            ->get();

        return view('pages.maintenance.index', compact('resultados'));
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $maintenances = Maintenance::where('state','PROCESSANDO')->paginate(16);

        return view('pages.maintenance.index', [
            'maintenances'=>$maintenances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.maintenance.create', [
            'vehicles'=>Vehicle::all()]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate($this->rules_create, $this->msg);

        $maintenance = new Maintenance($data);
        $maintenance->save();
        return redirect()->route(auth()->user()->getTypeUser().'.maintenances.show', $maintenance);
    }
    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        return view('pages.maintenance.show', [
            'maintenance' => $maintenance,
            'vehicle' => $maintenance->vehicle
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        return view('pages.maintenance.edit', [
            'maintenance' => $maintenance,
            'vehicles' => Vehicle::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)

    {
        $newState = $request->input('state');

        if ($newState === 'CANCELADO') {
            $maintenance->is_active = 0;
            $maintenance->state = $newState;
        }
        elseif ($newState === 'CONCLUIDO')
        {
            $maintenance->is_active = 0;
            $maintenance->state = $newState;
        }
        else
        {
            $maintenance->is_active = 1;
            $maintenance->state = $newState;
        }

        $data=$request->validate($this->rules_update, $this->msg);
        $maintenance->update($data);
        $maintenance->save();
        return view('pages.maintenance.show', ['maintenance' => $maintenance]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('admin.maintenances.index');
    }

    public function cancel(Request $request, Maintenance $maintenance)
    {
        $description = $request->input('text');

        if ($description) {

            $maintenance->update(['state' => 'CANCELADO','is_active' => 0, 'comments' => $description]);
            $maintenance->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);
    }

    public function conclude(Request $request, Maintenance $maintenance)
    {
        $description = $request->input('text');

        if ($description) {

            $guarda_estado = $maintenance->driver_state;

            //driver
            if($guarda_estado == 'ACEITE') {

                $maintenance->update(['driver_state' => 'CONCLUIDO', 'is_active' => 0, 'comments' => $description]);
                $maintenance->save();

                return response()->json(['message' => 'Descrição atualizada com sucesso']);

            }
            //gestor
            $maintenance->update(['state' => 'CONCLUIDO', 'is_active' => 0, 'comments' => $description]);
            $maintenance->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);
    }


    public function accept(Maintenance $maintenance)
    {
        $maintenance->update(['is_active' => 1, 'driver_state' => 'ACEITE']);
        $maintenance->save();

        return response()->json(['message' => 'Descrição atualizada com sucesso']);
    }

    public function problems(Request $request, Maintenance $maintenance)
    {
        $description = $request->input('text');

        if($description)
        {
            $maintenance->update(['is_active' => 0, 'driver_state' => 'PROBLEMAS','comments'=>$description]);
            $maintenance->save();

            return response()->json(['message' => 'Descrição atualizada com sucesso']);
        }

        return response()->json(['message' => 'Falha na atualização da descrição'], 400);

    }
}
