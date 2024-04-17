@extends('layouts.app')


@section('title', 'Show profile')

@section('content')
    @include('users.profile.header')

    <div class="row mt-5">
        @forelse ($user->posts as $post)
            <div class="col-4 m-2">
                <a href="#">
                    <img src="{{$post->image}}" class="img-thumbnail" alt="">
                </a>
            </div>
        @empty
            <a href="#" class="alert alert-info">No posts yet</a>
        @endforelse
    </div>

@endsection
