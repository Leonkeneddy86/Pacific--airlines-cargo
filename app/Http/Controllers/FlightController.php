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
        return view('flightsCreate');
    }
}
