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
    /**
     * Exibe o dashboard quando o utilizador está autenticado.
     */
    public function autenticado()
    {
        // Verifica se o utilizador está autenticado
        if(auth()->check()) {
            // Retorna a view do dashboard com informações sobre motoristas, veículos, manutenções e viagens
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
        // Se o utilizador não estiver autenticado, redireciona para a página de login
        return view('auth.login');
    }
}
