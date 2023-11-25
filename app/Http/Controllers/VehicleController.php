<?php
namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Travel;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class VehicleController extends Controller
{

    protected $msg = [
        'required' => 'Preencha todos os campos',
        'min' => 'Insira um ano entre 1950-2023',
        'max' => 'Insira um ano entre 1950-2023',
        'regex'=> 'Formato inválido para Matrícula (AA-11-BB)'
    ];
    protected $rules = [
        'carmodel_id'=>'required',
        'licence_plate' => 'required|regex:/^[A-Z]{2}-\d{2}-[A-Z]{2}$/',
        'year'=>'required|min:4|max:4',
        'date_buy'=>'required',
        'condition' => 'required',
    ];

    public function pesquisar(Request $request){
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

        $pesquisa = $request->input('campo_de_pesquisa');

        $query = Vehicle::query()
            ->select('vehicles.*') // Especifica as colunas e usa alias para evitar conflito
            ->distinct();

        if (!empty($selectedStatuses)) {
            $query->whereIn('vehicles.condition', $selectedStatuses);
        }

        if (!empty($pesquisa)) {
            $query->where(function ($subquery) use ($pesquisa) {
                $subquery->where('year', 'like', '%'.$pesquisa.'%')
                    ->orWhere('licence_plate', 'like', '%'.$pesquisa.'%');
            });
        }

        $query->groupBy('vehicles.id');

        $resultados = $query->paginate(18);
        return view('pages.vehicle.index', compact('resultados'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::where('condition', '!=', 'PERDA_TOTAL')
            ->paginate(18);

        return view('pages.vehicle.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.vehicle.create', ['carmodels'=>Carmodel::all()]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules,$this->msg);
        $vehicle = new Vehicle($data);
        $vehicle->save();
        return redirect()->route('admin.vehicles.show', $vehicle);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('pages.vehicle.show', [
            'vehicle' => $vehicle,
            'model' => $vehicle->model]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('pages.vehicle.edit', [
            'vehicle' => $vehicle,
            'carmodels' => Carmodel::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $newCondition = $request->input('condition');


        if ($newCondition === 'DISPONIVEL') {
            $vehicle->is_driving = 0;
            $vehicle->condition = $newCondition;
        }
        elseif ($newCondition === 'VENDIDO')
        {
            $vehicle->is_driving = 0;
            $vehicle->deleted_at = date('d-m-Y H:i');
            $vehicle->condition = $newCondition;
        }
        elseif($newCondition === 'PERDA_TOTAL')
        {
            $vehicle->is_driving = 0;
            $vehicle->deleted_at = date('d-m-Y H:i');
            $vehicle->condition = $newCondition;
        }
        elseif($newCondition === 'EM VIAGEM')
        {
            $vehicle->is_driving = 1;
            $vehicle->condition = $newCondition;
        }
        elseif($newCondition === 'EM MANUTENCAO')
        {
            $vehicle->is_driving = 0;
            $vehicle->condition = $newCondition;
        }

        $data = $request->validate($this->rules, $this->msg);
        $vehicle->update($data);
        $vehicle->save();

        if($newCondition === 'PERDA_TOTAL' || 'VENDIDO')
        {
            return redirect()->route('admin.vehicles.index');
        }
        else
            return redirect()->route('admin.vehicles.show', ['vehicle'=>$vehicle]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index');
    }

    public function history()
    {
        $vehicles = Vehicle::withTrashed()->get();

        return view('pages.vehicle.history',[
            'vehicles'=>$vehicles]);
    }

    public function delete(int $id)
    {
        $vehicles = Vehicle::withTrashed()->find($id);

        return view('pages.vehicle.show',[
            'model' => $vehicles->model,
            'vehicle'=>$vehicles]);
    }
}
