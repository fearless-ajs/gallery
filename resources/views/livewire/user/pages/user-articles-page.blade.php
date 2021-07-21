<div class="content">
    <!-- column-wrapper -->
    <div class="single-content-section">
        <!-- fixed-bottom-content-->
        <!--
        <div class="fixed-bottom-content">
            pagination
            <div class="pagination-container fl-wrap">
                <a href="#" class="prevposts-link"><i class="fal fa-chevron-left"></i></a>
                <a href="#">1</a>
                <a href="#" class="current-page">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#" class="nextposts-link"><i class="fal fa-chevron-right"></i></a>
            </div>

            pagination  end
        </div>
        -->
        <!-- fixed-bottom-content end -->
        <!--section  -->
        <section class="single-content-section">
            <div class="container small-container">
                @if($articles)
                <!-- post -->
                    @foreach($articles as $article)
                <div class="post fl-wrap fw-post">
                    <h2><span>{{$article->title}}</span></h2>
                    <ul class="blog-title-opt">
                        <li><a href="#">{{$article->created_at->format('d M Y')}}</a></li>
                        <li> - </li>
                        <li><a href="#">{{$article->category}} </a></li>
                        <li><a href="#">{{$article->author}}</a></li>
                    </ul>
                    <!-- blog media -->
                    <div class="blog-media fl-wrap">
                        <img src="{{$article->Image1Path}}" class="respimg" alt="">
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
                            {!! Str::limit($article->content_1, $limit = 500, $end = '...') !!}
                        </p>
                        <a href="{{route('user.view.article', $article->id)}}" class="btn float-btn flat-btn">Read more </a>
                    </div>
                </div>
                    @endforeach
                <!-- post end-->
                    {{ $articles->links('components.user-pagination-links') /* For pagination links */}}
                @endif

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
