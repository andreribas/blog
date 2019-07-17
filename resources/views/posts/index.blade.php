@extends('layout')

@section('title', 'Posts')

@section('content')
    <div>
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}">Create new Post</a>
    </div>

    @foreach ($posts as $post)
    <article>
        <a href="{{ route('posts.show', ['post' => $post]) }}"><h2>{{ $post->title }}</h2></a>
        <div class="post_body">{{ $post->body }}</div>
    </article>
    @endforeach
@endsection