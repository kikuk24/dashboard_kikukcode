<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\TutorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('posts',[PostsController::class, 'index'])->name('api.posts.index');
Route::get('posts/category/{id}',[PostsController::class, 'postsByCategory'])->name('api.posts.category');
Route::get('posts/{slug}',[PostsController::class, 'show'])->name('api.posts.show');
Route::get('meta',[MetasController::class, 'index'])->name('page.meta');
Route::get('meta/{id}',[MetasController::class, 'show'])->name('page.meta.show');
Route::get('categories',[CategoryController::class, 'index'])->name('api.categories.index');
Route::get('categories/{slug}',[CategoryController::class, 'show'])->name('api.categories.show');

Route::get('topics',[TopicsController::class, 'index'])->name('api.topics.index');
Route::get('topics/{slug}',[TopicsController::class, 'show'])->name('api.topics.show');
Route::get('tutorials',[TutorialController::class, 'index'])->name('api.tutorials.index');
Route::get('tutorials/{slug}',[TutorialController::class, 'show'])->name('api.tutorials.show');
Route::get('tutorials/topic/{slug}',[TutorialController::class, 'tutorialsByTopic'])->name('api.tutorials.topic');