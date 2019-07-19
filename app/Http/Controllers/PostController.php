<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()->sortByDesc('created_at'),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function update(Post $post, Request $request)
    {
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();

        return redirect()->route('posts.show', ['post' => $post])->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post removed successfully');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
}
