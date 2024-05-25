<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topics::with('tutorial')->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $topics
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
        $topics = Topics::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);

        return redirect()->route('dashboard.topics')->with('success', 'Topics created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topics = Topics::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $topics
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topics $topics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topics $topics)
    {
        $selectedTopics = Topics::find($request->id);

        $selectedTopics->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);

        return redirect()->route('dashboard.topics')->with('success', 'Topics updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topics = Topics::findOrFail($id);
        $topics->delete();
        return redirect()->route('dashboard.topics')->with('success', 'Topics deleted successfully');
    }
}
