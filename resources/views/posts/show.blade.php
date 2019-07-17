@extends('layout')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <div class="post_body">{{ $post->body }}</div>
@endsection