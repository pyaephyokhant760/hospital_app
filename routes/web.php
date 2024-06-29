<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth',[AuthController::class,'auth'])->name('auth');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    //user
    Route::get('user',[HomeController::class,'userPage'])->name('userPage');
});
