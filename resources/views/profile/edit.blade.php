@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>

                <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">

                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>

                        <input
                            id="name"
                            type="text"
                            class="form-control
                            @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') ?? $user->name }}"
                            required
                            autocomplete="Name"
                            autofocus
                        >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label">Username</label>

                        <input
                            id="username"
                            type="text"
                            class="form-control
                            @error('username') is-invalid @enderror"
                            name="username"
                            value="{{ old('username') ?? $user->username }}"
                            required
                            autocomplete="Username"
                        >

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">Email</label>

                        <input
                            id="email"
                            type="text"
                            class="form-control
                            @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') ?? $user->email }}"
                            required
                            autocomplete="Email"
                        >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>

                        <input
                            id="title"
                            type="text"
                            class="form-control
                            @error('title') is-invalid @enderror"
                            name="title"
                            value="{{ old('title') ?? $user->profile->title }}"
                            required
                            autocomplete="Title"
                        >

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>

                        <input
                            id="description"
                            type="text"
                            class="form-control
                            @error('description') is-invalid @enderror"
                            name="description"
                            value="{{ old('description') ?? $user->profile->description }}"
                            required
                            autocomplete="Description"
                        >

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">URL</label>

                        <input
                            id="url"
                            type="text"
                            class="form-control
                            @error('url') is-invalid @enderror"
                            name="url"
                            value="{{ old('url') ?? $user->profile->url }}"
                            required
                            autocomplete="URL"
                        >

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>

                        <input
                            id="image"
                            type="file"
                            class="form-control-file"
                            name="image"
                        >

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row pt-3">
                        <button class="btn btn-primary">Update Profile</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
