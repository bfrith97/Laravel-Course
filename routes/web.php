<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\NewsletterController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsletterController::class, '__invoke');

Route::get('register' , [RegisterController::class, 'create'])->middleware('guest');
Route::post('register' , [RegisterController::class, 'store'])->middleware('guest');

Route::get('login' , [SessionController::class, 'index'])->middleware('guest');
Route::post('login' , [SessionController::class, 'login'])->middleware('guest');
Route::post('logout' , [SessionController::class, 'logout'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');