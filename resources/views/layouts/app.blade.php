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
    <body>
    <div class="relative min-h-screen flex">
        <div class="light-magneta w-72 h-screen font-serif relative text-white playfair">
            <div class="w-full text-center p-4">
                <a href="{{route('home')}}">
                    <h1 class="text-3xl">ReachMe</h1>
                </a>            
            </div>
            <nav>
                @auth
                <div>
                        <a href="{{route('dashboard')}}" class="block p-3">
                            <i class="fas fa-desktop hover:text-purple-500" title="Dashboard"></i>
                        </a> 
                        <a href="{{route('posts')}}" class="block p-3">
                            <i class="fas fa-pen hover:text-purple-500" title="Posts"></i>
                        </a>
                        <a href="{{ route('user.account', auth()->user()) }}" class="p-3">{{auth()->user()->username}}</a>
                        
                        <div class="absolute bottom-0 w-full flex-inline text-center text-xl text-white">
                            <form action="{{route('logout')}}" method="post" class="w-full p-2 magneta"> 
                                @csrf
                                    <button type="submit" class="">Logout</button>
                            </form>
                        </div>
                @endauth
                @guest      
                    <div class="absolute bottom-0 w-full flex text-center text-xl text-white">
                        <div class="w-6/12 p-3 magneta">
                            <a href="{{route('login')}}">Login</a>
                        </div>
                        <div class="w-6/12 p-3 magneta">
                            <a href="{{route('register')}}">Register</a>
                        </div>
                    </div>
                @endguest

            </nav>
        </div>
        <div class="flex-1 overflow-y-scroll h-screen bg-purple-100 font-serif">
            @yield("content")
        </div>
    </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</html>