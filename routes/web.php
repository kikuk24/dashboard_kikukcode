<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [UsersController::class, 'login'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [UsersController::class, 'register'])->name('register.index');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/comentar', [DashboardController::class, 'comments'])->name('dashboard.comments');
    // Artikel Routes
    Route::get('/admin/artikel', [DashboardController::class, 'getPosts'])->name('dashboard.posts');
    Route::get('/add/artikel', [DashboardController::class, 'formPost'])->name('dashboard.form-post');
    Route::post('/add/artikel', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/admin/artikel/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
    Route::put('/admin/artikel/edit/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/admin/artikel/delete/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
    Route::delete('/admin/artikel/delete_all', [PostsController::class, 'destroy_all'])->name('posts.destroy-all');

    // Products Routes
    Route::get('/admin/products', [DashboardController::class, 'products'])->name('products.index');
    Route::get('/admin/products/add', [ProductsController::class, 'create'])->name('products.create');
    Route::post('add/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/admin/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/edit/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

    // Category Routes

    Route::get('/admin/category', [DashboardController::class, 'getCategories'])->name('dashboard.categories');
    Route::get('admin/category/edit/{id}', [DashboardController::class, 'category_edit'])->name('category.edit');
    Route::post('/add/category', [CategoryController::class, 'store'])->name('category.store');
    Route::put('admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Tutorial Routes

    Route::get('/admin/tutorial', [DashboardController::class, 'getTutorial'])->name('dashboard.tutorial');
    Route::get('add/tutorial', [TutorialController::class, 'create'])->name('add.tutorial');
    Route::post('/add/tutorial', [TutorialController::class, 'store'])->name('tutorial.store');
    Route::get('/admin/tutorial/edit/{id}', [TutorialController::class, 'edit'])->name('tutorial.edit');
    Route::put('/admin/tutorial/{id}', [TutorialController::class, 'update'])->name('tutorial.update');
    Route::delete('admin/tutorial/{id}', [TutorialController::class, 'destroy'])->name('tutorial.destroy');
    Route::delete('admin/tutorial/delete_all', [TutorialController::class, 'destroy_all'])->name('tutorial.destroy-all');

    // Topic Routes
    Route::get('/admin/topic', [DashboardController::class, 'getTopics'])->name('dashboard.topics');
    Route::get('/admin/topic/edit/{id}', [DashboardController::class, 'topic_edit'])->name('topic.edit');
    Route::post('/add/topic', [TopicsController::class, 'store'])->name('topic.store');
    Route::put('/admin/topic/{id}', [TopicsController::class, 'update'])->name('topic.update');
    Route::delete('/admin/topic/{id}', [TopicsController::class, 'destroy'])->name('topic.destroy');

    // Meta Routes
    Route::get('admin/settings', [DashboardController::class, 'getMeta'])->name('dashboard.meta');
    Route::post('/add/meta', [MetasController::class, 'store'])->name('meta.store');
    Route::get('admin/meta/edit/{id}', [DashboardController::class, 'meta_edit'])->name('meta.edit');
    Route::put('admin/meta/{id}', [MetasController::class, 'update'])->name('meta.update');
    Route::delete('/admin/meta/{id}', [DashboardController::class, 'destroyMeta'])->name('meta.destroy');



    // Brands Routes
    Route::get('/admin/brands', [DashboardController::class, 'brands'])->name('brands.index');
    Route::post('add/brands', [BrandsController::class, 'store'])->name('brands.store');
    Route::get('/admin/brands/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::put('/admin/brands/edit/{id}', [BrandsController::class, 'update'])->name('brands.update');
    Route::delete('/admin/brands/{id}', [BrandsController::class, 'destroy'])->name('brands.destroy');


    // Ads
    Route::get('/admin/ads', [DashboardController::class, 'ads'])->name('ads.index');
    Route::post('add/ads', [IklanController::class, 'store'])->name('ads.store');
    Route::put('/admin/ads/edit/{id}', [IklanController::class, 'update'])->name('ads.update');
    Route::delete('/admin/ads/{id}', [IklanController::class, 'destroy'])->name('ads.destroy');
});

// Clients Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/artikel', [PostsController::class, 'getPosts'])->name('client.posts');
Route::get('/artikel/{slug}', [PostsController::class, 'showPost'])->name('post.show');
Route::get('/category/{slug}', [PostsController::class, 'postsByCategories'])->name('category.show');

Route::get('/tutorial', [TutorialController::class, 'getTutorial'])->name('tutorial');
Route::get('/tutorial/{slug}', [TutorialController::class, 'showtutorial'])->name('tutorial.show');
Route::get('/topic/{slug}', [TutorialController::class, 'getTutorial'])->name('topic.show');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');


Route::post('/comment', [CommentsController::class, 'store'])->name('comments.store')->middleware('checkbadwords');


Route::get('shop/products/search/', [ProductsController::class, 'search'])->name('products.search');
Route::get('shop/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('shop/products/{slug}', [ProductsController::class, 'show'])->name('product.show');

Route::get('shop/products/buy/{slug}', [TransactionController::class, 'index'])->name('product.buy');

Route::post('buy', [TransactionController::class, 'store'])->name('transaction.buy');