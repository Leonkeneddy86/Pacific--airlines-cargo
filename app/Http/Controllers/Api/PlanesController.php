<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Planes;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    public function index()
    {
        return (response()->json(Planes::All(), 200));
    }

    public function show(string $id)
    {
        return response()->json(Planes::find($id), 200);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'places' => 'required|integer|min:1',
    ]);

    $plane = Planes::create($validatedData);
    
    return response()->json($plane, 200 ); 
}

    public function update(Request $request, string $id)
{
    
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'places' => 'required|integer|min:1',
    ]);

    
    $plane = Planes::findOrFail($id);

    
    $plane->update($validatedData);

    
    return response()->json($plane, 200);
}

    public function destroy(string $id)
    {
        Planes::find($id)->delete();
    }
}
