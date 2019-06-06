<section class="carousel">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->


            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @php ($count = 0)
                @foreach($discount_items as $discount)
                <div class="item {{$count == 0 ? 'active' : ''}}">
                    <img src="{{ asset('img/discount_items/'.$discount->image) }}" alt="{{$discount->name}}" style="width:100%;">
                    <div class="carousel-caption">

                        <p>{{$discount->name}} - Camp Now Available for just ${{$discount->price}}</p>
                    </div>
                </div>
                    @php ($count += 1)
                @endforeach




                <a class="left carousel-control" href="#myCarousel" data-slide="prev">

                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">

                </a>
            </div>


            <div class="bottom-cont">
                <div class="carousel-bottom-left ">
                    <!--<div class=" carousel slide v-align-m">-->


                    <ol class="carousel-indicators v-align-m v-align-s">
                        @php ($indicate_count = 0)
                    @foreach($discount_items as $discount)
                        <li id="{{$indicate_count}}" data-target="#myCarousel" data-slide-to="{{$indicate_count}}" class="indicate-slide {{$indicate_count == 0 ? 'active' : ''}}"></li>
                        @php ($indicate_count += 1)
                    @endforeach
                    </ol>
                    <!--</div>-->
                </div>
                <div class="center-right-box">
                    <div class="carousel-bottom-center v-align-m v-align-s">
                        <p class="v-align-m v-align-s" style="display: none"></p>
                    </div>
                    <div class="carousel-bottom-right ">
                        <button class="btn v-align-m v-align-s"><p>purchase</p></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
