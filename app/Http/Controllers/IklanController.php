<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iklan = Iklan::where('is_published', 1)->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $iklan
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
        $image = $request->file('image');
        $extFile = $request->file('image')->getClientOriginalExtension();
        $slug = \Str::slug($request->title);
        $filename = $slug . '.' . $extFile;
        $path =  '/iklan/'. $filename;

        Storage::disk('public')->put($path, file_get_contents($image));
        
        Iklan::create([
            'title' => $request->title,
            'url' => $request->url,
            'image' => $path,
            'is_published' => $request->status
        ]);
        
        return redirect()->route('ads.index')->with('success', 'Iklan Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Iklan $iklan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iklan $iklan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iklan $iklan)
    {

        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'status' => 'required',
        ]);

        $iklan = Iklan::findOrFail($request->id);
        
        $image_iklan = $iklan->image;

        if(!$image_iklan && Storage::disk('public')->exists($image_iklan)){

            $image = $request->file('image');
            $extFile = $request->file('image')->getClientOriginalExtension();
            $slug = \Str::slug($request->title);
            $filename = $slug . '.' . $extFile;
            $path =  '/iklan/' . $filename;

            Storage::disk('public')->delete($iklan->image);
            Storage::disk('public')->put($path, file_get_contents($image));

            $iklan->update([
                'title' => $request->title,
                'url' => $request->url,
                'image' => $path,
                'is_published' => $request->status
            ]);
        } else {
            $iklan->update([
                'title' => $request->title,
                'url' => $request->url,
                'is_published' => $request->status
            ]);
        }

        
        
        return redirect()->route('ads.index')->with('success', 'Iklan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $iklan = Iklan::findOrFail($id);
        $image = $iklan->image;

        if(Storage::disk('public')->exists($image)){
            Storage::disk('public')->delete($image);
        }
        $iklan->delete();
        return redirect()->route('ads.index')->with('success', 'Iklan Berhasil Dihapus');
    }
}
