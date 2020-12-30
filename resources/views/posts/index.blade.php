@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

    <div class="container">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">Posts</h2>

                {{-- Show Create Post button only if user is authenticated --}}
                @if(Auth::check())
                    <a class="btn btn-success" href="{{ route('posts.create') }}">Create New Post</a>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <ul>
                            @foreach ($posts as $post)
                                <tr>
                                    <td><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }} </td>
                                    <td><a href="{{ route('users.show', ['id' => $post->user->id]) }}">{{ ($post->user->name) }} </td>
                                </tr>
                            @endforeach
                        </ul>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>

@endsection
