<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/posts', 301);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
