<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company</title>
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

            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                    <li >
                        <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li >
                            <a  href="{{ route('register') }}">{{ __('Create an account') }}</a>
                        </li>
                    @endif
                @else


                    <li><a href="#">wish list (0)</a></li>
                    <li><a href="#">my account</a></li>
                    <li><a href="#">shopping cart</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>

                    <li>
                        <button class="button "><i class="fa fa-shopping-basket"></i></button>
                        <div class="circle-button">0</div>
                    </li>

                @endguest
            </ul>
        </div>

    </nav>
</div>



<div class="middle-block">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header v-align-m ">

            <button type="button" id="btn-middle" class="navbar-toggle"  data-toggle="collapse" data-target=".navbar-ex2-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div id="ex-2" class="collapse navbar-collapse navbar-ex2-collapse v-align-m">
            <ul class="nav navbar-nav navbar-left ">
                <li><a href="#" class="desk"><img src="{{ asset('img/Home_Icon.png') }}">Desktops</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle " id="laptops" data-toggle="dropdown">Laptops & Notebooks <b
                            class="caret"></b></a>

                    <ul class="dropdown-menu">

                        <li><a href="#">Sony(2)</a></li>
                        <li><a href="#">Android(4)</a></li>
                        <li><a href="#">Apple(7)</a></li>
                        <li><a href="#">Acer(53)</a></li>
                        <li><a href="#">HP(78)</a></li>
                        <li><a href="#">Intel(5)</a></li>

                    </ul>
                </li>

                <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" >Components</a>
                    <ul class="dropdown-menu">

                        <li><a href="#">HDD</a></li>
                        <li><a href="#">RAM</a></li>
                        <li><a href="#">Displays</a></li>
                        <li><a href="#">Keyboards</a></li>
                        <li><a href="#">Mouses</a></li>

                    </ul>
                </li>

                <li><a href="#">Tablets</a></li>
                <li><a href="#">Software</a></li>
                <li><a href="#">Phones & PDAs</a></li>
                <li><a href="#">Cameras</a></li>
                <li><a href="#">Contact</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>







<div class="bottom-block">
    <div class="container">
        <div class="bottom-left-block ">
            @guest
                <h5 class="v-align-m">Welcome visitor you can login or create an account</h5>
            @else
                <h5 class="v-align-m">Hello {{ Auth::user()->name }}, we are glad to see you!</h5>
            @endguest

        </div>


        @guest
            <div class="bottom-center-block ">

                <ul class="v-align-m">
                   <li><a href="#"><i class="fa fa-feed" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                </ul>

            </div>

        <div class="bottom-right-block ">

            <form class="bottom-form v-align-m" method="POST" action="{{ route('login') }}">
                <p>Sign up:</p>
                @csrf
                <div class="form-group ">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password" type="password" class="form-control pass @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-play" aria-hidden="true"></i></button>
            </form>

        </div>
        @endguest
    </div>
</div>




<section class="carousel">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->


            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="{{ asset('img/product_sections/Gambino_940x355.png') }}" alt="" style="width:100%;">
                    <div class="carousel-caption">

                        <p>Childish Gambino - Camp Now Available for just $9.99</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{ asset('img/product_sections/Gambino_940x355.png') }}" alt="" style="width:100%;">
                    <div class="carousel-caption">

                        <p>Childish Gambino - Camp Now Available for just $8.88</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{ asset('img/product_sections/Gambino_940x355.png') }}" alt="" style="width:100%;">
                    <div class="carousel-caption">

                        <p>Childish Gambino - Camp Now Available for just $7.77</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{ asset('img/product_sections/Gambino_940x355.png') }}" alt="" style="width:100%;">
                    <div class="carousel-caption">

                        <p>Childish Gambino - Camp Now Available for just $6.66</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{ asset('img/product_sections/Gambino_940x355.png') }}" alt="" style="width:100%;">
                    <div class="carousel-caption">

                        <p>Childish Gambino - Camp Now Available for just $5.55</p>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">

                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">

                </a>
            </div>




            <div class="bottom-cont">
                <div class="carousel-bottom-left ">
                    <!--<div class=" carousel slide v-align-m">-->
                    <ol class="carousel-indicators v-align-m v-align-s">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>
                    <!--</div>-->
                </div>
                <div class="center-right-box">
                    <div class="carousel-bottom-center v-align-m v-align-s">
                        <p class="v-align-m v-align-s" style="display: none"> </p>
                    </div>
                    <div class="carousel-bottom-right ">
                        <button class="btn v-align-m v-align-s"><p>purchase</p></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>





<section class="feature">
    <div class="container">
        <div class="feature-top">
            <div class="feature-top-left">
                <p>featured</p>

            </div>
            <div class="feature-top-center">
                <!--<img src="./assets/img/featured_line.png">-->
                <div class="feature-line"></div>
                <div class="feature-line"></div>
                <div class="feature-line"></div>
                <div class="feature-line"></div>
            </div>

            <div class="feature-top-right">
                <button id="btn-feature" class="button" data-toggle="collapse" data-target="#feature"><i
                        class="fa fa-minus" aria-hidden="true"></i></button>
            </div>
        </div>
        <div id="feature" class="feature-bottom  collapse in">
            <div class="col-feature col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-feature">
                        @guest

                        @else
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        @endguest
                        <img src="{{ asset('img/product_sections/Kitty_205x178.png') }}"></div>
                    <div class="prod-name">Mascot Kitty - White</div>

                    <div class="prod-info">
                        @guest

                        @else
                        <button class="btn"><p>ADD TO CARD</p></button>
                        @endguest
                            <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">2</div>
                            <div class="price-right">0</div>
                            <div class="white-shadow"></div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-feature col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-feature">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Bite_205x178.png') }}">
                    </div>
                    <div class="prod-name">Bite Me</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">3</div>
                            <div class="price-right">0</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-feature col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-feature">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Fella_205x178.png') }}">
                    </div>
                    <div class="prod-name">Little Fella</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">4</div>
                            <div class="price-right">5</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-feature col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-feature">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Cruise_205x178.png') }}">
                    </div>
                    <div class="prod-name">Astral Cruise</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">4</div>
                            <div class="price-right">5</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>


<section class="brands">
    <div class="container">
        <div class="brands-top">
            <div class="brands-top-left">
                <p>brands</p>
            </div>
            <div class="brands-top-center">
                <!--<img src="./assets/img/featured_line.png">-->
                <div class="brands-line"></div>
                <div class="brands-line"></div>
                <div class="brands-line"></div>
                <div class="brands-line"></div>
            </div>
        </div>

        <div class="brands-body">
            <div class="container">

                <div class="swiper-container">
                    <div class="swiper-wrapper hover01">
                        <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/apple-small.png') }}"
                                                                   class="img-responsive"></a></div>

                        <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/palm.png') }}"
                                                                   class="img-responsive"></a></div>

                        <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/palm.png') }}"
                                                                   class="img-responsive"></a></div>


                        <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/boss.png') }}"
                                                                   class="img-responsive"></a></div>


                        <div class="swiper-slide"><a href="#"><img src="{{ asset('img/brands/monkey.png') }}"
                                                                   class="img-responsive"></a></div>

                    </div>
                    <div class="swiper-button-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

                </div>

            </div>


        </div>
    </div>

</section>
<section class="latest">
    <div class="container">
        <div class="latest-top">
            <div class="latest-top-left">
                <p>latest</p>

            </div>
            <div class="latest-top-center">
                <!--<img src="./assets/img/featured_line.png">-->
                <div class="latest-line"></div>
                <div class="latest-line"></div>
                <div class="latest-line"></div>
                <div class="latest-line"></div>
            </div>

            <div class="latest-top-right">
                <button id="btn-latest" class="button" data-toggle="collapse" data-target="#latest"><i
                        class="fa fa-minus" aria-hidden="true"></i></button>
            </div>
        </div>
        <div id="latest" class="latest-bottom  collapse in">
            <div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-latest">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Bag_205x178.png') }}"></div>
                    <div class="prod-name">Mascot Kitty - White</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">2</div>
                            <div class="price-right">0</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-latest">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Read_205x178.png') }}">
                    </div>
                    <div class="prod-name">Bite Me</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">3</div>
                            <div class="price-right">0</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-latest">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Carter_205x178.png') }}">
                    </div>
                    <div class="prod-name">Little Fella</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">4</div>
                            <div class="price-right">5</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="item-box ">
                    <div class="img-latest">
                        <div class="img-button">
                            <button class="btn-compare">Add to Compare</button>
                            <button class="btn-compare">Add to Wishlist</button>
                        </div>
                        <img src="{{ asset('img/product_sections/Onesie_205x178.png') }}">
                    </div>
                    <div class="prod-name">Astral Cruise</div>
                    <div class="prod-info">
                        <button class="btn"><p>ADD TO CARD</p></button>
                        <div class="price">
                            <div class="price-left">$</div>
                            <div class="price-middle">4</div>
                            <div class="price-right">5</div>
                            <div class="white-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- lazyload 1 -->
        <!--<div  class="latest latest-bottom lazyload collapse in">-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Bag_205x178.png"></div>-->
        <!--<div class="prod-name">Mascot Kitty - White</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">2</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Read_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Bite Me</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">3</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Carter_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Little Fella</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Onesie_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Astral Cruise</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--&lt;!&ndash; lazyload 2 &ndash;&gt;-->
        <!--<div  class="latest latest-bottom lazyload collapse in">-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Bag_205x178.png"></div>-->
        <!--<div class="prod-name">Mascot Kitty - White</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">2</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Read_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Bite Me</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">3</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Carter_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Little Fella</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Onesie_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Astral Cruise</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--&lt;!&ndash; lazyload 3 &ndash;&gt;-->
        <!--<div  class="latest latest-bottom lazyload collapse in">-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Bag_205x178.png"></div>-->
        <!--<div class="prod-name">Mascot Kitty - White</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">2</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Read_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Bite Me</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">3</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Carter_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Little Fella</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Onesie_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Astral Cruise</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--&lt;!&ndash; lazyload 4 &ndash;&gt;-->
        <!--<div  class="latest latest-bottom lazyload collapse in">-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Bag_205x178.png"></div>-->
        <!--<div class="prod-name">Mascot Kitty - White</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">2</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Read_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Bite Me</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">3</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Carter_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Little Fella</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Onesie_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Astral Cruise</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--&lt;!&ndash; lazyload 5 &ndash;&gt;-->
        <!--<div  class="latest latest-bottom lazyload collapse in">-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Bag_205x178.png"></div>-->
        <!--<div class="prod-name">Mascot Kitty - White</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">2</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Read_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Bite Me</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">3</div>-->
        <!--<div class="price-right">0</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Carter_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Little Fella</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-latest col-xs-6 col-sm-6 col-md-6 col-lg-3">-->
        <!--<div class="item-box ">-->
        <!--<div class="img-latest">-->
        <!--<div class="img-button">-->
        <!--<button class="btn-compare">Add to Compare</button>-->
        <!--<button class="btn-compare">Add to Wishlist</button>-->
        <!--</div>-->
        <!--<img src="./assets/img/product_sections/Onesie_205x178.png">-->
        <!--</div>-->
        <!--<div class="prod-name">Astral Cruise</div>-->
        <!--<div class="prod-info">-->
        <!--<button class="btn"><p>ADD TO CARD</p></button>-->
        <!--<div class="price">-->
        <!--<div class="price-left">$</div>-->
        <!--<div class="price-middle">4</div>-->
        <!--<div class="price-right">5</div>-->
        <!--<div class="white-shadow"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

    </div>
</section>
<section class="footer-info">
    <div class="container">
        <div class="info-sed">
            <div class="info-head">
                <div class="info-icon"><img src="{{ asset('img/footer_icon/light_bulb.png') }}"></div>
                <h4>suspendisse sed</h4>
            </div>
            <div class="info-desc">

                <p>Aliquam dignissim porttitor tortor non fermen-tum. Curabitur in magna lectus. Duis sed eros diam.
                    Lorem ipsum dolor sit amet, consectetur. </p>
            </div>
        </div>

        <div class="info-sed">
            <div class="info-head">
                <div class="info-icon"><img src="{{ asset('img/footer_icon/bolt.png') }}"></div>
                <h4>suspendisse sed</h4>
            </div>
            <div class="info-desc">

                <p>Aliquam dignissim porttitor tortor non fermen-tum. Curabitur in magna lectus. Duis sed eros diam.
                    Lorem ipsum dolor sit amet, consectetur. </p>
            </div>
        </div>
        <div class="info-sed">
            <div class="info-head">
                <div class="info-icon"><img src="{{ asset('img/footer_icon/power.png') }}"></div>
                <h4>suspendisse sed</h4>
            </div>
            <div class="info-desc">
                <p>Aliquam dignissim porttitor tortor non fermen-tum. Curabitur in magna lectus. Duis sed eros diam.
                    Lorem ipsum dolor sit amet, consectetur. </p>
            </div>
        </div>
    </div>

</section>
<div class="info-bottom"></div>
<section class="footer-contacts">
    <div class="container">
        <div class="contacts-head">
            <h4>about us</h4>
            <ul class="contacts-nav">
                <li>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nuncurna tristique
                    nisi, in interdum libero magna trisrique ante. Adipiscing varius. Vestibulum dolor lorem.
                </li>
            </ul>
        </div>
        <div class="contacts-head">
            <h4>information</h4>
            <ul class="contacts-nav">
                <li><a href="#">About us</a></li>
                <li><a href="#">Delivery Information</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
            </ul>
        </div>
        <div class="contacts-head">
            <h4>customer service</h4>
            <ul class="contacts-nav">
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Returns</a></li>
                <li><a href="#">Site Map</a></li>
            </ul>
        </div>
        <div class="contacts-head">
            <h4>my account</h4>
            <ul class="contacts-nav">
                <li><a href="#">My Account</a></li>
                <li><a href="#">Order history</a></li>
                <li><a href="#">Wish List</a></li>
                <li><a href="#">Newsletter</a></li>
            </ul>
        </div>
        <div class="contacts-head">
            <h4>extras</h4>
            <ul class="contacts-nav">
                <li><a href="#">Brands</a></li>
                <li><a href="#">Gift Vouchers</a></li>
                <li><a href="#">Affiliates</a></li>
                <li><a href="#">Specials</a></li>
            </ul>
        </div>

    </div>

</section>
<div class="contacts-bottom"></div>
<section class="footer-rights">
    <div class="container">
        <div class="rights">
            <h5>copyright of <span class="colortext">bonfire</span> <span class="yearsize">2012</span> all rights reserved</h5>
        </div>
        <div class="rights">
            <h5>powered by <span class="colortext">opencart</span></h5>
        </div>
    </div>
</section>

<!-- <footer class="footer">

    <div class="container v-align n-p">

        <div class="pull-left">

            <span>© Copyright of bonfire 2012 all rights reserved</span>



            <span>powered by opencart</span>

        </div>







    </div>

</footer>

-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>


