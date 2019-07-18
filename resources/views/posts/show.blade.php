@extends('layout')

@section('title', $post->title)

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="mr-auto">
                <h1>{{ $post->title }}</h1>
            </div>
            <form class="form-inline ml-auto" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <a href="{{ route('posts.edit', ['post' => $post]) }}" class="ml-auto btn btn-primary">Edit</a>

                <button type="submit" class="ml-auto btn btn-danger">Delete</button>
            </form>
        </div>
    </div>


    <div class="post_body">{{ $post->body }}</div>
@endsection