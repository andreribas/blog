@extends('layout')

@section('title', 'Create a new Post')

@section('content')
    <h1>Create a new Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Post title">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" placeholder="Post body"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>

    </form>
@endsection
