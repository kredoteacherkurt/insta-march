@extends('layouts.app')


@section('title', 'following')

@section('content')
    @include('users.profile.header')

    <div style="margin-top: 100px">
        @if ($user->following->isNotEmpty())
            <div class="row justify-content-center">
                <div class="col-4">
                    <h3 class="text-muted text-center">following</h3>
                    <div class="row align-items-center mt-3">
                        @foreach ($user->following as $following)
                            <div class="col-auto">
                                <a href="{{ route('profile.show', $following->following->id) }}">
                                    @if ($following->following->avatar)
                                        <img src="{{ $following->following->avatar }}" alt=""
                                            class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                    @endif
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href=""
                                    class="text-decoration-none text-dark fw-bold">{{ $following->following->name }}</a>
                            </div>
                            <div class="col-auto text-end">
                                @if ($following->following->id != Auth::id())
                                    @if ($following->following->isFollowed())
                                        <form action="{{ route('follow.delete', $following->following->id) }}"
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
            <h3 class="text-muted text-center">No following yet</h3>
        @endif
    </div>
@endsection
