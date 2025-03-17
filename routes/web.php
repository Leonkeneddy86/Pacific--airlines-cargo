<?php


use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PlanesController;


Auth::routes();

Route::get('Dashboard', function () {})->middleware(Admin::class, 'auth')->name('dashboard');
Route::get("/flights",  [FlightController::class, "index"])->name("index");
Route::get('/planes', [PlanesController::class, 'index'])->name('index');
Route::post('/planes', [PlanesController::class, 'store'])->name('store');
Route::get('/errorBlade', function () {return view('errorBlade');})->name('errorBlade');

