<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PlanesController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', function () {})->middleware('checkAge');

Route::get("/flight",  [FlightController::class, "index"])->name("index");

Route::get('/flights/{id}', [FlightController::class, "show"])->name('show');



Route::get('/planes', [PlanesController::class, 'index'])->name('index');


