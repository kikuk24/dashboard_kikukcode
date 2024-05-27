<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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
        $request->validate([
            'images' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $images) {
                $name = time() . random(1, 100) . '.' . $images->extension();
                $path = '/img/' . $name;

                Storage::disk('public')->put($path, file_get_contents($images));

                $img = new Image();
                $img->name = $name;
                $img->path = $path;
            }
        }

        return back()->with('success', 'Upload gambar berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
