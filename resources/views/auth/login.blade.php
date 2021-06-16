@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="md:w-5/12 w-10/12 bg-white p-6 rounded-lg">

            <form action="{{route('login')}}" method="post">
            @csrf
                <div class="flex justify-center">
                    <h1 class="px-6 py-3 font-big">Login</h1>
                </div>
                <div class="m-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded @error('username') border-red-500 @enderror" value="">
                </div>
                <div class="m-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded @error('password') border-red-500 @enderror" value="">
                    @if(session("status"))
                    <div class="text-red-500 mt-2 text-sm">
                            {{session("status")}}
                        </div>
                    @endif
                </div>

                <div class="m-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="m-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="m-4">
                    <button type="submit" class="bg-purple-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>    
    </div>
@endsection