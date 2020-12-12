@extends('layouts.app')

@section('title', 'New User')

@section('content')

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <p>Display name: <input type="text" name="name"
        value="{{ old('name') }}"></p>

    <p>Email address: <input type="text" name="email"
        value="{{ old('email') }}"></p>

    <input type="submit" value="Submit">

    <a href="{{ route('users.index') }}">Cancel</a>

</form>

@endsection
