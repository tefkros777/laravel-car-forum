@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<h3>All posts</h3>

<ul>
    @foreach ($posts as $post)
    <li><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
    @endforeach
</ul>

<a href="{{ route('posts.create') }}">Create New Post</a>

@endsection
