<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function create()
    {
        return view('admin.posts.create');

    }

    public function store()
    {

        $attributes = \request()->validate([
            'title' => 'required',
            'slug' =>['required', Rule::unique('posts', 'slug')],
            'body' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'category_id' =>['required', Rule::exists('categories','id')]
        ]);


        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

        auth()->user()->posts()->create($attributes);

        return redirect('/');
    }

    public function index()
    {
        return view('admin.posts.index', [
                'posts' => Post::paginate(50)
         ]);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }
}
