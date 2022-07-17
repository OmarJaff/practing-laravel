<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'] )->name('home');


Route::get('/posts/{post}', [PostController::class, 'show']);


Route::get('/author/{author:username}', function (User $author) {
   return view('posts', [
       'posts' => $author->posts
   ]) ;
});




//Route::get('/category/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts' => $category->posts,
//        'categories' => Category::all(),
//        'currentCategory' => $category
//    ]);
//});
