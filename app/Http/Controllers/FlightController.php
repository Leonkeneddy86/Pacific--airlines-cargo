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
        return view('Flights', compact('flight'));

    }
    
    public function show(string $id)
    {
        $flight = Flight::find($id);

        return view ('Flightshow', compact('flight'));
    }
}
