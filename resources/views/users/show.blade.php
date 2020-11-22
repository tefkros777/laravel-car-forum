@extends('layouts.app')

@section('title', 'User details')

@section('content')

<ul>
    <li><b>User ID:</b> {{ $user->id }}</li>
    <li><b>Name:</b> {{$user->name }}</li>
    <li><b>email:</b> {{ $user->email }}</li>
</ul>

@endsection
