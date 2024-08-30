<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostsPolicy {
    public function modify(User $user, Posts $post): bool
    {
        return $user->id === $post->user_id;
    }
}
