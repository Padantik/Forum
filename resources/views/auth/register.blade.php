@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="md:w-5/12 w-10/12 bg-white p-6 rounded-lg">
            <form action="{{route('register')}}" method="post">
            @csrf
                <div class="flex justify-center">
                    <h1 class="px-6 py-3 font-big">New User?</h1>
                </div>
                <div class="m-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error("name")
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded @error('username') border-red-500 @enderror" value="{{old('username')}}">
                    @error("username")
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded @error('email') border-red-500 @enderror" value="{{old('email')}}">
                    @error("email")
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded @error('password') border-red-500 @enderror" value="">
                    @error("password")
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="password_confirmation" class="sr-only">Repeat password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded @error('password_confirmation') border-red-500 @enderror" value="">
                </div>
                <div class="m-4">
                    <button type="submit" class="bg-purple-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>    
    </div>
@endsection