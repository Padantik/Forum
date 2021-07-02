@extends("layouts.app")

@section("content")
    <div class="flex justify-center h-screen">
        <div class="w-full md:w-9/12 bg-white p-6 rounded-lg">
            

            <!--Renders Posts-->
            <div class="mb-2" style="height:90%">
                @if ($posts->count()) 
                
                    <div class="overflow-y-scroll flex-row-reverse" id="post-display" style="height:90%">
                        @foreach( ($posts) as $post)
                            <x-post :post="$post" />
                        @endforeach
                    </div>
                    <div style="height:10%">
                        {{$posts->links()}}
                    </div>
                @else
                <div class="mb-4">
                    <p>There is nothing :( </p>
                </div>
                @endif
            </div>

            <div class="border" style="height:10%">
                <form action="{{route('posts')}}" method="post" id="comment-form">
                @csrf
                    <div class="mb-2">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="1" class="bg-gray-100 border-2 w-full p-2 rounded-full resize-none @error('body') border-red-500 @enderror focus:outline-none"  placeholder="Write a comment..." maxlength="150"></textarea>
                        @error("body")
                            <div class="text-red-500 m-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </form>
                <div class="w-full block relative">
                    <p id="remainingCharacters" class="">150/150</p>
                </div>
                <div class="w-full block">
                    
                </div>
            </div>
            
        </div>    
    </div>


@endsection
