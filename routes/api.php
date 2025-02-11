<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PlanesController;



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
