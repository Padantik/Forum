@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="lg:w-6/12 md:w-8/12 w-10/12 bg-white p-6 rounded-lg">
            <div class="text-center mb-6 p-6 border-b-2">
                <h1 class="text-3xl font-bold">{{$user->username}}'s Activity</h1>
            </div>
            @if($posts)
                @foreach($posts as $post)
                     <!--Post Body-->
                     <div class="mb-4 w-full bg-gray-100 p-6 rounded border">
                        <div class="mr-2 mb-2 inline">
                            <i class="fas fa-user-circle text-2xl"></i>
                        </div>
                        <!--Post Creator-->
                        <p href="{{ route('user.posts', $post->user) }}" class="font-bold inline">{{ $post->user->username}}</p>
                        <span class="text-gray-600 text-sm ml-2">{{$post->created_at->diffForHumans()}}</span>

                        <!--Edit/Delete Posts-->
                            <!--Delete-->
                            @if(auth()->user()->username === $post->user->username)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="m-1 float-right">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit">
                                        <i class="fas fa-times hover:opacity-50"></i>
                                    </button>
                                </form>
                            @endif


                        <!--Actual Post Content-->
                            <p class="mb-2">{{$post->body}}</p>


                        <!--Liking/Disliking-->
                            <div class="flex items-center">
                            <!--Likes-->
                                @if(!$post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post->id) }}" method="post" class="m-1" onsubmit="">
                                        @csrf
                                        <button type="submit">
                                            <i class="fas fa-thumbs-up hover:opacity-50"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes', $post) }}" method="post" class="m-1">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">
                                            <i class="fas fa-thumbs-up text-purple-500 hover:opacity-50"></i>
                                        </button>
                                    </form>
                                @endif
                                    <span class="mr-2">{{$post->likes->count()}}</span>

                            <!--Dislikes-->
                                @if(!$post->dislikedBy(auth()->user()))
                                    <form action="{{ route('posts.dislikes', $post->id) }}" method="post" class="m-1">
                                        @csrf
                                        <button type="submit">
                                            <i class="fas fa-thumbs-down hover:opacity-50"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.dislikes', $post) }}" method="post" class="m-1">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">
                                            <i class="fas fa-thumbs-down text-red-500 hover:opacity-50"></i>
                                        </button>
                                    </form>
                                @endif
                                <span class="mr-2">{{$post->dislikes->count()}}</span>    
                            </div>
                    </div>
                @endforeach
            @endif
        </div>    
    </div>
@endsection