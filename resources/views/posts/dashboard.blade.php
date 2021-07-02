@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="md:w-10/12 w-full bg-white p-6 rounded-lg">
            @foreach($articles as $article)

                <div class="w-full h-auto my-5 rounded-xl bg-purple-100">
                    
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
                            <div class="bg-purple-200 rounded-b-xl p-3 text-xl">
                                <h1>{{ trim(json_encode($article->title), '"') }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>   
    </div>
@endsection