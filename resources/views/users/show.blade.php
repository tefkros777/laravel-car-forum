@extends('layouts.app')

@section('title', 'User details')

@section('content')
    <div class="card bg-light mx-auto" style="width: 22rem;">
        <div class="card-header">
            <h5>User Account Details</h5>
        </div>
        @if ($user->image)
            <img class="card-img-top" src="{{ asset($user->image) }}" alt="Card image cap">
        @endif
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Name:</b> {{ $user->name }}</li>
            <li class="list-group-item"><b>Email contact:</b> {{ $user->email }}</li>
            <li class="list-group-item"><b>User ID:</b> {{ $user->id }}</li>
            <li class="list-group-item"><b>Account type:</b>
                @if ($user->isAdmin() == true)
                    Administrator
                @else
                    Standard
                @endif
            </li>
            <li class="list-group-item"><b>Joined on:</b> {{ $user->created_at }}</li>
            <li class="list-group-item"><b>Last updated on:</b> {{ $user->updated_at}}</li>

        </ul>
        @auth
            @if (Auth::user()->isAdmin())
                <div class="card-footer">

                    <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete User</button>
                    </form>
                </div>
            @elseif (Auth::user()->id == $user->id)
                <div class="card-footer">
                    <i>To delete your account, click your name on the top right > Profile > Delete Profile</i>
                </div>
            @endif
        @endauth

    </div>

@endsection
