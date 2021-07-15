<div class="content full-height hor-content hor-content_padd">
    <!-- slider-counter_wrap-->
    <div class="slider-counter_wrap">
        <div class="count-folio round-counter">
            <div class="num-album"></div>
            <div class="all-album"></div>
        </div>
    </div>
    <!-- slider-counter_wrap end -->
    <!-- bottom-filter-wrap -->
    <div class="bottom-filter-wrap">
        <div class="scroll-down-wrap">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
            <span>Scroll down or  Swipe to Discover</span>
        </div>
{{--        <div class="filter-title">Filters <i class="fal fa-long-arrow-right"></i></div>--}}
{{--        <div class="gallery-filters">--}}
{{--            <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">All</a>--}}
{{--            <a href="#" class="gallery-filter" data-filter=".disney">Disney Films</a>--}}
{{--            <a href="#" class="gallery-filter" data-filter=".pixar">Pixar Films</a>--}}
{{--        </div>--}}
    </div>
    <!-- bottom-filter-wrap end -->
    <!--horizontal-grid   -->
    <div class="horizontal-grid-wrap  fl-wrap full-height ">
        <!-- portfolio start -->
        <div   id="portfolio_horizontal_container" class="three-ver-columns lightgallery">

            @if($videos)
                @foreach($videos as $video)
            <!-- portfolio_item-->
            <div class="portfolio_item pixar">
                <div class="grid-item-holder">

                    <a href="#">
                          {!! $video->VideoPath !!}
                    </a>
                    <div class="thumb-info">
                        <h3><a href="portfolio-single.html">{{$video->name}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- portfolio_item end-->
                    @endforeach
            @endif

        </div>
        <!-- portfolio end -->
    </div>
    <!--horizontal-grid end -->
</div>

