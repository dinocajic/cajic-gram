@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/logo.jpg" class="w-100 rounded-circle" alt="Logo">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/post/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-4"><strong>400</strong> posts</div>
                <div class="pr-4"><strong>50k</strong> followers</div>
                <div class="pr-4"><strong>100</strong> following</div>
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
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <img src="/img/harrison-1.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="/img/harrison-2.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="/img/harrison-3.jpg" class="w-100" alt="">
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <img src="/img/harrison-4.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="/img/harrison-5.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="/img/harrison-6.jpg" class="w-100" alt="">
        </div>
    </div>
</div>
@endsection
