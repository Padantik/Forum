@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="md:w-10/12 w-full bg-white p-6 rounded-lg">
            <div class="text-center mb-6 p-6 border-b-2">  
               <h1 class="text-3xl font-bold">Account Settings</h1>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="border p-6">
                    <p>Name: {{$user->name}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>Joined {{date("jS F Y", strtotime($user->created_at))}}</p>
                </div>
                <div class="border p-6">
                    Hello
                </div>
            </div>
        </div>    
    </div>
@endsection

@section("sidebarContent")
    <div class="border-b">
        <h1 class="text-2xl py-3 word-wrap">Contacts</h1>
    </div>
    <div class="w-full">
        @foreach($users as $user)
        <a href="{{ route('user.posts', $user->id) }}">
            <p class="text-xl magneta-button w-full py-4"><i class="fas fa-user-circle mr-2"></i> {{$user->name}}</p> 
        </a>
        @endforeach
    </div>
@endsection