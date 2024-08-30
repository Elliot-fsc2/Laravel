<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Posts $post)
    {
        // dd($request->body);

        $fields = $request->validate([
            'body' => ['required'],
        ]);

        $comment = new Comment();
        $comment->body = $fields['body'];
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }
}
