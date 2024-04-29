<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TheatreController;
use App\Models\Movie;

Route::get('/', function () {
    return view('welcome');
});

Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');
Route::post('login', [UserController::class, 'login'])->name('verify');
Route::post('register', [UserController::class, 'register'])->name('create');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view("dashboard","dashboard")->name('dashboard');
    
    Route::get('theatres',[TheatreController::class,'viewTheatres'])->name('theatres');

    Route::get('movies',[MovieController::class,'viewMovies'])->name('movies');
    Route::post('movies',[MovieController::class,'storeMovie'])->name('storemovie');
    Route::view('movies/create',"movies.create")->name('addmovies');
    Route::get('/movies/{id}/edit',[MovieController::class,'editMovie'])->name('editmovie');
    Route::put('/movies/{id}',[MovieController::class,'updateMovie'])->name('updatemovie');
    Route::delete('/movies/{id}',[MovieController::class,'deleteMovie'])->name('deletemovie');
});
