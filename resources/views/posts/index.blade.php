@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

    <div class="card bg-light mb-3">
        <div class="card-header">
            <h3>All Posts</h3>
        </div>

        <ul>
            @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        {{-- Show Create Post button only if user is authenticated --}}
        @if(Auth::check())
            <div class="card-footer">
                <a class="btn btn-success" href="{{ route('posts.create') }}">Create New Post</a>
            </div>
        @endif
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>

@endsection
