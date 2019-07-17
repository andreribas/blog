<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('posts.index', [
            'posts' => Post::all(),
        ]);
    }

    public function show(Post $post, Request $request)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();

        return redirect()->route('posts.index');
    }
}
