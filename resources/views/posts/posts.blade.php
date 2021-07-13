@extends("layouts.app")

@section("content")
    <!--Desktop View-->
    <div class="justify-center text-white flex">
        <div class="md:w-10/12 w-full bg-gray-900 px-3 pb-10 pt-3 rounded-lg h-screen">
        <!--Renders Posts-->
            <div class="mb-1 py-1">
                @if ($posts) 
                
                    <div class="overflow-y-scroll h-5/6" id="post-display">
                        @foreach($posts as $post)
                            <x-post :post="$post" />
                        @endforeach
                    </div>
                @else
                <div class="mb-4">
                    <p>No Activity </p>
                </div>
                @endif
            </div>
            <div class="h-1/6 mb-2">
                <form action="{{route('posts')}}" method="post" id="comment-form" class="inline">
                @csrf
                    <div class="mb-2 flex">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="1" class="body bg-gray-100 border-2 w-10/12 md:w-full p-2 rounded-md resize-none bg-gray-200 text-black focus:outline-none" placeholder="Write a comment..." maxlength="200"></textarea>
                        <div class="w-2/12 text-center inline-flex md:hidden">
                            <button type="submit" class="text-center w-full h-full">    
                                <i class="fas fa-paper-plane text-3xl"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
@endsection

@section("sidebarContent")

    <div class="p-3">
        <div class="bg-gray-800 rounded-lg py-4 px-1">
            <div class="text-center mb-3">
                <h1 class="text-xl">Recent Comments</h1>
            </div>
            <div class="inline-flex w-full">
                <x-side-bar-post :sidebarpost="end($posts)" />
            </div>
        </div>
    </div>
    

    @foreach($posts as $post)

        @if(count(max(array_column($posts, 'likes'))))
            @if(max(array_column($posts, 'likes'))[0]->post_id == $post->id)
                <div class="p-3">
                    <div class="bg-gray-800 rounded-lg py-4 px-1">
                        <div class="text-center mb-3">
                            <h1 class="text-xl">Liked Comment</h1>
                        </div>
                        <div class="inline-flex w-full">
                            <x-side-bar-post :sidebarpost="$post" />
                        </div>
                    </div>
                </div>
            @endif
        @endif
        
        @if(count(max(array_column($posts, 'dislikes'))))
            @if(max(array_column($posts, 'dislikes'))[0]->post_id == $post->id)
                <div class="p-3">
                    <div class="bg-gray-800 rounded-lg py-4 px-1">
                        <div class="text-center mb-3">
                            <h1 class="text-xl">Disliked Comment</h1>
                        </div>
                        <div class="inline-flex w-full">
                            <x-side-bar-post :sidebarpost="$post" />
                        </div>
                    </div>
                </div>
            @endif
        @endif

    @endforeach
  
@endsection

