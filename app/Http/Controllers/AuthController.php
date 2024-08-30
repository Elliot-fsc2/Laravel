<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register()
    {
        $fields = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create($fields);

        Auth::login($user);

        return redirect(route('posts.index'));
    }

    public function login()
    {
        $fields = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($fields, request('remember'))) {
            request()->session()->regenerate();
            return redirect(route('posts.index'));
        } else {
            return redirect(route('login'))->withErrors(['email' => 'Incorrect email or password']);
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }
}
