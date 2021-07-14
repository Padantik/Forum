@extends("layouts.app")

@section("content")
    <div class="flex justify-center text-white">
        <div class="md:w-10/12 w-full bg-gray-900 rounded-lg h-screen text-center px-2 md:px-10">
            <div class="py-7">
                <h1 class="text-3xl font-bold">{{$user->username}}</h1>
            </div>
            <div class="py-4 px-2 md:px-4 md:py-7 border-t">
                    <div class="mb-2 md:mb-5">
                        <x-post-statistics :poststatistics="$user->posts" :action="'Created'" :type="'post'" />  
                    </div>
                    <div class="grid grid-cols-2 md:gap-5 gap-2">
                        <x-post-statistics :poststatistics="$user->likes" :action="'Liked'" :type="'post'" />  
                        <x-post-statistics :poststatistics="$user->dislikes" :action="'Disliked'" :type="'post'" /> 

                        <x-post-statistics :poststatistics="$user->totalLikes()" :action="'Received'" :type="'like'" />  
                        <x-post-statistics :poststatistics="$user->totalDislikes()" :action="'Received'" :type="'dislike'" />
                            
                        @foreach($posts as $post)

                            @if(count(max(array_column($posts, 'likes'))))
                                @if(max(array_column($posts, 'likes'))[0]->post_id == $post->id)
                                    <x-side-bar-post :sidebarpost="$post" :sidebarpostheader="'Liked Comment'"/>
                                @endif
                            @endif
                            
                            @if(count(max(array_column($posts, 'dislikes'))))
                                @if(max(array_column($posts, 'dislikes'))[0]->post_id == $post->id)
                                    <x-side-bar-post :sidebarpost="$post" :sidebarpostheader="'Disliked Comment'"/>
                                @endif
                            @endif

                        @endforeach
                        
                    </div>


            </div>
        </div>    
    </div>
@endsection

@section("sidebarContent")
    <x-side-bar-user :requestingUser="$request" :selectedUser="$user" :allUsers="$allUsers" :posts="$posts"/>
@endsection