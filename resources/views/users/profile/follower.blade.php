@extends('layouts.app')


@section('title', 'Followers')

@section('content')
    @include('users.profile.header')

    <div style="margin-top: 100px">
        @if ($user->followers->isNotEmpty())
            <div class="row justify-content-center">
                <div class="col-4">
                    <h3 class="text-muted text-center">Followers</h3>
                    <div class="row align-items-center mt-3">
                        @foreach ($user->followers as $follower)
                            <div class="col-auto">
                                <a href="{{ route('profile.show', $follower->follower->id) }}">
                                    @if ($follower->follower->avatar)
                                        <img src="{{ $follower->follower->avatar }}" alt=""
                                            class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                    @endif
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href=""
                                    class="text-decoration-none text-dark fw-bold">{{ $follower->follower->name }}</a>
                            </div>
                            <div class="col-auto text-end">
                                @if ($follower->follower->id != Auth::id())
                                    @if ($follower->follower->isFollowed())
                                        <form action="{{ route('follow.delete', $follower->follower->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger shadow-none btn-sm">Unfollow</button>
                                        </form>
                                    @else
                                        <form action="" method="post">
                                            @csrf

                                            <button type="submit" class="btn text-primary shadow-none btn-sm">Follow</button>
                                        </form>

                                    @endif

                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <h3 class="text-muted text-center">No followers yet</h3>
        @endif
    </div>
@endsection
