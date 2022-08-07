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

        $attributes = $this->validatePost();


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

    public function edit(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }

        $post->update($attributes);

        return back()->with('message','Post updated successfully');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('message', 'post removed successfully');
    }


    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        $attributes = \request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'body' => 'required',
            'excerpt' => 'required',
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        return $attributes;
    }

}
