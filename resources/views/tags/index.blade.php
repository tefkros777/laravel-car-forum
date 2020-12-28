@extends('layouts.app')

@section('title', 'All Tags')

@section('content')
    <div class="card bg-light mb-3">
            <div class="card-header">
                <h3>All Tags</h3>
            </div>

        <ul>
            @foreach ($tags as $tag)
            <li><a href="{{ route('tags.show', ['tag' => $tag]) }}">{{ $tag->label }}</a></li>
            @endforeach
        </ul>

    </div>

    <div class="d-flex justify-content-center">
        {!! $tags->links() !!}
    </div>

@endsection
