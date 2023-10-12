<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\TravelController;

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

Route::get('/models' ,[BrandController::class, 'index'])->name('models.index');
Route::get('/', function () { return 'ola abelhasSSS'; });


/**
 * Admin
 */
Route::prefix('/admin')->group(function (){
   Route::name('admin.')->group(function (){
      Route::get('/index',[DashboardController::class,'admin'])->name('index');

       Route::resource('vehicles',VehicleController::class);
       Route::resource('brands', BrandController::class);
       Route::resource('models', CarModelController::class);
       Route::resource('drivers', DriverController::class);
       Route::resource('maintenances', MaintenanceController::class);
       Route::resource('travels', TravelController::class);
   });
});



//-----Clientes-----//

/**
 * Vehicle
 */
Route::prefix('/cliente')->group(function (){
    Route::name('vehicle.')->group(function (){
        Route::get('/home',[VehicleController::class,'index'])->name('home');

        Route::resource('vehicles',VehicleController::class)
            ->only('show','index');
        Route::resource('brands', BrandController::class)
            ->only('show','index');
        Route::resource('models', CarModelController::class)
            ->only('show','index');
        Route::resource('drivers', DriverController::class)
            ->only('show','index');
        Route::resource('maintenances', MaintenanceController::class)
            ->only('show','index');
        Route::resource('travels', TravelController::class)
            ->only('show','index');
    });

});


/**
 * Drivers
 */
