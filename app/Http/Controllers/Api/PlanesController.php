<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Planes;
use Illuminate\Http\Request;

class AirplaneController extends Controller
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
        $plane = Planes::create(
            [
                "name" => $request->name,
                "places" => $request->places
            ]
        );
        
        return (response()->json($plane, 200));
    }

    public function update(Request $request, string $id)
    {
        $plane = Planes::find($id);
        $plane->update(
            [
                "name" => $request->name,
                "places" => $request->places
            ]
        );

        return (response()->json($plane, 200));
    }

    public function destroy(string $id)
    {
        Planes::find($id)->delete();
    }
}
