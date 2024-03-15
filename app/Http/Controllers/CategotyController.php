<?php

namespace App\Http\Controllers;

use App\Models\Categoty;
use Illuminate\Http\Request;

class CategotyController extends Controller
{
    public function get()
    {
        $category = Categoty::all();
        return response()->json(['category' => $category], 201);
    }
    public function edit(Request $request)
    {
        $id = $request['id'];
        $category = Categoty::find($id);
        
        $category->title = $request['title'];
        $category->save();
    
        return response()->json($category, 200);
    }
    public function create(Request $request)
    {
        $category = Categoty::create([
            'title' => $request['title'],
            'type' => $request['type'],
        ]);

        return response()->json(['category'=> $category], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Categoty::where('title', 'like', "%$search%")->get();

        return response()->json(['category'=> $categories], 200);
    }
}
