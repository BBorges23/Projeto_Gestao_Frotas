<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $msg = [
        'required' => 'O nome do autor é obrigatório',
        'min' => 'O nome do autor terá que possuir pelo menos 2 letra',
        'max' => 'A biografia não pode conter mais que 500 caracteres'
    ];
    protected $rules = [
        'nome' => 'required|min:2',
        'bio' => 'nullable|max:500'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.vehicle.index',['vehicles' =>Vehicle::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.vehicle.create', ['models'=>CarModel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $vehicle = new Vehicle($dados);
        $vehicle->save();
        return redirect()->route('admin.vehicles.index');
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
            'models' => CarModel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $dados = $request->all();
        $vehicle->update($dados);
        $vehicle->save();
        return redirect()->route('admin.vehicles.show', ['vehicle'=>$vehicle]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {

        $vehicle->maintenance()->delete();
        $vehicle->travel()->delete();
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index');

    }
}
