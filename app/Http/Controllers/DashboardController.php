<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){


        return view('dashboard.index');
    }

    public function cliente(){
        return "Dashboard do cliente";
    }
}
