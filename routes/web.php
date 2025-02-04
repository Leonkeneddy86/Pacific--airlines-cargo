<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/planes",  [FlightController::class, "index"])->name("planesindex");

Route::get("/show/{id}", [FlightController::class, "show"])->name("planeshow");

