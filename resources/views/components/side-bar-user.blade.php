<div class="border-b">
    <h1 class="text-2xl py-3 px-2 word-wrap text-right bg-gray-800">Users</h1>
</div>
<div class="w-full invert-background">
    @foreach($allUsers as $eachUser)
        <a href="{{ route('user.posts', $eachUser->id) }}">  
            <div class="w-full py-4 px-2 inline-block hover:bg-gray-700" style="
                @if($eachUser->id === $selectedUser->id)
                    background-color: rgba(75, 85, 99, var(--tw-bg-opacity));
                @endif
            ">
                <i class="fas fa-user-circle mr-2 text-left text-2xl"></i>
                <p class="inline float-right text-xl 
                    @if($eachUser->id === $requestingUser->id)
                        font-bold
                    @endif
                ">{{$eachUser->name}}</p> 
            </div>
        </a>
    @endforeach
</div>