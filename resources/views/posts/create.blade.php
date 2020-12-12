@extends('layouts.app')

@section('title', 'New Post')

@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <p>Title: <input type="text" name="title"
        value="{{ old('title') }}"></p>

    <p>Description: <input type="text" name="description"
        value="{{ old('description') }}"></p>

    <p>User ID: <input type="text" name="user_id"
        value="{{ old('user_id') }}"></p>

    <input type="submit" value="Submit">

    <a href="{{ route('posts.index') }}">Cancel</a>

</form>

@endsection