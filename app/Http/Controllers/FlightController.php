<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        
        $flight = Flight::all();
        
        return view('flights', compact('flight'));
    }

    public function show($id)
    {
        $flight = Flight::find($id);
        return view('flightsShow', compact('flight'));
    }

    public function create()
    {
        // Aquí podrías cargar la vista correspondiente, por ejemplo:
        return view('flightsCreate'); // Asegúrate de tener la vista en resources/views/flights/create.blade.php
    }

}
