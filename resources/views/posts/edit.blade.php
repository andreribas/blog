@extends('layout')

@section('title', 'Create a new Post')

@section('content')
    <h1>Update Post</h1>

    <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div>
            <input type="text" name="title" placeholder="Post title" value="{{ $post->title }}">
        </div>

        <div>
            <textarea name="body" placeholder="Post body">{{ $post->body }}</textarea>
        </div>

        <div>
            <button type="submit">Update Post</button>
        </div>

    </form>
@endsection
