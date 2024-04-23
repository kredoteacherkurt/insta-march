@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-8">
            @forelse ($all_posts as $post)
                <div class="card mb-4">
                    {{-- title --}}
                    @include('users.posts.contents.title')
                    {{-- body --}}
                    @include('users.posts.contents.body')
                </div>
            @empty
                <div class="text-center">
                    <h2>Share Photos</h2>
                    <p class="text-muted">
                        When you share photos, they'll appear on your profile
                        <a href="{{ route('post.create') }}" class="text-decoration-none">Share your first post</a>
                    </p>
                </div>
            @endforelse
        </div>
        <div class="col-4 ">
            @if ($suggested_users)
                <div class="row">
                    <div class="col-auto">
                        <p class="fw-bold text-secondary">Suggestions For You</p>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="fw-bold text-dark text-decoration-none">
                            See all
                        </a>
                    </div>
                </div>
                @foreach ($suggested_users as $user)
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            <a href="{{ route('profile.show', $user->id) }}">
                                @if ($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-user-circle text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a href="" class="text-decoration-none">{{ $user->name }}</a>
                        </div>
                        <div class="col text-end">
                            <form action="{{route('follow.store',$user->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn border-0 p-0 text-primary btn-sm">Follow</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
