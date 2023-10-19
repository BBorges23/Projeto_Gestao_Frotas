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
        'date_buy'=>'required'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['pagina_index_veiculos'=> 'Veículos']);

        $vehicles = Vehicle::paginate(3);

        return view ('pages.vehicle.index',
            ['vehicles' => $vehicles ]);
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
        $data = $request->all();
        $vehicle->update($data);
        $vehicle->save();
        return redirect()->route('admin.vehicles.show', ['vehicle'=>$vehicle]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //$vehicle->maintenance()->delete();
        //$vehicle->travel()->delete();
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index');
    }
}
