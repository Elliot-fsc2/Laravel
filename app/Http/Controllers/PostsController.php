<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostsController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware(['auth'], except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $posts = Posts::latest()->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post = Auth::user()->posts()->create($fields);

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        $comments = $post->comments()->latest()->paginate(10);
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
        // return ('ok');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        Gate::authorize('modify', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        Gate::authorize('modify', $post);

        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);


        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        Gate::authorize('modify', $post);

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
