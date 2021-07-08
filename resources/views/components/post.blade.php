<!--Post Body-->
<div class="w-full h-auto user-posts" id="post-body">
    <div class="inline-flex w-full">
        <div class="w-auto">
            <a href="{{ route('user.posts', $post->user) }}" title="{{ $post->user->username }}'s activity">    
                <i class="fas fa-user-circle text-2xl hover:opacity-50"></i>
            </a>
        </div>
        <div class="w-full mx-2">
            <div class="w-full bg-gray-600 px-2 py-1 rounded-lg">
                <a href="{{ route('user.posts', $post->user) }}" title="{{ $post->user->username }}'s activity">
                    <h1 class="text-xl font-medium table-cell hover:opacity-50">{{ $post->user->username }}</h1>
                </a>
                <p class="text-sm px-1 break-words w-full">{{ $post->body }}</p>
            </div>
        </div>
    </div>
    <div class="flex w-full my-0 relative">
        <div class="mx-9 flex md:text-sm text-xs">
            <div class="mr-2">
                @if(!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post->id) }}" method="post" onsubmit="">
                        @csrf
                        <button type="submit" class="focus:outline-none">
                            <p class="hover:text-green-100">Like</p>
                        </button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="focus:outline-none">
                            <p class="text-green-400 hover:opacity-50">Like</p>
                        </button>
                    </form>
                @endif
            </div>     	
            <p>&#183;</p>
            <div class="mx-2">
                @if(!$post->dislikedBy(auth()->user()))
                    <form action="{{ route('posts.dislikes', $post->id) }}" method="post">
                        @csrf
                        <button type="submit" class="focus:outline-none">
                            <p class="hover:text-red-100">Dislike</p>
                        </button>
                    </form>
                @else
                    <form action="{{ route('posts.dislikes', $post) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="focus:outline-none">
                            <p class="text-red-400 hover:opacity-50">Disike</p>
                        </button>
                    </form>
                @endif
            </div>	
            <p>&#183;</p>
            <div class="mx-2">
                @if(auth()->user()->username === $post->user->username)
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="focus:outline-none">
                            <p class="hover:opacity-50">Delete</p>
                        </button>
                    </form>
                @endif
            </div>
            <p>&#183;</p>
            <div class="mx-1">
                <p class="text-gray-400 text-sm ml-2" title="{{$post->created_at->diffForHumans()}}">{{  substr($post->created_at->diffForHumans(), 0 , strpos($post->created_at->diffForHumans(), " ") + 2)  }}</p>
            </div>
            <div class="absolute top-0 right-0 text-xs mx-2">
                <span><i class="fas fa-thumbs-up"></i> {{$post->likes->count()}}</span>
                <span><i class="fas fa-thumbs-down"></i> {{$post->dislikes->count()}}</span>
            </div>
        </div>
    </div>
</div>


