
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
        <div id="feature" class="latest-bottom  collapse in">
            @foreach($latestItems as $item)

                @php
                    $price = array_map('intval', str_split($item->price));
                @endphp

                <div class="col-feature col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="item-box ">
                        <div class="img-latest">
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
</section>
