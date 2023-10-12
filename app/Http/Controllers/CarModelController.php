<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.carmodel.index', ['carmodel'=>CarModel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.carmodel.create',['brands' => Brand::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados=$request->all();
        $carmodel = new CarModel($dados);
        $carmodel->save();
        return redirect()->route('admin.models.show', $carmodel);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $carModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        //
    }
}
