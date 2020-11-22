@extends('layouts.app')

@section('title', 'User details')

@section('content')

<ul>
    <li>User ID: {{ $user->id }}</li>
    <li>Name: {{ $user->name }}</li>
    <li>email: {{ $user->email }}</li>
</ul>

@endsection
