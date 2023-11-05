<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Maintenance;
use App\Models\Travel;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function autenticado()
    {
        if(auth()->check()) {

            return view('home', [
                'active_drivers' => Driver::all()->where('condition', "DISPONIVEL")->count(),
                'active_vehicles' => Vehicle::where('condition','DISPONIVEL')->count(),
                'active_maintenances' => Maintenance::where('state','PROCESSANDO')->count(),
                'active_travels' => Travel::where('state','PROCESSANDO')->count(),
                'tot_drives'=> Driver::all()->count(),
                'tot_vehicles' => Vehicle::all()->count(),
                'tot_travels'=> Travel::all()->count(),
                'tot_maintenances'=> Maintenance::all()->count()
            ]);
        }
        return view('auth.login');
    }
}
