<div class="container p-0">
    {{-- image --}}
    <img src="{{$post->image}}" alt="" class="w-100">
</div>
<div class="card-body">
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
                    {{$categoryPost->category->name}}
                </div>
            @endforeach
        </div>
    </div>
</div>
