<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AdminController;
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

//  admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/{id}', [AdminController::class, 'extra_payment'])->name('admin.extra_payment');
Route::get('/extra_payment_redirect', [AdminController::class, 'extra_payment_redirect'])->name('payment.extra_payment_redirect');








// car related

Route::get('/car_home', [VehicleController::class, 'index'])->name('vehicle.home');
Route::get('/car_home/{id}', [VehicleController::class, 'show'])->name('vehicle.show');












Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// auth
Route::middleware('auth')->group(function () {

    Route::post('/car_home/{id}', [PaymentController::class, 'payment_submit'])->name('payment.submit');

  
});
//without auth
Route::get('/redirect', [PaymentController::class, 'redirect'])->name('payment.redirect');

Route::get('/payment-done', [PaymentController::class, 'payment_success'])->name('payment.success');
Route::get('/payment-fail', [PaymentController::class, 'payment_fail'])->name('payment.fail');
