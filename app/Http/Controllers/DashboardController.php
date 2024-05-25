<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Iklan;
use App\Models\Metas;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Topics;
use App\Models\Tutorial;
use Carbon\Carbon;
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

    public function getViewsArtikel()
    {
        $currentYear = Carbon::now()->year;
        $viewsArtikel = Posts::selectRaw('month(created_at) as month, sum(views) as views')->whereYear('created_at', $currentYear)->groupBy('month')->get();
        $data = array_fill(0, 12, 0);
        foreach ($viewsArtikel as $view) {
            $data[$view->month - 1] = $view->views;
        }
        // dd($data);
        return response()->json($data);
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
    public function comments()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/login');
        }
        $comments = Comments::with('post')->get();
        dd($comments);
        $data = [
            'title' => 'Comments',
            'user' => $user,
            'comments' => $comments
        ];
        return view('admin.comments', $data);
    }
    public function brands()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/login');
        }
        $brands = Brands::all();
        $data = [
            'title' => 'Brands',
            'user' => $user,
            'brands' => $brands
        ];
        return view('admin.brands.index', $data);
    }
    public function products()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/login');
        }
        $products = Products::all();
        $data = [
            'title' => 'Products',
            'user' => $user,
            'products' => $products
        ];
        return view('admin.products.product', $data);
    }
}

