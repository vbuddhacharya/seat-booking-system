<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TheatreController;
use App\Http\Controllers\Admin\TheatreSessionController;
use App\Http\Controllers\SeatController;
use App\Models\Movie;

Route::get('/', [App\Http\Controllers\Customer\MovieController::class, 'index'])->name('index');

Route::get('login', [UserController::class, 'viewLogin'])->name('login');
Route::get('register', [UserController::class, 'viewRegister'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('verify');
Route::post('register', [UserController::class, 'register'])->name('create');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {

    Route::view("dashboard", "dashboard")->name('dashboard');

    Route::resource('theatres', TheatreController::class);

    Route::group(['prefix' => 'movies', 'as' => 'movies.'], function(){
        Route::get('/', [MovieController::class, 'index'])->name('index');
        Route::post('/', [MovieController::class, 'store'])->name('store');
        Route::view('create', "movies.create")->name('create');
        Route::get('{movie}/edit', [MovieController::class, 'edit'])->name('edit');
        Route::put('{movie}', [MovieController::class, 'update'])->name('update');
        Route::delete('{movie}', [MovieController::class, 'delete'])->name('delete');
    
    });

    Route::get('theatre-sessions/{theatreSession}/seats', [SeatController::class, 'index'])->name('seats.index');
    Route::get('theatre-sessions/{theatreSession}/seats/{seat}/edit', [SeatController::class, 'edit'])->name('seats.edit');
    Route::put('theatre-sessions/{theatreSession}/seats/{seat}', [SeatController::class, 'update'])->name('seats.update');
    Route::resource('theatre-sessions', TheatreSessionController::class);
});

Route::group(['namespace' => 'App\Http\Controllers\Customer'], function () {
    Route::get('movies/{movie}/details',[App\Http\Controllers\Customer\MovieController::class,'show'])->name('movies.show');
});
