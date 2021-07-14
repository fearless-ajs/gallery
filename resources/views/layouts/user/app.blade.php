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
    <link rel="shortcut icon" href="{{asset('user/images/favicon.ico')}}">
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
        <a href="{{route('user.homepage')}}" class="logo-holder"><img src="{{asset('user/images/logo.png')}}" alt=""></a>
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
                        <a href="index.html" class="act-link">Home </a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="#">Galleries </a>
                        <!--second level -->
                        <ul>
                            <li><a href="pictures.html">Pictures</a></li>
                            <li><a href="videos.html">Videos</a></li>
                        </ul>
                        <!--second level end-->
                    </li>

                    <li>
                        <a href="articles.html">Articles</a>
                    </li>
                    <li>
                        <a href="open-houses.html">Open Houses</a>
                    </li>
                    <li>
                        <a href="index.html">Contact</a>
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
<script type="text/javascript" src="{{asset('user/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/scripts.js')}}"></script>
</body>
</html>
