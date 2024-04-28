<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TheatreController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');
Route::post('login', [UserController::class, 'login'])->name('verify');
Route::post('register', [UserController::class, 'register'])->name('create');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'viewDashboard'])->name('dashboard');
    Route::view("movies-list","movies")->name('movies');
    Route::get('movies',[MovieController::class,'viewMovies'])->name('movies');
    Route::get('theatres',[TheatreController::class,'viewTheatres'])->name('theatres');
});
