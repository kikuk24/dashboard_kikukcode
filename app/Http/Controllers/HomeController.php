<?php

namespace App\Http\Controllers;

use App\Models\Posts;
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
}
