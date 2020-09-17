@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row">
            <h1 class="col-6 offset-3">
                Feed: <a href="/profile/{{ auth()->user()->id }}">{{ auth()->user()->name }}</a>
            </h1>
        </div>

        <hr>

        @foreach($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3">
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                        </span> {{ $post->caption }}
                    </p>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-6 offset-3 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
