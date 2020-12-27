@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')

<h3>Edit Comment</h3>

<form method="POST" action="{{ route('comments.update', $comment) }}">
    @csrf
    @method('PUT')
    <div class="card bg-light mb-3">
        {{-- Comment text --}}
        <div class="card-body">
            <div style="float: left; width: 100%;">
                <textarea class="border-0" name="text" rows="4"
                 style="width: 100%; max-width: 100%;">{{ $comment->text }}</textarea>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-primary mr-1">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>
        </div>
    </div>
</form>

@endsection
