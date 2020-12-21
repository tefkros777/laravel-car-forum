@extends('layouts.app')

@section('title', 'New Post')

@section('content')

<h3>New Post</h3>
<h5>Posting as {{Auth::user()->name}}</h5>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <p>Title: <input type="text" name="title"
        value="{{ old('title') }}"></p>

    <p>Description: <input type="text" name="description"
        value="{{ old('description') }}"></p>

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <input type="submit" value="Submit">

    <a href="{{ route('posts.index') }}">Cancel</a>

</form>

@endsection
