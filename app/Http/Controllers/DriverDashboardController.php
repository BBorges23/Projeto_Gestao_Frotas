<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class DriverDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $driver = $user->driver;

        $travels = $driver->travel;

        $vehicles = $driver->vehicle;
        $vehicleIds = $vehicles->pluck('id')->toArray();
        $maintenances = Maintenance::whereIn('vehicle_id', $vehicleIds)->get();

        return view('pages.driverdashboard.index', [
            'driver' => $driver,
            'maintenances' => $maintenances,
            'travels' => $travels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.driverdashboard.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
