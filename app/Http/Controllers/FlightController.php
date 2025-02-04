<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        
        $plane = Flight::all();
        return view('planes', compact('plane'));

    }
    
    public function show(string $id)
    {
        $plane = Flight::find($id);

        return view ('planeshow', compact('plane'));
    }
}
