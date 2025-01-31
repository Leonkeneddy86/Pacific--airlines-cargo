<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PlanesController;
use App\Http\Controllers\Api\UserController;
use App\Models\Planes;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/planes", [PlanesController::class, "index"])->name("planesindex");
Route::get("/plane/{id}", [PlanesController::class, "show"])->name("planeshow");
Route::post("/plane", [PlanesController::class, "store"])->name("Planetore");
Route::put("/plane/{id}", [PlanesController::class, "update"])->name("planesupdate");
Route::delete("/plane/{id}", [PlanesController::class, "destroy"])->name("planedestroy");

Route::get("/flights", [FlightController::class, "index"])->name("index");
Route::get("/flight/{id}", [FlightController::class, "show"])->name("show");
Route::post("/flight", [FlightController::class, "store"])->name("store");
Route::put("/flight/{id}", [FlightController::class, "update"])->name("update");
Route::delete("/flight/{id}", [FlightController::class, "destroy"])->name("destroy");