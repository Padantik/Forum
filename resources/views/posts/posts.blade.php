@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="w-full md:w-9/12 bg-white p-6 rounded-lg h-auto">
            

            <!--Renders Posts-->
            {{$posts->links()}}
            <div>
                @if ($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post" />
                    @endforeach

                @else
                <div class="mb-4">
                    <p>There is nothing :( </p>
                </div>
                @endif
            </div>
            <form action="{{route('posts')}}" method="post" id="comment-form">
            @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="1" class="bg-gray-100 border-2 w-full p-2 rounded-full resize-none @error('body') border-red-500 @enderror focus:outline-none"  placeholder="Write a comment..." maxlength="250"></textarea>
                    @error("body")
                        <div class="text-red-500 m-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </form>
        </div>    
    </div>


@endsection
