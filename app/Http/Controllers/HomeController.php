<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Topics;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user', 'category')->latest()->paginate(6);
        $tutorials = Tutorial::with('topics')->latest()->paginate(6);
        $data = [
            'posts' => $posts,
            'tutorial' => $tutorials
        ];
        return view('welcome', $data);
    }

    public function sitemap()
    {
        $post = Posts::all();
        $tutorial = Tutorial::all();
        $categories = Category::all();
        $topics = Topics::all();
        $data = [
            'posts' => $post,
            'tutorials' => $tutorial,
            'categories' => $categories,
            'topics' => $topics
        ];

        return response()->view('sitemap', $data, 200)->header('Content-Type', 'text/xml');

    }
}