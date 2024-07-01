<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\HomeController;

Route::redirect('/', 'dashboard');
Route::get('auth',[AuthController::class,'auth'])->name('auth');
Route::get('/dashboard', [AuthController::class, 'homePage'])->name('dashboard');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    //user
    Route::get('profile',[HomeController::class,'porfilePage'])->name('porfilePage');
});
