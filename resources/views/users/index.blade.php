@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <div class="card bg-light mb-3">
            <div class="card-header">
                <h3>All Users</h3>
            </div>

        <ul>
            @foreach ($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
            @endforeach
        </ul>

    </div>

    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>

@endsection
