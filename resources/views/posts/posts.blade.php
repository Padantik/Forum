@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="w-full md:w-9/12 bg-white p-6 rounded-lg">
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
                    <button type="submit" class="text-white px-6 py-2 rounded font-medium magneta magneta-button">Post</button>
                    <div class="object-contain bg-gray-50 float-right p-2 rounded border">
                        <span class="text-sm" id="remainingCharacters">250 remaining</span>
                    </div>
                    
                </div>
            </form>

            <!--Renders Posts-->
            @if ($posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post" />
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
