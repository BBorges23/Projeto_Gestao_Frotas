<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/**
 * Zona para guest - Users não autenticados
 */
Route::get('/', function () {
    return view('auth.login');
})->name('landing');

Route::get('/login',[LoginController::class, 'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login']);

/**
 * Só users autenticados
 */
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/home',[DashboardController::class,'autenticado'])->name('home');

/**
 * Admin
 */
Route::middleware('role:admin')->group(function (){
    Route::prefix('/admin')->group(function (){

        Route::name('admin.')->group(function (){
            Route::resource('vehicles',VehicleController::class);
            Route::resource('brands', BrandController::class);
            Route::resource('carmodels', CarmodelController::class);
            Route::resource('drivers', DriverController::class);
            Route::resource('maintenances', MaintenanceController::class);
            Route::resource('travels', TravelController::class);
        });
    });
});

//-----Clientes-----//
/**
 * Vehicle
 */
Route::middleware('role:gestor')->group(function (){
    Route::prefix('/gestor')->group(function (){
        Route::name('gestor.')->group(function (){

            Route::resource('vehicles',VehicleController::class)
                ->only('show','index');
            Route::resource('brands', BrandController::class)
                ->only('show','index');
            Route::resource('carmodels', CarmodelController::class)
                ->only('show','index');
            Route::resource('drivers', DriverController::class)
                ->only('show','index');
            Route::resource('maintenances', MaintenanceController::class)
                ->only('create','show','index');
            Route::resource('travels', TravelController::class)
                ->only('create','show','index');
        });
    });
});



/**
 * Drivers
 */
