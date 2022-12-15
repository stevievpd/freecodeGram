@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle"
                    style="height: 180px; margin-left: 150px">
            </div>
            <div class="col-8 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->username }}</div>

                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <a href="/p/create" style="margin-right:50px">Add new post</a>
                    @endcan

                </div>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit" style="margin-right:50px">Edit profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pe-3"><strong>{{ $postCount }}</strong> posts</div>
                    <div class="pe-3"><strong>{{ $followersCount}}</strong> followers</div>
                    <div class="pe-3"><strong>{{ $followingCount}}</strong> following</div>
                </div>
                <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
            </div>
        </div>

        <div class="row p-5" style="margin-left: 50px">
            @foreach ($user->post as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
