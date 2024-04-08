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
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{$post->id}}" >
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