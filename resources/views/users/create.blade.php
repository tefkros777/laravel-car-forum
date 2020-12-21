@extends('layouts.app')

@section('title', 'New User')

@section('content')

<h3>New User</h3>

<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="card bg-light mb-3">
        {{-- Name --}}
        <div class="card-header">
            <input class="border-0" type="text" name="name" placeholder="Display name"
                value="{{ old('name') }}">
        </div>
        {{-- Email --}}
        <div class="card-body">
            <div style="float: left; width: 100%;">
                <input class="border-0" type="text" name="email" placeholder="Email address"
                value="{{ old('email') }}">
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Cancel</a>
        </div>
    </div>

</form>

@endsection
