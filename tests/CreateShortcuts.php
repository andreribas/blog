<?php

namespace Tests;

use App\Post;
use App\User;

trait CreateShortcuts
{

    public function createPost(): Post
    {
        return factory(Post::class)->create();
    }

    public function createUser(): User
    {
        return factory(User::class)->create();
    }
}