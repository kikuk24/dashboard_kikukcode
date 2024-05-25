<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $slug = \Str::slug($request->name);

        $brands = new Brands();
        $brands->name = $request->name;
        $brands->slug = $slug;
        $brands->save();

        return redirect()->back()->with('success', 'Brand created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brands $brands)
    {
        $brand = Brands::find($request->id);
        $brand->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        return redirect()->back()->with('success', 'Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brands)
    {
        $brand = Brands::findOrfail($brands);
        $brand->delete();
        return redirect()->back()->with('success', $brand->name . ' deleted');
    }
}
