<div class="content">
    <!-- column-image  -->
    <div class="column-image">
        <div class="bg"  data-bg="
        @if($page->image)
            {{$page->ImagePath}}
        @else
            {{asset('user/images/bg/1.jpg')}}
        @endif
            "></div>

        <div class="fixed-column-dec"></div>
    </div>
    <!-- column-image end  -->
    <!-- column-wrapper -->
    <div class="column-wrapper">
        <!--section  -->
        <section id="sec1">
            <div class="container small-container">
                <div class="section-title fl-wrap">
                    <h3>{{$page->title}}</h3>
                </div>
                <div class="column-wrapper_item fl-wrap">
                    <div class="column-wrapper_text fl-wrap">
                        <p>
                            {{$page->content}}
                        </p>

                    </div>
                </div>
            </div>
        </section>
        <!--section end  -->
        <div class="sec-dec"></div>

        <!--footer -->
        <footer class="min-footer fl-wrap content-animvisible">
            <div class="container small-container">
                <div class="footer-inner fl-wrap">
                    <!-- policy-box-->
                    <div class="policy-box">
                        <span>&#169; {{$setting->app_name}} {{Carbon\Carbon::now()->format('Y')}}  /  All rights reserved. </span>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer end  -->
    </div>
    <!-- column-wrapper -->
</div>
