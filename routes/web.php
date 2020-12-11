<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
})->name('welcome'); */

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rotta search 
Route::get('/search', [PostController::class, 'search'])->name('search');


Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}/show', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/category/{category}/show', [CategoryController::class, 'show'])->name('categories.show');


Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisors.index');
Route::post('/revisor/post/{id}/accept', [RevisorController::class, 'accept'])->name('revisors.accept');
Route::post('/revisor/post/{id}/reject', [RevisorController::class, 'reject'])->name('revisors.reject');
