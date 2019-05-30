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
                        <img src="{{ asset('img/items/Kitty_205x178.png') }}"></div>
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
                        <img src="{{ asset('img/items/Bite_205x178.png') }}">
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
                        <img src="{{ asset('img/items/Fella_205x178.png') }}">
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
                        <img src="{{ asset('img/items/Cruise_205x178.png') }}">
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
