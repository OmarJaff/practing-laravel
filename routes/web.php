<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterContrller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
 use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'] )->name('home');

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('/posts/{post}/comments', [CommentController::class, 'store']);

Route::post('/posts/{post}/comments/remove/{id}', [CommentController::class, 'destroy']);

Route::post('/posts/{post}/comments/update/{id}', [CommentController::class, 'update']);

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisterController::class, 'create']);

    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);

    Route::post('/login', [SessionController::class, 'store']);

});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/newsletter/member/add', NewsletterContrller::class );

Route::get('/admin/post/create', [PostController::class, 'create'])->middleware('admin');
