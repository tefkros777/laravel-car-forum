@extends('layouts.app')

@section('title', 'Post details')

@section('content')

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

    {{-- To include comments too --}}

</ul>

{{-- Delete post --}}
<form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete Post</button>
</form>

@endsection


