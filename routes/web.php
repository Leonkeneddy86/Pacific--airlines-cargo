<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->middleware('Admin')->name('home');

Route::get("/planes",  [FlightController::class, "index"])->name("planesindex");
Route::get("/show/{id}", [FlightController::class, "show"])->name("planeshow");
