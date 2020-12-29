@extends('layouts.app')

@section('title', 'Post details')

@section('content')

    <h3>Post</h3>

    <div class="card bg-light mb-3">
        <div class="card-header">
            <b>{{ $post->title }}</b>
        </div>
        <ul>
            <li><b>Post ID:</b> {{ $post->id }}</li>
            <li><a href="{{ route('users.show', ['id' => $post->user->id]) }}"><b>Author:</b> {{ $post->user->name }}</a></li>
            @if($post->solved == 1)
            <li><b>Solved:</b> Yes</li>
            @else
            <li><b>Solved:</b> No</li>
            @endif
            <li><b>Body:</b> {{ $post->description }}</li>
            <li><b>Tags:</b>
                <ul>
                    @foreach ($post->tags as $tag)
                        <li><a href="{{ route('tags.show', ['tag' => $tag]) }}">{{$tag->label}} ({{$tag->id}})</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        {{-- Show edit and delete button only if authenrticated user is the post's author --}}
        @auth
            @can('manage-post', $post)
                <div class="card-footer">
                    <div class="d-flex">
                        {{-- Edit button --}}
                        <a class="btn btn-dark mr-1" href="/posts/{{$post->id}}/edit">Edit</a>
                        {{-- Delete button --}}
                        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete Post</button>
                        </form>
                    </div>
                </div>
            @endcan
        @endauth
    </div>

    {{-- Comment Section --}}
    <h3>Comments</h3>

    {{-- Post comment if authenticated --}}
    @auth
    <form method="POST" action="{{ route('comments.add') }}">
        @csrf
        <div class="card bg-light mb-3">
            <div class="card-header">
                <i>Commenting as {{Auth::user()->name}}</i>
            </div>
            <div class="card-body">
                <textarea class="border-0" name="text" rows="3" placeholder="Your comment here..."
                style="width: 100%; max-width: 100%;"></textarea>
            </div>
            <div class="card-footer">
                <input type="submit" value="Comment" class="btn btn-primary">
            </div>
        </div>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
        <input type="hidden" name="user_id" id="user_id" value="{{ $post->user->id }}" />
    </form>
    @endauth
    @guest
        <h5><i>You must me logged in to post comments</i></h5>
    @endguest

    {{-- Existing comments --}}
    @foreach ($comments as $comment)
        <div class="card bg-light mb-3">
            <div class="card-header">
                <i>By</i>
                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}">
                    {{ $comment->user->name }} ({{$comment->user_id}})
                </a>
                <i>on</i>
                {{ $comment->created_at }}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $comment->text }}</p>
            </div>
            {{-- Show edit and delete button only if authenrticated user is the comment's author --}}
            @auth
            @can('manage-comment', $comment)
                <div class="card-footer">
                    <div class="d-flex">
                        {{-- Edit button --}}
                        <a class="btn btn-dark mr-1" href="/comments/{{$comment->id}}/edit">Edit</a>
                        {{-- Delete button --}}
                        <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endcan
            @endauth
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $comments->links() !!}
    </div>

    </div>

@endsection


