@extends("layouts.app")

@section("content")
    <div class="flex justify-center text-white">
        <div class="md:w-10/12 w-full bg-gray-900 px-3 pb-10 pt-3 rounded-lg h-screen">
            <div class="text-center p-6">
                <h1 class="text-3xl font-bold">{{$user->username}}</h1>
            </div>
            <div class="mb-2" >
                @if ($posts)           
                    <div class="overflow-y-scroll flex-row-reverse h-5/6" id="post-display">
                        @foreach( ($posts) as $post)
                            <x-post :post="$post" />
                        @endforeach
                    </div>
                @else
                <div class="mb-4">
                    <p>No messages</p>
                </div>
                @endif
            </div>
        </div>    
    </div>
@endsection