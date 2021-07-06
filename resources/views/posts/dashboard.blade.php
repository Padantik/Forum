@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="md:w-10/12 w-full bg-gray-900 p-6 rounded-lg">
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
                            <div class="bg-gray-900 rounded-b-xl p-3 text-xl">
                                <h1>{{ trim(json_encode($article->title), '"') }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>   
    </div>
@endsection

@section("sidebarContent")
    <div>
        <div class="border-b">
            <h1 class="text-2xl py-3 px-2 word-wrap text-right bg-gray-800">Contacts</h1>
        </div>
        <div class="w-full invert-background">
            @foreach($users as $user)
            <a href="{{ route('user.posts', $user->id) }}">  
                <div class="w-full py-4 px-2 inline-block hover:bg-gray-700">
                    <i class="fas fa-user-circle mr-2 text-left text-2xl"></i>
                    <p class="inline float-right text-xl">{{$user->name}}</p> 
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection