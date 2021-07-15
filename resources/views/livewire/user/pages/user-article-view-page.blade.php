<div class="content">

    <!-- column-wrapper -->
    <div class="single-content-section">
        <!--fixed-bottom-content -->
        <!--fixed-bottom-content end  -->
        <!--section  -->
        <section class="single-content-section">
            <div class="container small-container">
                <!-- post -->
                <div class="post fl-wrap fw-post single-post ">
                    <h2><span>{{$article->title}}</span></h2>
                    <ul class="blog-title-opt">
                        <li><a href="#">{{$article->created_at->format('d M Y')}}</a></li>
                        <li> - </li>
                        <li><a href="#">{{$article->category}} </a></li>
                        <li> - </li>
                        <li><a href="#"><span class="author_avatar"> <img alt='' src='https://ui-avatars.com/api/?name={{$article->author}}&color=563C5C&background=FFFFFF' width="50" height="50"></span>{{$article->author}}</a></li>
                    </ul>
                    <!-- blog media -->
                    <div class="blog-media fl-wrap">
                        <div class="single-slider-wrap">
                            <div class="single-slider fl-wrap">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper lightgallery">
                                        <div class="swiper-slide hov_zoom"><img src="{{$article->Image1Path}}" alt=""><a href="images/folio/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                        @if($article->image_2)
                                        <div class="swiper-slide hov_zoom"><img src="{{$article->Image2Path}}" alt=""><a href="images/folio/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                        @endif
                                        @if($article->image_3)
                                        <div class="swiper-slide hov_zoom"><img src="{{$article->Image3Path}}" alt=""><a href="images/folio/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="ss-slider-pagination_wrap">
                                <div class="ss-slider-pagination"></div>
                            </div>
                            <div class="ss-slider-cont ss-slider-cont-prev color-bg"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="ss-slider-cont ss-slider-cont-next color-bg"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                    </div>
                    <!-- blog media end -->
                    <div class="blog-text fl-wrap">
                        <div class="pr-tags fl-wrap">
                            <span>Updated : </span>
                            <ul>
                                <li><a href="#">{{$article->updated_at->format('d M Y')}}</a></li>
                                <li> - </li>
                                <li><a href="#">{{$article->author}}</a></li>
                            </ul>
                        </div>
                        <p>
                            {{$article->content_1}}
                        </p>
                        @if($article->quote)
                        <blockquote>
                            <p>{{$article->quote}} </p>
                        </blockquote>
                        @endif
                        <p>
                            {{$article->content_2}}
                        </p>

                    </div>

                </div>
                <!-- post end-->
            </div>
        </section>
        <!--section end  -->
        <!--footer -->
        <footer class="min-footer fl-wrap content-animvisible">
            <div class="container small-container">
                <div class="footer-inner fl-wrap">
                    <!-- policy-box-->
                    <div class="policy-box">
                        <span>&#169; {{$setting->app_name}} {{Carbon\Carbon::now()->format('Y')}}  /  All rights reserved. </span>
                    </div>
                    <!-- policy-box end-->
                    <a href="#" class="to-top-btn to-top">Back to top <i class="fal fa-long-arrow-up"></i></a>
                </div>
            </div>
        </footer>
        <!--footer end  -->
    </div>
    <!-- column-wrapper -->
</div>
