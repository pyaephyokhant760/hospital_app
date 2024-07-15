<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddDoctorController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\admin\DashboardController;

Route::redirect('/', 'dashboard');
Route::get('auth',[AuthController::class,'auth'])->name('auth');
Route::get('/dashboard', [AuthController::class, 'homePage'])->name('dashboard');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    //user
    Route::get('profile',[HomeController::class,'porfilePage'])->name('porfilePage');
    Route::post('appointment',[AuthController::class,'appointmentPage'])->name('appointmentPage');
    Route::get('show/appointment',[AuthController::class,'showAppointmentPage'])->name('showAppointmentPage');

    // admin
    Route::get('home',[DashboardController::class,'adminHomePage'])->name('adminHomePage');
    Route::get('addDoctor',[AddDoctorController::class,'addDoctorPage'])->name('addDoctorPage');
    Route::post('getAddDoctor',[AddDoctorController::class,'getAddDoctorPage'])->name('getAddDoctorPage');
});
