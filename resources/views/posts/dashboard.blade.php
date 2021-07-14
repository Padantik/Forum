@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="md:w-10/12 w-full bg-gray-900 p-6 rounded-lg md:grid md:grid-cols-2 md:gap-4">
            @foreach($articles as $article)

                <div class="w-full h-auto my-5 rounded-xl bg-black text-white">
                    
                    <div class="w-full p-3 text-xl ">
                        <div class="inline">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="inline mx-1">
                            <h1 class="inline font-bold">{{trim(json_encode($article->source->name), '"' )}}</h1>
                        </div>
                    </div>
                    
                    <a href="{{ trim(json_encode($article->url), '"') }}" target="_blank">
                        <div class="rounded">
                            <div>
                                <img src="{{trim(json_encode($article->urlToImage), '"' )}}" onerror="this.onerror=null; this.src='{{asset('images/hello.png')}}'" class="w-full">
                            </div>
                            <div class="rounded-b-xl p-3">
                                <h1 class="text-md sm:text-xl">{{ trim(json_encode($article->title), '"') }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>   
    </div>
@endsection

@section("sidebarContent")
    <x-side-bar-user />
@endsection