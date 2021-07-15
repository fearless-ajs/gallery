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
    </div>
    <!-- bottom-filter-wrap end -->
    <!--horizontal-grid   -->
    <div class="horizontal-grid-wrap  fl-wrap full-height ">
        <!-- portfolio start -->
        <div   id="portfolio_horizontal_container" class="three-ver-columns lightgallery">


            @if($pics)
                @foreach($pics as $pic)
            <div class="portfolio_item pixar">
                <a href="{{$pic->OriginalImagePath}}" class="popup-image">
                    <div class="grid-item-holder">
                        <img  src="{{$pic->OptimizedImagePath}}" alt="">
                    </div>
                </a>
            </div>
                @endforeach
            @endif

        </div>
        <!-- portfolio end -->
    </div>
    <!--horizontal-grid end -->
</div>
