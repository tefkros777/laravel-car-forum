@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<p>This is a list of all the posts in the database</p>

<ul>
    @foreach ($posts as $post)
    <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
    @endforeach
</ul>

<a href="{{ route('posts.create') }}">Create New Post</a>

@endsection
