<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('post.index', [
            'posts' => Post::all(),
        ]);
    }

    public function show(Post $post, Request $request)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }
}
