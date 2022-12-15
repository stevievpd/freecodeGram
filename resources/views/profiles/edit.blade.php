@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="form group row mb-3">
                        <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') ?? $user->profile->title }}" name="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form group row mb-3">
                        <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                            value="{{ old('description')  ?? $user->profile->description }}" name="description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form group row mb-3">
                        <label for="url" class="col-md-4 col-form-label">{{ __('URL') }}</label>
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                            value="{{ old('url')  ?? $user->profile->url }}" name="url">
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">{{ __('Profile image') }}</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
