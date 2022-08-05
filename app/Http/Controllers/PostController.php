<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {

         return view('posts.index', [

            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
         ]);

    }

    public function show(Post $post) {

            return view('posts.show', [
                'post' => $post
            ]);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

         $attributes = \request()->validate([
             'title' => 'required',
             'slug' =>['required', Rule::unique('posts', 'slug')],
             'excerpt' => 'required',
             'body' => 'required',
             'thumbnail' => 'required|image',
             'category_id' =>['required', Rule::exists('categories','id')]
         ]);


          $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

          auth()->user()->posts()->create($attributes);

         return redirect('/');
    }
}
