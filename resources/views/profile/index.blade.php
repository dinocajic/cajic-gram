@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle" alt="Logo">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center">
                        <h1 class="pr-3">{{ $user->username }}</h1>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <a href="/post/create">Add New Post</a>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-4"><strong>{{ $post_count }}</strong> posts</div>
                    <div class="pr-4"><strong>{{ $followers_count }}</strong> followers</div>
                    <div class="pr-4"><strong>{{ $following_count }}</strong> following</div>
                </div>
                <div class="pt-3">
                    <strong>{{ $user->profile->title  }}</strong>
                </div>
                <div>
                    {{ $user->profile->description }}
                </div>
                <div>
                    <strong><a href="http://{{ $user->profile->url }}" class="font-weight-bold">{{ $user->profile->url }}</a></strong>
                </div>
                @can('update', $user->profile)
                    <div>
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="row pt-4">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/post/{{$post->id}}">
                        <img src="/storage/{{ $post->image }}" class="w-100" alt="{{ $post->caption }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
