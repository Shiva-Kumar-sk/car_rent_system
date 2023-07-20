<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PaymentController;
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




Route::get('/car_home', [VehicleController::class, 'index'])->name('vehicle.home');
Route::get('/car_home/{id}', [VehicleController::class, 'show'])->name('vehicle.show');
// Route::get('/create',[VehicleController::class,'create'])->name('car.create');
Route::post('/store', [VehicleController::class, 'store'])->name('car.store');











Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

    Route::post('/car_home/{id}', [PaymentController::class, 'payment_submit'])->name('payment.submit');

    Route::get('/redirect', [PaymentController::class, 'redirect'])->name('payment.redirect');

    Route::get('/payment-done', [PaymentController::class, 'payment_success'])->name('payment.success');
    Route::get('/test-fail', [PaymentController::class, 'payment_fail'])->name('payment.fail');
});
