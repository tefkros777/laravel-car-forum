@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<h3>Edit Post</h3>

<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    <div class="card bg-light mb-3">
        {{-- Title --}}
        <div class="card-header">
            <input class="border-0" type="text" name="title" placeholder="Title"
                value="{{ $post->title }}">
        </div>
        {{-- Description --}}
        <div class="card-body">
            <div style="float: left; width: 100%;">
                <textarea class="border-0" name="description" rows="4" placeholder="Description"
                 style="width: 100%; max-width: 100%;">{{ $post->description }}"</textarea>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-primary">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>
        </div>
    </div>
</form>

@endsection
