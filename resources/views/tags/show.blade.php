@extends('layouts.app')

@section('title', 'Tag {{$tag->label}}')

@section('content')

    <div class="card bg-light mb-3">
        <div class="card-header">
            <h3>All Posts under the "{{$tag->label}}" tag</h3>
        </div>

        <ul>
            @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

    </div>

    {{-- Pagination --}}
    {{-- <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div> --}}

@endsection
