<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.travel.index', ['travels'=>Travel::all()]);
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
        $data = $request->all();
        $travel = new Travel($data);
        $travel->save();
        return redirect()->route('admin.travels.show',$travel);
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
        $data = $request->all();
        $travel->update($data);
        $travel->save();
        return redirect()->route('admin.travels.show', ['travel' => $travel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        $travel->delete();
        return redirect()->route('admin.travels.index');
    }
}
