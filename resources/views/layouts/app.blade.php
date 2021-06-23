<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReachMe</title>
        <meta name="keywords" content="Laravel, PHP, Blade.php, Javascript, Social Media">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/icons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/icons/favicon-16x16.png') }}">
    </head>
    <body class="bg-purple-100">
    @auth

        <!--For Desktops-->
        <div class="hidden md:relative md:min-h-screen md:flex">
            <div class="light-magneta w-72 h-screen relative text-white">

                <nav class="magneta my-6 mx-4 px-4 py-2">
                
                    <!--Personal-->
                    <div class="text-center">
                        <i class="fas fa-user-circle text-9xl border-b-2 px-4 py-3"></i>                   
                        <div>
                            <a href="{{ route('user.account', auth()->user()) }}" class="text-center">
                                <p href="{{ route('user.account', auth()->user()) }}" class="text-3xl break-words py-3">{{ auth()->user()->username }}</p>
                            </a>
                        </div>
                    </div>

                    <!--Navigation-->
                    <div class="border-b border-t">
                        <div class="w-full">
                            <a href="{{route('dashboard')}}"  class="w-full text-left ">
                                <p class="text-xl magneta-button w-full px-3 py-4">Dashboard</p> 
                            </a>
                        </div>
                        <div class="w-full">
                        <a href="{{route('posts')}}">
                                <p class="text-xl magneta-button w-full px-3 py-4">Posts</p>
                            </a>
                        </div>
                    </div>

                    <!--Logout-->
                    <div class="w-full text-center text-xl">
                        <form action="{{route('logout')}}" method="post" class="w-full magneta-button"> 
                            @csrf
                                <button type="submit" class="py-3">Logout</button>
                        </form>
                    </div>

                </nav>


            </div>
            <div class="flex-1 overflow-y-scroll h-screen bg-purple-100 font-serif">
                @yield("content")
            </div>
        </div>

        <!--Mobile-->
        <div class="flex relative min-h md:hidden">
            <div class="w-full">
                @yield("content")
            </div>
            <div class="fixed bottom-0 inset-x-0 w-full magneta text-white flex text-center">
                <a href="{{route('dashboard')}}" class="w-3/12 py-4 magneta-button ">
                    <i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
                <a href="{{route('posts')}}" class="w-3/12 py-4 magneta-button">
                    <i class="fas fa-comment"></i>
                    <p>Chat</p>
                </a>
                <a href="{{ route('user.account', auth()->user()) }}" class="w-3/12 py-4 magneta-button">
                    <i class="fas fa-user-circle"></i>
                    <p>Profile</p>
                </a>
                <form action="{{route('logout')}}" method="post" class="inline w-3/12 my-0 py-0 magneta-button" > 
                    @csrf
                        <button type="submit" class="inline w-full h-full py-4">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                </form>
            </div>
        </div>

    @endauth
    
    @guest   
        <div class="md:h-full md:flex md:flex-wrap md:content-center" id="container">
            <div class="md:w-6/12 flex">
                <div class="m-auto">
                    <h1 class="text-4xl m-5 font-bold filter drop-shadow-2xl">ReachMe.</h1>
                    <p  class="hidden md:block text-2xl drop-shadow-2xl">Connecting the world, <em>Reaching out</em>.</p>
                </div>
            </div>
            <div class="md:w-6/12 items-center">
                @yield("content")      
            </div>
        </div>
    @endguest
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</html>