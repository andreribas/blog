@extends('layout')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>

    @foreach ($posts as $post)
    <article>
        <a href="\post\{{ $post->id }}"><h2>{{ $post->title }}</h2></a>
        <div class="post_body">{{ $post->body }}</div>
    </article>
    @endforeach
@endsection