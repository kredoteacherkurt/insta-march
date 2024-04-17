<div class="container p-0">
    {{-- image --}}
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ $post->image }}" alt="" class="w-100">
    </a>
</div>
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- heart button --}}
            @if ($post->isLiked())
                <form action="{{route('like.destroy',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button class="btn btn-sm shadow-none border-0 p-0">
                        <i class="fa-solid text-danger fa-heart"></i>
                    </button>
                </form>
            @else
                <form action="{{ route('like.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button class="btn btn-sm shadow-none border-0 p-0">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </form>
            @endif
        </div>
        <div class="col-auto px-0">
            {{-- coounter --}}
            <span>{{ $post->likes->count() }}</span>
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

    @include('users.posts.contents.comment')
</div>
