<?php

namespace App\Http\Controllers;

use App\Models\Metas;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meta = Metas::all();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $meta
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required',
            'title' => 'required',
            'description' => 'required|max:255',
            'keywords' => 'required',
        ]);
        
        $metas = new Metas();
        $metas->page = $request->page;
        $metas->title = $request->title;
        $metas->description = $request->description;
        $metas->keywords = $request->keywords;
        $metas->save();

        return redirect()->route('dashboard.meta')->with('success', 'Metas created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $metas = Metas::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $metas
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metas $metas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'page' => 'required',
            'title' => 'required',
            'description' => 'required|max:255',
            'keywords' => 'required',
        ]);

        $metas = Metas::find($request->id);

        $metas->page = $request->page;
        $metas->title = $request->title;
        $metas->description = $request->description;
        $metas->keywords = $request->keywords;
        $metas->save();

        return redirect()->route('dashboard.meta')->with('success', 'Metas updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metas $metas)
    {
        //
    }
}
