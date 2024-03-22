<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TopicsController;
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


Route::get('/login',[UsersController::class,'login'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [UsersController::class, 'register'])->name('register.index');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Artikel Routes
    Route::get('/artikel', [DashboardController::class, 'getPosts'])->name('dashboard.posts');
    Route::get('/add/artikel', [DashboardController::class, 'formPost'])->name('dashboard.form-post');
    Route::post('/add/artikel', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/artikel/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
    Route::put('/artikel/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/artikel/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
    Route::delete('/delete_all', [PostsController::class, 'destroy_all'])->name('posts.destroy-all');

    // Category Routes

    Route::get('/category', [DashboardController::class, 'getCategories'])->name('dashboard.categories');
    Route::get('/category/edit/{id}', [DashboardController::class, 'category_edit'])->name('category.edit');
    Route::post('/add/category', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Tutorial Routes

    Route::get('/tutorial', [DashboardController::class, 'getTutorial'])->name('dashboard.tutorial');
    Route::get('add/tutorial', [TutorialController::class, 'create'])->name('add.tutorial');
    Route::post('/add/tutorial', [TutorialController::class, 'store'])->name('tutorial.store');
    Route::get('/tutorial/edit/{id}', [TutorialController::class, 'edit'])->name('tutorial.edit');
    Route::put('/tutorial/{id}', [PostsController::class, 'update'])->name('tutorial.update');
    Route::delete('/tutorial/{id}', [TutorialController::class, 'destroy'])->name('tutorial.destroy');

    // Topic Routes
    Route::get('/topic', [DashboardController::class, 'getTopics'])->name('dashboard.topics');
    Route::get('/topic/edit/{id}', [DashboardController::class, 'topic_edit'])->name('topic.edit');
    Route::post('/add/topic', [TopicsController::class, 'store'])->name('topic.store');
    Route::put('/topic/{id}', [TopicsController::class, 'update'])->name('topic.update');
    Route::delete('/topic/{id}', [TopicsController::class, 'destroy'])->name('topic.destroy');

    // Meta Routes
    Route::get('/settings', [DashboardController::class, 'getMeta'])->name('dashboard.meta');
    Route::post('/add/meta', [MetasController::class, 'store'])->name('meta.store');
    Route::get('/meta/edit/{id}', [DashboardController::class, 'meta_edit'])->name('meta.edit');
    Route::put('/meta/{id}', [MetasController::class, 'update'])->name('meta.update');
    Route::delete('/meta/{id}', [DashboardController::class, 'destroyMeta'])->name('meta.destroy');


    // Ads
    Route::get('ads', [DashboardController::class, 'ads'])->name('ads.index');
    Route::post('add/ads', [IklanController::class, 'store'])->name('ads.store');
    Route::put('ads/edit/{id}', [IklanController::class, 'update'])->name('ads.update');
    Route::delete('ads/{id}', [IklanController::class, 'destroy'])->name('ads.destroy');
});

