<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Models\Travel;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function autenticado(){

        $user = auth()->user();
        $driver = $user->driver;
        $travels = $driver->travel;

        $vehicles = $driver->vehicle;
        $vehicleIds = $vehicles->pluck('id')->toArray();
        $maintenances = Maintenance::whereIn('vehicle_id', $vehicleIds)->get();

        return view('home', [
            'driver' => $driver,
            'maintenances' => $maintenances,
            'travels' => $travels
        ]);
    }

}
