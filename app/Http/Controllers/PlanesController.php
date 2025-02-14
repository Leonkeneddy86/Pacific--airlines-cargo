<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planes;

class PlanesController extends Controller
{
    public function index(Request $request)
    {
        $plane = Planes::all();
        return view('planes', compact('plane'));
    }

    public function show(Request $request, $id)
    {
        $plane = Planes::findOrFail($id);
        return view('planeShow', compact('plane'));
    }
}