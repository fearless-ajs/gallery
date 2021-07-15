<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>{{$data['title']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content="{{$data['keywords']}}"/>
    <meta name="description" content="{{$data['description']}}"/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/style-dark.css')}}">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="
     @if($settings->favicon)
        {{$settings->FaviconPath}}
    @else
    {{asset('user/images/favicon.ico')}}
    @endif
        ">
    <link rel="stylesheet" href="{{asset('admin/dist/css/toastr.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />
</head>

<body>
<!--loader-->
<div class="loader-wrap">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header start  -->
    <header class="main-header">
        <!-- logo   -->
        <a href="{{route('user.homepage')}}" class="logo-holder"><img src="
            @if($settings->logo)
                {{$settings->IconPath}}
            @else
            {{asset('user/images/logo.png')}}
            @endif
                " alt=""></a>
        <!-- logo end  -->

        <!-- mobile nav -->
        <div class="nav-button-wrap">
            <div class="nav-button"><span></span><span></span><span></span></div>
        </div>
        <!-- mobile nav end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    <li>
                        <a href="{{route('user.homepage')}}" class="@if(Route::currentRouteName() == 'user.homepage') act-link @endif ">Home </a>
                    </li>
                    <li>
                        <a href="{{route('user.about')}}" class="@if(Route::currentRouteName() == 'user.about') act-link @endif ">About</a>
                    </li>
                    <li>
                        <a href="#" class="@if(Route::currentRouteName() == 'user.videos' || Route::currentRouteName() == 'user.pictures') act-link @endif ">Galleries </a>
                        <!--second level -->
                        <ul>
                            <li><a href="pictures.html">Pictures</a></li>
                            <li><a href="{{route('user.videos')}}">Videos</a></li>
                        </ul>
                        <!--second level end-->
                    </li>

                    <li>
                        <a href="{{route('user.articles')}}" class="@if(Route::currentRouteName() == 'user.articles' || Route::currentRouteName() == 'user.view.article') act-link @endif ">Articles</a>
                    </li>
                    <li>
                        <a href="{{route('user.open-houses')}}" class="@if(Route::currentRouteName() == 'user.open-houses') act-link @endif ">Open Houses</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </header>
    <!-- header end -->

    <div id="wrapper">

        @yield('content')

        <!--share-wrapper-->
        <div class="share-wrapper">
            <div class="share-container fl-wrap  isShare"></div>
        </div>
        <!--share-wrapper end-->
    </div>

    <!-- cursor-->
    <div class="element">
        <div class="element-item"></div>
    </div>
    <!-- cursor end-->
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<!--Livewire script-->
<livewire:scripts />
<script type="text/javascript" src="{{asset('user/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/scripts.js')}}"></script>
<script  src="{{asset('admin/dist/js/toastr.js')}}"></script>

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
</body>
</html>
