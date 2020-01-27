<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recipe Finder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
   <!-- Styles -->
   <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
   <script src="https://kit.fontawesome.com/67bf1e6382.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="app">
        <lan-ding :recipes="{{$recipes}}"></lan-ding>
        {{-- <router-view></router-view> --}}

            {{-- <div id="welcomePage" class="flex-center position-ref full-height">
                <div id="br"></div>
                @if (Route::has('login'))
                    <div id="nav">
                        <h1><i class="fas fa-utensils"></i></h1>
                        <ul>
                            @auth
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
    
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                        </ul>
                    </div><!--nav-->
                @endif
                <div id="content">
                 <div id="inner">
                   <div id="txt">
                        <h1>Recipe Finder</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum cupiditate magnam, nihil tempora quia necessitatibus!</p>
                        <div class="links">
                      
                        <a href="{{route('usersshow')}}">
                            users
                        </a>
                        
                        <a href="{{route('recipes')}}">
                            recipes
                        </a>
                       
                        </div>
                    </div>
                  </div>
                </div><!--landing-->
            </div> --}}
        </div>
    </body>
</html>
