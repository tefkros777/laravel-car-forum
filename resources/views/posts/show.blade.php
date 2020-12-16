@extends('layouts.app')

@section('title', 'Post details')

@section('content')

<h2>View Post</h2>
<ul>
    <li><b>Post ID:</b> {{ $post->id }}</li>
    <li><b>Title:</b> {{ $post->title }}</li>
    <li><a href="{{ route('users.show', ['id' => $post->user->id]) }}"><b>Author:</b> {{ $post->user->name }}</a></li>


    @if($post->solved == 1)
    <li><b>Solved:</b> Yes</li>
    @else
    <li><b>Solved:</b> No</li>
    @endif

    <li><b>Body:</b> {{ $post->description }}</li>

</ul>

{{-- Delete post --}}
<form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete Post</button>
</form>


<h3>Comments</h3>
@foreach ($comments as $comment)
    <h3>Comment ID: {{$comment->id}}</h3>
    <h3>By user:
        <a href="{{ route('users.show', ['id' => $comment->user->id]) }}">
            {{ $comment->user->name }} ({{$comment->user_id}})
        </a>
    </h3>
    <h3>Text: {{$comment->text}}</h3>
@endforeach

@endsection


