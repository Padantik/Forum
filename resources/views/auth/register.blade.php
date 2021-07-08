@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="login-form bg-white md:bg-gray-50 p-4 rounded-lg text-black shadow-2xl">
            <form action="{{route('register')}}" class="mb-6 border-b-2" method="post">
            @csrf
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded @error('name') border-red-500 @enderror" value="{{old('name')}}">
                </div>
                <div class="my-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded @error('username') border-red-500 @enderror" value="{{old('username')}}">
                </div>
                <div class="my-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded @error('email') border-red-500 @enderror" value="{{old('email')}}">
                </div>

                <div class="my-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded @error('password') border-red-500 @enderror" value="">
                </div>
                <div class="my-4">
                    <label for="password_confirmation" class="sr-only">Repeat password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded @error('password_confirmation') border-red-500 @enderror" value="">
                </div>
                <div class="my-4 pb-2">
                    <button type="submit" class="text-white px-4 py-3 rounded font-medium w-full bg-black hover:bg-gray-800">Register</button>
                </div>
            </form>
            <div class="w-full my-2 text-center">
                <a href="{{ route('login') }}" class="text-sm hover:text-gray-500">Already Registered?</a>
            </div>
        </div>    
    </div>
@endsection