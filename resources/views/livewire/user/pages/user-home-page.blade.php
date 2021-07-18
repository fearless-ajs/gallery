<div class="content full-height">
    <!--home-main_container-->
    <div class="home-main_container">
        <!--follow-wrap-->
        <div class="follow-wrap">
            <div class="follow-wrap_title">
                <span>Social</span> <i class="fal fa-arrow-right"></i>
            </div>
            <div class="clearfix"></div>
            <ul>
                <li><a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{$setting->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <!--follow-wrap end-->
        <!--hero-decor-let-->
        <div class="hero-decor-let">
            <div>01. <span>Architecture</span></div>
            <div>02. <span>Hobby</span></div>
            <div>03. <span>Open Houses</span></div>
        </div>
        <!--hero-decor-let end-->

        @if($page)
        <!--home-main_title-->
        <div class="home-main_title">
            <div class="home-main_title_item">
                <h4>{{$page->caption}}</h4>
                <h2>{{$page->title}}</h2>
                <p>{{$page->content}}
                </p>
            </div>
        </div>
        <!--home-main_title end-->
        <div class="slider-mask"></div>
        <!--bg image-->
        <div class="bg" data-bg="{{$page->ImagePath}}"></div>
        @endif

        <div class="overlay"></div>
        <!--bg image end-->
    </div>
    <!--home-main_container end-->
</div>
