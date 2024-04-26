<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[UserController::class,'viewLogin'])->name('login');
Route::get('register',[UserController::class,'viewRegister'])->name('register');
Route::post('login',[UserController::class,'verifyLogin'])->name('verify');
Route::post('register',[UserController::class,'createUser'])->name('create');
Route::group(['prefix'=>'admin', 'as'=>'admin.'],function(){
    Route::get('dashboard',[DashboardController::class,'viewDashboard'])->name('dashboard');
});