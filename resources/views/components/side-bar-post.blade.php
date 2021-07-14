<div class="p-3">
    <div class="bg-gray-800 rounded-lg py-4 px-1 hover:bg-gray-700">
        <div class="text-center mb-3">
            <h1 class="text-xl">{{ $sidebarpostheader }}</h1>
        </div>
        <div class="inline-flex w-full">
            <div class="w-full h-auto user-posts">
                <div class="inline-flex w-full">
                    <div class="w-auto">
                        <a href="{{ route('user.posts', $sidebarpost->user) }}" title="{{ $sidebarpost->user->username }}'s activity">    
                            <i class="fas fa-user-circle text-2xl hover:opacity-50"></i>
                        </a>
                    </div>
                    <div class="w-full mx-2">
                        <div class="w-full bg-gray-600 px-2 py-1 rounded-lg">
                            <a href="{{ route('user.posts', $sidebarpost->user) }}" title="{{ $sidebarpost->user->username }}'s activity">
                                <h1 class="text-xl font-medium table-cell hover:opacity-50">{{ $sidebarpost->user->username }}</h1>
                            </a>
                            <p class="text-sm px-1 break-words w-full">{{ $sidebarpost->body }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex w-full my-0 relative">
                    <div class="mx-9 flex md:text-sm text-xs">
                        <div class="mx-1">
                            <p class="text-gray-400 text-sm ml-2" title="{{$sidebarpost->created_at->diffForHumans()}}">{{  substr($sidebarpost->created_at->diffForHumans(), 0 , strpos($sidebarpost->created_at->diffForHumans(), " ") + 2)  }}</p>
                        </div>
                        <div class="absolute top-0 right-0 text-xs mx-2">
                            @if(!$sidebarpost->likedBy(auth()->user()))
                                <span><i class="fas fa-thumbs-up"></i> {{$sidebarpost->likes->count()}}</span>
                            @else
                                <span><i class="fas fa-thumbs-up text-green-400" title="Liked by You"></i> {{$sidebarpost->likes->count()}}</span>
                            @endif

                            @if(!$sidebarpost->dislikedBy(auth()->user()))
                                <span><i class="fas fa-thumbs-down"></i> {{$sidebarpost->dislikes->count()}}</span>
                            @else
                                <span><i class="fas fa-thumbs-down text-red-400" title="Disliked by You"></i> {{$sidebarpost->dislikes->count()}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
