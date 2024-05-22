<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0))
            ->add(Url::create('/artikel')->setPriority(0.8));

        $posts = Posts::all();

        foreach ($posts as $post) {
            $sitemap
                ->add(Url::create('/artikel/' . $post->slug)->setPriority(0.6));
        }

        $tutorials = Tutorial::all();

        foreach ($tutorials as $tutorial) {
            $sitemap
                ->add(Url::create('/tutorial/' . $tutorial->slug)->setPriority(0.6));
        }
        $sitemap->writeToFile(public_path('sitemap.xml'));

    }
}