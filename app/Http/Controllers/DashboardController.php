<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Iklan;
use App\Models\Metas;
use App\Models\Posts;
use App\Models\Topics;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        
        $jumlah_artikel = Posts::count();
        $jumlah_tutorial = Tutorial::count();
        $jumlah_pengunjung_artikel = Posts::sum('views');
        $jumlah_pengunjung_tutorial = Tutorial::sum('views');
        $total_views = $jumlah_pengunjung_artikel + $jumlah_pengunjung_tutorial;        
        
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'artikel' => $jumlah_artikel,
            'tutorial' => $jumlah_tutorial,
            'total_views' => $total_views
            
        ];
        return view('admin.dashboard',$data);
    }

    public function getPosts()
    {
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $posts = Posts::latest()->get();
        $data = [
            'title' => 'Dashboard',
            'artikel' => $posts,
            'user' => $user
        ];
        return view('admin.posts',$data);
    }

    public function formPost()
    {
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $categories = Category::all();
        $data = [
            'title' => 'Dashboard',
            'user' => $user
            ,'categories' => $categories
        ];
        return view('admin.form-posts',$data);
    }

    public function getCategories()
    {
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $categories = Category::all();
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'categories' => $categories
        ];
        return view('admin.categories',$data);
    }

    public function category_edit($id){
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $category = Category::find($id);
        if(!$category){
            return redirect()->back();
        }

        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'category' => $category
        ];
        return view('admin.update_category',$data);
    }

    public function getTutorial(){
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $tutorial = Tutorial::all();
        $data = [
            'title' => 'Tutorial',
            'user' => $user,
            'tutorial' => $tutorial
        ];
        return view('admin.tutorial',$data);
    }
    public function getTopics(){
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $topic = Topics::with('tutorial')->get();
        $data = [
            'title' => 'Topic',
            'topic' => $topic,
            'user' => $user,
        ];
        return view('admin.topic',$data);
    }

    public function getMeta(){
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $meta = Metas::all();
        $data = [
            'title' => 'Meta',
            'user' => $user,
            'meta' => $meta
        ];
        return view('admin.meta',$data);
    }

    public function ads(){
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $ads = Iklan::all();
        // dd($ads);
        $data = [
            'title' => 'Ads',
            'user' => $user,
            'iklan'=> $ads
        ];
        return view('admin.ads',$data);
    }
}

