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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'departure' => 'required|string|max:255',
            'arrival' => 'required|string|max:255',
            'image' => 'required|url',
            'airplane_id' => 'required|exists:planes,id',
            'available' => 'required|boolean',
        ]);

        $flight = new Flight();
}
}
