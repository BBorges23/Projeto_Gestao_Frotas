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
//                'tot_drivers' => Driver::all()->where('condition', "ATIVO")->count(),
//                'tot_vehicles' => Vehicle::all()->where('is_driving', 0 and 'condition', "ATIVO")->count(),
//                'tot_maintenances' => Maintenance::all(),
//                'tot_travels' => Travel::all()
            ]);
        }
        return view('auth.login');

    }

}
