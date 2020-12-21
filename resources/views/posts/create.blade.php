@extends('layouts.app')

@section('title', 'New Post')

@section('content')

<h3>New Post</h3>
<i>Posting as {{Auth::user()->name}}</i>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="card bg-light mb-3">
        {{-- Title --}}
        <div class="card-header">
            <input class="border-0" type="text" name="title" placeholder="Title"
                value="{{ old('title') }}">
        </div>
        {{-- Description --}}
        <div class="card-body">
            <div style="float: left; width: 100%;">
                <textarea class="border-0" name="description" rows="4" placeholder="Description"
                 style="width: 100%; max-width: 100%;"
                 value="{{ old('description') }}"></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>

        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>
        </div>
    </div>
</form>

@endsection
