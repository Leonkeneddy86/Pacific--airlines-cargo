<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planes; // Make sure to include the Flight model

class PlanesController extends Controller
{
    public function index(Request $request)
    {
        $plane = Planes::all();
        return view('planes', compact('plane'));
    } 
} 