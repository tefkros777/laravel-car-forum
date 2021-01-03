@extends('layouts.app')

@section('title', 'Lisence')

@section('content')

    <div class="card bg-light mb-3">
        <div class="card-header">
            <h3>Lisence Details</h3>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Lisence Number:</b> {{ $lisence->lisence_number }}</li>
            <li class="list-group-item"><b>Country of issue:</b> {{ $lisence->lisence_country }}</li>
            <li class="list-group-item"><b>Type of vehicle:</b>
                @if ($lisence->automatic)
                    Automatic
                @else
                    Manual
                @endif
            </li>
            <li class="list-group-item"><b>Holder:</b>
                <a href="{{ route('users.show', ['id' => $lisence->user->id]) }}">
                    {{ $lisence->user->name }}
                </a>
            </li>
        </ul>

    </div>

@endsection
