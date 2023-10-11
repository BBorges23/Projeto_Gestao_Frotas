<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', function () { return view('index'); });


/**
 * Admin
 */
Route::prefix('/admin')->group(function (){
   Route::name('admin.')->group(function (){
      Route::get('/index',[DashboardController::class,'admin'])->name('index');


       Route::resource('vehicles',VehicleController::class);
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
    });

});


/**
 * Drivers
 */
