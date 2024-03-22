<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('posts')->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $categories
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
        $slug = \Str::slug($request->name);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $category = Category::with('posts')->where('slug', $slug)->first();
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $category
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $slug = \Str::slug($request->name);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
        return redirect()->route('dashboard.categories')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if($category){
            $category->posts()->delete();
            $category->delete();
        }
        
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
