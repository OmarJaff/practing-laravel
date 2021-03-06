<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
         $attributes = request()->validate([
            'body' => 'required|string'
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }

    public function update(Post $post)
    {
        $attribute = request()->validate([
            'body' => 'required|string'
        ]);

        $comment = $post->comments()->find(\request('id')) ?? false;

        $comment->body = \request('body');

        $comment->update();

        return redirect()->back()->with('message', 'Your comment updated successfully');

    }

    public function destroy(Post $post)
    {

        $comment = $post->comments->find(request('id')) ?? false;

        $comment?->delete();

        return redirect()->back();

    }
}
