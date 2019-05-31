
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
                        @foreach($brands as $brand)

                            <div class="swiper-slide"><a href="{{ route('brands.itemList', ['id' => $brand->id ])}}"><img alt="{{$brand->name}}" src="{{ asset('img/brands/'.$brand->image) }}"
                                                                       class="img-responsive"></a></div>
                        @endforeach
                    </div>

                    <div class="swiper-button-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

                </div>
            </div>
        </div>
    </div>
</section>
