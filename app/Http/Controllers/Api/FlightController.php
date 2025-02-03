<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function index()
    {
        return response()->json(Flight::all(), 200);
    }

    public function show(string $id)
    {
        return response()->json(Flight::find($id), 200);
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

        
        $flight = Flight::create($validatedData);

       
        return response()->json($flight, 200); 
    }

    public function update(Request $request, string $id)
{
    
    $validatedData = $request->validate([
        'date' => 'required|date',
        'departure' => 'required|string|max:255',
        'arrival' => 'required|string|max:255',
        'image' => 'required|url',
        'airplane_id' => 'required|exists:planes,id',
        'available' => 'required|boolean',
    ]);

    
    $flight = Flight::findOrFail($id);

    
    $flight->update($validatedData);

    
    return response()->json($flight, 200);
}

    public function destroy(string $id)
    {
        Flight::find($id)->delete();
        return response()->json(null, 204);
    }
}