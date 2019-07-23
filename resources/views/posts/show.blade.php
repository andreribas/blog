@extends('layout')

@section('title', $post->title)

@section('content')

    <div class="container-fluid mb-4">
        <div class="row mb-2">
            <div class="mr-auto">
                <h1>{{ $post->title }}</h1>
                <p class="post_time">Posted by {{ $post->user->name }} at {{ $post->created_at->format('j F, Y') }}</p>
            </div>

            @can('delete', $post)
            <form class="form-inline ml-auto" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-primary mr-2">Edit</a>

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endcan
        </div>

        <div class="row post_body">{{ $post->body }}</div>
    </div>


    <div class="comments w-50">
        <h3>Comment</h3>

        <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="author_name">Author name</label>
                <input type="text" name="author_name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label for="message">Comment</label>
                <textarea name="message" class="form-control form-control-sm"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Comment</button>
        </form>

        @if($post->comments->count())
        <h3>Comments</h3>
            @foreach($comments as $comment)
            <div class="comment mb-4">
                <h5 class="comment_title">
                    <span class="comment_author_name">{{ $comment->author_name }}</span>
                    <small class="comment_date"> at {{ $comment->created_at->format('j F, Y') }}</small>
                </h5>
                <p>{{ $comment->message }}</p>
            </div>
            @endforeach
        @endif
    </div>
@endsection