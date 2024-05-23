<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with('user', 'category')->latest()->paginate(6);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $posts,
        ], 200);
    }

    public function getPosts()
    {
        $categories = Category::all();
        $posts = Posts::with('user', 'category')->latest()->paginate(6);
        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];
        return view('clients.posts', $data);
    }

    public function showPost($slug)
    {
        $posts = Posts::with('user', 'category', 'comments')->where('slug', $slug)->first();
        $related = Posts::with('user', 'category')->where('category_id', $posts->category_id)->where('id', '!=', $posts->id)->latest()->paginate(3);
        $comments = $posts->comments()->latest()->get();
        $data = [
            'post' => $posts,
            'related' => $related,
            'comments' => $comments
        ];
        $posts->increment('views');

        return view('clients.showposts', $data);
    }

    public function postsByCategories($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Posts::with('user', 'category')->where('category_id', $category->id)->latest()->paginate(6);
        if (!$category || !$posts) {
            return redirect()->back()->with('error', 'Posts not found');
        }
        $data = [
            'category' => $category,
            'posts' => $posts
        ];
        dd($data);
        return view('clients.posts', $data);
    }

    public function postsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Posts::with('user', 'category')->where('category_id', $category->id)->latest()->paginate(6);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $posts,
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
            'title' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'description' => 'required|max:255',
            'category_id' => 'required'
        ]);

        $image = $request->file('image');
        $extFile = $request->file('image')->getClientOriginalExtension();
        $slug = \Str::slug($request->title);
        $fileName = $slug . '.' . $extFile;
        $path =  '/artikel/' . $fileName;

        Storage::disk('public')->put($path, file_get_contents($image));

        Posts::create([
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'image' => $request->file('image')->storeAs('/artikel', $fileName),
            'user_id' => auth()->user()->id,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard.posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $posts = Posts::with('user', 'category')->where('slug', $slug)->first();
        if (!$posts) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $posts->increment('views');

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $posts
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Posts::findOrFail($id);
        $user = auth()->user();
        $categories = Category::all();
        if (!$user) {
            return redirect('/login');
        }
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'post' => $posts,
            'categories' => $categories
        ];
        return view('admin.update_artikel', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required|max:255',
            'category_id' => 'required'
        ]);

        $posts = Posts::findOrFail($id);

        $image = $request->file('image');
        $slug = \Str::slug($request->title);


        if ($image) {

            Storage::disk('public')->delete($posts->image);

            $extFile = $image->getClientOriginalExtension();
            $fileName = $slug . '.' . $extFile;
            $path =  '/artikel/' . $fileName;
            Storage::disk('public')->put($path, file_get_contents($image));


            $posts->update([
                'title' => $request->title,
                'slug' => $slug,
                'body' => $request->body,
                'image' => $path,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'category_id' => $request->category_id
            ]);
        } else {
            $posts->update([
                'title' => $request->title,
                'slug' => $slug,
                'body' => $request->body,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'category_id' => $request->category_id
            ]);
        }

        return redirect()->route('dashboard.posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Posts::findOrFail($id);
        $image = $posts->image;
        if(Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }
        $posts->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }

    public function destroy_all(){
        $posts = Posts::all();
        foreach ($posts as $post) {
            $image = $post->image;
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
            $post->delete();
        }
        return redirect()->back()->with('success', 'All posts deleted successfully');
    }
}
