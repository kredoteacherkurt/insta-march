@extends('layouts.app')

@section('title', 'Show post')

@section('content')
    <div class="row border shadow">
        <div class="col p-0 border-end">
            <img src="{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4 px-0 bg-white">
            <div class="card border-0">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            {{-- display icon or avatar --}}
                            @if ($post->user->avatar)
                                <img src="#" alt="" class="rounded-circle avatar-sm">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                            @endif
                        </div>
                        <div class="col ps-0">
                            {{-- display the name of the owner --}}
                            <a href="" class="text-decoration-none text-dark">
                                {{ $post->user->name }}
                            </a>
                        </div>
                        <div class="col-auto">
                            {{-- the option to edit or delete, or to follow/unfollow --}}
                            {{-- if you own the post, you can delete and edit --}}
                            {{-- if you dont own the post, you can only follow  --}}

                            <div class="dropdown">
                                <button class="btn btn-sm shadow-none border-0" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if ($post->user->id == Auth::id())
                                        {{-- edit and delete --}}
                                        <a href="#" class="dropdown-item text-warning">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-post-{{ $post->id }}">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    @else
                                        {{-- follow --}}
                                    @endif
                                </div>
                            </div>
                            @include('users.posts.contents.modals.delete')


                        </div>
                    </div>
                </div>
                <div class="card-body w-100">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            {{-- heart button --}}
                            <form action="#" method="post">
                                @csrf

                                <button class="btn btn-sm shadow-none border-0 p-0">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-auto px-0">
                            {{-- coounter --}}
                            <span>3</span>
                        </div>
                        <div class="col text-end">
                            {{-- categories --}}
                            @foreach ($post->category_post as $categoryPost)
                                <div class="badge bg-opacity-50 bg-secondary">
                                    {{ $categoryPost->category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- owner and description --}}
                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
                    &nbsp;
                    <p class="d-inline fw-light">{{ $post->description }}</p>
                    <p class="text-muted small">{{ $post->created_at->diffForHumans() }}</p>
                    <div class="mt-3">
                        <ul class="list-group mt-2">
                            @foreach ($post->comments as $comment)
                                <li class="list-group-item border-0 p-0 mb-2">
                                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                    &nbsp;
                                    <p class="d-inline fw-light">{{ $comment->body }}</p>
                                    <form action="{{ route('comment.delete', $comment) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                                        @if ($comment->user_id == Auth::id())
                                            &middot;
                                            <button class="btn border-0 text-danger p-0 small">Delete</button>
                                        @endif
                                    </form>
                                </li>

                            @endforeach
                        </ul>

                        <form action="#" method="post">
                            @csrf

                            <div class="input-group">
                                <textarea name="body" id="" rows="1" class="form-control form-control-sm"
                                    placeholder="Add a comment .."></textarea>
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
