<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'author_name' => ['required'],
            'message' => ['required'],
        ]);

        $post->addComment($attributes);

        return back();
    }

}
