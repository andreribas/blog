@extends('layout')

@section('title', 'Create a new Post')

@section('content')
    <h1>Create a new Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" placeholder="Post title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control {{ $errors->has('body') ? 'border-danger' : '' }}" placeholder="Post body" required>{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>

    </form>
@endsection
