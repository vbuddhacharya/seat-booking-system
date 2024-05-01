<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TheatreController;
use App\Http\Controllers\Admin\ThirdPartyAPIController;
use App\Models\Movie;

Route::get('/', function () {
    return view('welcome');
});

Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');
Route::post('login', [UserController::class, 'login'])->name('verify');
Route::post('register', [UserController::class, 'register'])->name('create');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    Route::view("dashboard", "dashboard")->name('dashboard');

    Route::get('theatres', [TheatreController::class, 'viewTheatres'])->name('theatres');

    Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
    Route::view('movies/create', "movies.create")->name('movies.create');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'delete'])->name('movies.delete');

    Route::get('thirdparty',[ThirdPartyAPIController::class,'index'])->name('thirdparty.index');
    Route::get('thirdparty/{movie}',[ThirdPartyAPIController::class,'show'])->name('thirdparty.show');
});
