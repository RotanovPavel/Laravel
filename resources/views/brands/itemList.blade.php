@extends('layouts.app')

@section('content')

    <section class="feature">
        <div class="container">
            <div id="feature" class="feature-bottom  collapse in">
                @foreach($items as $item)

                    @php
                        $price = array_map('intval', str_split($item->price));
                    @endphp

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
                                <img src="{{ asset('img/items/'.$item->image) }}"></div>
                            <div class="prod-name">{{$item->name}}</div>

                            <div class="prod-info">
                                @guest

                                @else
                                    <button class="btn"><p>ADD TO CARD</p></button>
                                @endguest
                                <div class="price">
                                    <div class="price-left">$</div>
                                    @foreach ($price as $i)
                                        <div class="price-middle">{{$i}}</div>
                                    @endforeach
                                    <div class="white-shadow"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        <div class="container">
            <a class="btn btn-info" href="{{ url('/')}}">Home</a>
        </div>
    </section>
@endsection
