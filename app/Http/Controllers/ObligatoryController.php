<?php

namespace App\Http\Controllers;

use App\Models\Obligatory;
use Illuminate\Http\Request;

class ObligatoryController extends Controller
{
    public function get()
    {
        $obligatory = Obligatory::all();
        return response()->json(['obligatory' => $obligatory], 201);
    }
    public function edit(Request $request)
    {
        $id = $request['id'];
        $obligatory = Obligatory::find($id);
    
        if (!$obligatory) {
            return response()->json(['error' => 'not found'], 404);
        }
        $obligatory->title = $request['title'];
        $obligatory->amount = (int)$request['amount'];
        $obligatory->description = $request['description'];
        $obligatory->date_to = $request['date_to'];
        $obligatory->date_from = $request['date_from'];
        $obligatory->save();

        return response()->json($obligatory, 200);
    }
}
