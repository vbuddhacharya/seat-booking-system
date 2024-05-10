<?php

use App\Http\Controllers\Api\SeatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/theatre-sessions/{theatreSession}/seats', [SeatController::class,'availableSeats'])->name('seats.index');