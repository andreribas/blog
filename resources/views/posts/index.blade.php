@extends('layout')

@section('title', 'Posts')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="mr-auto">
                <h1 class="mr-auto">Posts</h1>
            </div>
            @can('create', \App\Post::class)
            <div class="ml-auto">
                <a href="{{ route('posts.create') }}" class="ml-auto btn btn-primary">Create new Post</a>
            </div>
            @endcan
        </div>
    </div>

    @foreach ($posts as $post)
    <article>
        <a href="{{ route('posts.show', ['post' => $post]) }}"><h2>{{ $post->title }}</h2></a>
        <p class="post_time">Posted by {{ $post->user->name }} at {{ $post->created_at->format('j F, Y') }}</p>
        <div class="post_body">{{ $post->body }}</div>
    </article>
    @endforeach
@endsection