@extends('layouts.app')

@section('title', 'All Users')

@section('content')
<p>This is a list of all the users in the database</p>

<ul>
    @foreach ($users as $user)
    <li><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
    @endforeach
</ul>

<a href="{{ route('users.create') }}">New User</a>

@endsection
