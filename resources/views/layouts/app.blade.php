<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

</head>
<body>


<div class="top-block">
    <nav class="navbar navbar-default " role="navigation">
        <div class="navbar-header v-align-m">

            <a class="navbar-brand logo" href="{{ url('/') }}">
                <img src="{{ asset('img/Flame_31x41.png') }}">
                <p class="v-align-m">{{ config('app.name','Company') }}</p>
                <h5> so turn the light out</h5>
            </a>

            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse v-align-m " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
                        </li>
                    @endif
                @else
                    <?php if(auth()->user()->isAdmin == 1){?>


                        <li><a href="{{ route('home') }}">my account</a></li>
                        <li><a href="{{url('admin')}}">admin panel</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    <?php } else { ?>
                            <li><a href="#">wish list (0)</a></li>
                            <li><a href="{{ route('home') }}">my account</a></li>
                            <li><a href="#">shopping cart</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                            <li>
                                <button class="button "><i class="fa fa-shopping-basket"></i></button>
                                <div class="circle-button">0</div>
                            </li>
                        <?php } ?>
                @endguest
            </ul>
        </div>
    </nav>
</div>
<main class="py-4">

    @yield('content')

</main>

</body>
</html>



