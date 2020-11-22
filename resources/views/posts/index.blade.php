@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <p>This is a list of all the posts in the database</p>

    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>

@endsection
