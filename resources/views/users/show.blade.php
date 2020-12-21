@extends('layouts.app')

@section('title', 'User details')

@section('content')

<h3>User details</h3>

<div class="card bg-light mb-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>User ID:</b> {{ $user->id }}</li>
        <li class="list-group-item"><b>Name:</b> {{$user->name }}</li>
        <li class="list-group-item"><b>Email (username):</b> {{ $user->email }}</li>
    </ul>
</div>

<form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Delete User</button>
</form>

@endsection
