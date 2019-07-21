<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

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
            'comments' => $post->comments->sortByDesc('created_at'),
        ]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:50'],
        ]);
        $attributes['user_id'] = Auth::id();
        Post::create($attributes);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);

        $attributes = $request->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:50'],
        ]);
        $post->update($attributes);

        return redirect()->route('posts.show', ['post' => $post])->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post removed successfully');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }
}
