<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-3">
        <ul class="flex items-center">
        @auth
            <li>
                <a href="{{route('home')}}" class="p-3">
                    <i class="fas fa-home" title="Home"></i>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="p-3">
                    <i class="fas fa-desktop" title="Dashboard"></i>
                </a>
            </li>
            <li>  
                <a href="{{route('posts')}}" class="p-3">
                    <i class="fas fa-pen" title="Posts"></i>
                </a>
            </li>
        @endauth
        @guest      
            <li>
                <a href="{{route('home')}}" class="p-3">
                    <i class="fas fa-home" title="Home"></i>
                </a>
            </li>
        @endguest
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{auth()->user()->username}}</a>
                </li>          
                <li>
                    <form action="{{route('logout')}}" method="post" class="inline p-3"> 
                    @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{route('login')}}" class="p-4">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="p-4">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
        @yield("content")
    </body>
</html>