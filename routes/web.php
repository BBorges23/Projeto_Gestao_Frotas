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
use App\Http\Controllers\DriverDashboardController;

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
Route::get('/', [DashboardController::class,'autenticado'])->name('home');

Route::get('/login',[LoginController::class, 'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login']);

/**
 * Só users autenticados
 */
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/',[DashboardController::class,'autenticado'])->name('home');


/**
 * UpdateDescription Gestor
 */
Route::middleware('auth')->group(function (){
    Route::post('travels/update-description/{travel}', 'App\Http\Controllers\TravelController@updateDescription')->name('travels.updateDescription');
    Route::post('maintenances/update-description/{maintenance}', 'App\Http\Controllers\MaintenanceController@updateDescription')->name('maintenances.updateDescription');

});

/**
 * Pesquisas
 */
Route::middleware('auth')->group(function (){
    Route::post('brands/pesquisa', 'App\Http\Controllers\BrandController@pesquisar')->name('brands.pesquisa');
    Route::post('carmodels/pesquisa', 'App\Http\Controllers\CarmodelController@pesquisar')->name('carmodels.pesquisa');
    Route::post('drivers/pesquisa', 'App\Http\Controllers\DriverController@pesquisar')->name('drivers.pesquisa');
    Route::post('maintenances/pesquisa', 'App\Http\Controllers\MaintenanceController@pesquisar')->name('maintenances.pesquisa');
    Route::post('travels/pesquisa', 'App\Http\Controllers\TravelController@pesquisar')->name('travels.pesquisa');
    Route::post('vehicles/pesquisa', 'App\Http\Controllers\VehicleController@pesquisar')->name('vehicles.pesquisa');
});

/**
 * Admin permissões
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

/**
 * Gestor permissões
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
 * Driver permissões
 */
Route::middleware('role:driver')->group(function (){
    Route::prefix('/driver')->group(function (){
        Route::name('driver.')->group(function (){

            Route::resource('maintenances', MaintenanceController::class)
                ->only('index','show');
            Route::resource('travels', TravelController::class)
                ->only('index','show');
            Route::resource('home', DriverDashboardController::class)
                ->only('index', 'show');
        });
    });
});
