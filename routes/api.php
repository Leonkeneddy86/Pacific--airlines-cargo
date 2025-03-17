<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PlanesController;
use App\Http\Controllers\AuthController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/planes", [PlanesController::class, "index"])->name("index");
Route::get("/plane/{id}", [PlanesController::class, "show"])->name("show");
Route::post("/plane", [PlanesController::class, "store"])->name("store");
Route::put("/plane/{id}", [PlanesController::class, "update"])->name("update");
Route::delete("/plane/{id}", [PlanesController::class, "destroy"])->name("destroy");

Route::get("/flights", [FlightController::class, "index"])->name("apiiFlights");
Route::get("/flight/{id}", [FlightController::class, "show"])->name("apiishow");
Route::post("/flight", [FlightController::class, "store"])->name("apiistore");
Route::put("/flight/{id}", [FlightController::class, "update"])->name("apiiupdate");
Route::delete("/flight/{id}", [FlightController::class, "destroy"])->name("apiidestroy");


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});