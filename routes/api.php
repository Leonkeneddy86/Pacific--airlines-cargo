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
Route::post("/plane", [PlanesController::class, "store"])->name("Planestore");
Route::put("/plane/{id}", [PlanesController::class, "update"])->name("planesupdate");
Route::delete("/plane/{id}", [PlanesController::class, "destroy"])->name("planesdestroy");

Route::get("/flights", [FlightController::class, "index"])->name("Flightsindex");
Route::get("/flight/{id}", [FlightController::class, "show"])->name("Flighshow");
Route::post("/flight", [FlightController::class, "store"])->name("Flightstore");
Route::put("/flight/{id}", [FlightController::class, "update"])->name("Flightupdate");
Route::delete("/flight/{id}", [FlightController::class, "destroy"])->name("Flightdestroy");

Route::get("/users", [UserController::class, "index"])->name("Usersindex");
Route::get("/user/{id}", [UserController::class, "show"])->name("Usershow");
Route::post("/user", [UserController::class, "store"])->name("Userstore");
Route::put("/user/{id}", [UserController::class, "update"])->name("Userupdate");
Route::delete("/user/{id}", [UserController::class, "destroy"])->name("Userdestroy");