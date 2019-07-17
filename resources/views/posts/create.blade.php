@extends('layout')

@section('title', 'Create a new Post')

@section('content')
    <h1>Create a new Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        {{ csrf_field() }}

        <div>
            <input type="text" name="title" placeholder="Post title">
        </div>

        <div>
            <textarea name="body" placeholder="Post body"></textarea>
        </div>

        <div>
            <button type="submit">Create new Post</button>
        </div>

    </form>
@endsection
