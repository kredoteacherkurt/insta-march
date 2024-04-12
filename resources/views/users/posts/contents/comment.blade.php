<div class="mt-3">
    {{-- show comments here --}}
    @if ($post->comments)

        <ul class="list-group mt-2">
            @foreach ($post->comments->take(3) as $comment)
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
                @if ($loop->last)
                    <li class="list-group-item border-0 p-0 mb-2">
                        <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none small">View all
                            {{ $post->comments->count() }} comments </a>
                    </li>
                @endif
            @endforeach
        </ul>

    @endif


    <form action="{{ route('comment.store', $post->id) }}" method="post">
        @csrf

        <div class="input-group">
            <textarea name="body" id="" rows="1" class="form-control form-control-sm"
                placeholder="Add a comment .."></textarea>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>

        </div>
    </form>
</div>
