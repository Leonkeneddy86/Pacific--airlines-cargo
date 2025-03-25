<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planes;

class PlanesController extends Controller
{
    public function index(Request $request)
    {
        $planes = Planes::all();
        if ($request->action == 'delete') {
            $this->destroy($request->id);
            return redirect()->route('planes');
        }
        return view('planes', compact('planes'));
    }


    public function destroy($id)
    {
        $plane = Planes::find($id);
        $plane->delete();
       
    }

}