<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReachMe</title>
        <meta name="keywords" content="Laravel, PHP, Blade.php, Javascript, Social Media">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/icons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/icons/favicon-16x16.png') }}">
    </head>
    <body class="bg-purple-100">
    @auth
        <div class="relative min-h-screen flex">
            <div class="light-magneta w-72 h-screen relative text-white">
                <div class="w-full text-center p-4 border-b magneta">
                    <h1 class="text-3xl">ReachMe</h1>          
                </div>
                <nav>
                    <div>
                        
                    </div>
                    <div class="py-4  px-3">
                        <a href="{{route('dashboard')}}" class="text-xl">Dashboard</a> 
                    </div>
                    <div class="py-4 px-3">
                        <a href="{{route('posts')}}" class="text-xl">Posts</a>
                    </div>
                    <div class="py-4 px-3">
                        <a href="{{ route('user.account', auth()->user()) }}" class="text-xl">Profile</a>
                    </div>

                    <div class="absolute bottom-0 w-full border-t text-center text-xl text-white">
                        <form action="{{route('logout')}}" method="post" class="w-full magneta p-0 m-0 magneta-button"> 
                            @csrf
                                <button type="submit" class="py-4 px-24 ">Logout</button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="flex-1 overflow-y-scroll h-screen bg-purple-100 font-serif">
                @yield("content")
            </div>
        </div>
    @endauth
    
    @guest   
        <div class="h-full flex flex-wrap content-center" id="container">
            <div class="w-6/12 flex">
                <div class="m-auto">
                    <h1 class="text-4xl m-5 font-bold filter drop-shadow-2xl">ReachMe.</h1>
                    <p  class="text-2xl drop-shadow-2xl">Connecting the world, <i>Reaching out.</i></p>
                </div>
            </div>
            <div class="w-6/12 items-center">
                @yield("content")      
            </div>
        </div>
    @endguest
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</html>