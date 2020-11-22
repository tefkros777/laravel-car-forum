@extends('layouts.app')

@section('title', 'Post details')

@section('content')

<ul>
    <li>Post ID: {{ $post->id }}</li>
    <li>Title: {{ $post->title }}</li>
    {{-- <li>Author: {{ $post->user->name }} (User ID: {{ $post->user->id }})</li> --}}
    <li><a href="{{ route('users.show', ['id' => $post->user->id]) }}">Author: {{ $post->user->name }}</a></li>


    @if($post->solved == 1)
    <li>Solved: Yes</li>
    @else
    <li>Solved: No</li>
    @endif

    <li>Body: {{ $post->description }}</li>
</ul>

@endsection


