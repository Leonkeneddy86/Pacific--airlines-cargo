<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PlanesController;

Auth::routes();


Route::get("/flights",  [FlightController::class, "index"])->name("flights");
Route::get("/flightsShow/{id}", [FlightController::class, "show"])->name("show");
Route::get('/planes', [PlanesController::class, 'index'])->middleware("auth", admin::class)->name('planes');
Route::get('/flightsCreate', [FlightController::class, 'create'])->name('flightsCreate');

