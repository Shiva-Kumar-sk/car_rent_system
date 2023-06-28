<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[VehicleController::class,'index'])->name('car.home');
Route::get('/home/{id}',[VehicleController::class,'show'])->name('car.show');
// Route::get('/create',[VehicleController::class,'create'])->name('car.create');
Route::post('/store',[VehicleController::class,'store'])->name('car.store');


