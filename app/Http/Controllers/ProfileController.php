<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->paginate(10);

        return view('profile', ['post' => $posts]);
    }

    public function show(User $user)
    {

        $posts = $user->posts()->latest()->paginate(10);

        return view('user.profile', ['user' => $user, 'posts' => $posts]);
    }
}
