<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FlightController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta que utiliza el middleware 'Admin'
Route::get('/home', [HomeController::class, 'index'])
    ->middleware('admin')
    ->name('home');
    Route::get('profile', function () {
    })->middleware('checkAge');

Route::get("/index",  [FlightController::class, "index"])->name("index");

