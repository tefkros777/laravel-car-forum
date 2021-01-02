@extends('layouts.app')

@section('title', 'User details')

@section('content')
    <div class="card bg-light mx-auto" style="width: 22rem;">
        <div class="card-header">
            <h5>Details</h5>
        </div>
        @if ($user->image)
            <img class="card-img-top" src="{{ asset($user->image) }}" alt="Card image cap">
        @endif
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>User ID:</b> {{ $user->id }}</li>
            <li class="list-group-item"><b>Name:</b> {{ $user->name }}</li>
            <li class="list-group-item"><b>Email (username):</b> {{ $user->email }}</li>
        </ul>
        <div class="card-footer">
            @if ($user->id == Auth::user()->id || Auth::user()->isAdmin())
                <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete User</button>
                </form>
            @endif
        </div>

    </div>

@endsection
