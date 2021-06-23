@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="login-form bg-purple-100 md:bg-purple-50 p-4 rounded-lg text-black md:shadow-2xl">
            <form action="{{route('login')}}" class="mb-10 border-b-2" method="post">
            @csrf
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded @error('username') border-red-500 @enderror" value="">
                </div>
                <div class="my-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded @error('password') border-red-500 @enderror" value="">
                    @if(session("status"))
                    <div class="text-red-500 mt-2 text-sm">
                            {{session("status")}}
                        </div>
                    @endif
                </div>

                <div class="my-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="m-2 magneta">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="my-4">
                    <button type="submit" class="magneta text-white px-4 py-3 rounded font-medium w-full magneta-button">Log In</button>
                </div>
                <div class="text-center my-4 text-sm">
                    <a href="#">Forgotten Password?</a>
                </div>
            </form>
            <div class="w-full my-4 text-center">
                <a href="{{ route('register') }}" class="text-white magneta p-3 rounded font-medium magneta-button">Create New Account</a>
            </div>  
        </div> 
    </div>
@endsection