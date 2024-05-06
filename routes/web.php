<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TheatreController;
use App\Http\Controllers\Admin\TheatreSessionController;
use App\Http\Controllers\SeatController;
use App\Models\Movie;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserController::class, 'viewLogin'])->name('login');
Route::get('register', [UserController::class, 'viewRegister'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('verify');
Route::post('register', [UserController::class, 'register'])->name('create');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::view("dashboard", "dashboard")->name('dashboard');

    Route::resource('theatres', TheatreController::class);

    Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
    Route::view('movies/create', "movies.create")->name('movies.create');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'delete'])->name('movies.delete');

    Route::get('theatre-sessions/{theatreSession}/seats', [SeatController::class, 'index'])->name('seats.index');
    Route::get('theatre-sessions/{theatreSession}/seats/{seat}/edit', [SeatController::class, 'edit'])->name('seats.edit');
    Route::put('theatre-sessions/{theatreSession}/seats/{seat}', [SeatController::class, 'update'])->name('seats.update');
    Route::resource('theatre-sessions', TheatreSessionController::class);
});
