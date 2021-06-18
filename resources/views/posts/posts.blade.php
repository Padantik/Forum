@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="lg:w-6/12 md:w-8/12 w-10/12 bg-white p-6 rounded-lg">
            <div class="text-center mb-6 p-6 border-b-2">  
               <h1 class="text-3xl font-bold">Post</h1>
            </div>
            <form action="{{route('posts')}}" method="post">
            @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="5" class="bg-gray-100 border-2 w-full p-4 rounded-lg resize-none @error('body') border-red-500 @enderror" placeholder="What's on your mind?" maxlength="250"></textarea>
                    @error("body")
                        <div class="text-red-500 m-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-purple-500 text-white px-6 py-2 rounded font-medium hover:bg-purple-600">Post</button>
                    <div class="object-contain bg-gray-50 float-right p-2 rounded border">
                        <span class="text-sm" id="remainingCharacters">250 remaining</span>
                    </div>
                    
                </div>
            </form>

            <!--Renders Posts-->
            @if ($posts->count())
                @foreach($posts as $post)
                    <!--Post Body-->
                    <div class="mb-4 w-full bg-gray-100 p-6 rounded border">
                        <div class="mr-2 mb-2 inline">
                            <i class="fas fa-user-circle text-2xl"></i>
                        </div>
                        <!--Post Creator-->
                        <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->username}}</a>
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

                {{$posts->links()}}
            @else
            <div class="mb-4">
                <p>There is nothing :( </p>
            </div>
            @endif
        </div>    
    </div>


@endsection
