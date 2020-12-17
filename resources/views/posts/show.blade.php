@extends('layouts.app')

@section('title', 'Post details')

@section('content')

    <h3>Post</h3>

    <div class="card bg-light mb-3">
        <div class="card-header">
            <b>{{ $post->title }}</b>
        </div>
        <ul>
            <li><b>Post ID:</b> {{ $post->id }}</li>
            <li><a href="{{ route('users.show', ['id' => $post->user->id]) }}"><b>Author:</b> {{ $post->user->name }}</a></li>
            @if($post->solved == 1)
            <li><b>Solved:</b> Yes</li>
            @else
            <li><b>Solved:</b> No</li>
            @endif
            <li><b>Body:</b> {{ $post->description }}</li>
        </ul>
        <div class="card-footer">
            {{-- Delete post --}}
            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete Post</button>
            </form>
        </div>
    </div>

    <h3>Comments</h3>
    @foreach ($comments as $comment)
        <div class="card bg-light mb-3">
            <div class="card-header">
                <i>By</i>
                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}">
                    {{ $comment->user->name }} ({{$comment->user_id}})
                </a>
                <i>on</i>
                {{ $comment->created_at }}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $comment->text }}</p>
            </div>
        </div>
    @endforeach

    </div>

@endsection


