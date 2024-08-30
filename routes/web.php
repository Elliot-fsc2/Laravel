<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/posts');

Route::fallback(function () {
    return redirect()->route('posts.index');
});

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostsController::class);

    Route::get('/{user}/posts', [ProfileController::class, 'show'])->name('profile.user');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
});
