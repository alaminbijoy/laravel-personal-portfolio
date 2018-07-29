<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,700,700i,900" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

</head>
<body>
<!-- start header -->
<header>
    <!-- start navigation -->
    <div class="navbar navbar-default">
        <!-- start header navigation -->
            <div class="col-md-4 col-sm-4 col-xs-8 text-left">
                <div class="social-icon">
                    <ul class="social-ul">
                        @isset($social_media)
                            @foreach($social_media as $social_media_icon)

                                <li class="social-li">
                                    <a href="{{$social_media_icon->social_media_url}}" title="{{$social_media_icon->social_media_name}}" target="_blank">
                                        @if($social_media_icon->media_id)
                                            <img src="{{$social_media_icon->media->path . $social_media_icon->media->image_name}}" alt="{{ $social_media_icon->media_id }}">
                                        @else
                                            <i class="{{$social_media_icon->icon}}" aria-hidden="true"></i>
                                        @endif
                                    </a>
                                </li>

                            @endforeach
                        @endisset

                    </ul>
                </div>
            </div>
            <!-- start logo -->
            <!-- <div class="col-md-4 col-sm-4 col-xs-6 text-center xs-text-left">
                <a class="logo" href="index.html"><img src="images/logo.png" data-at2x="images/logo@2x.png" class="default" alt="Sultan Mahmud"></a>
            </div> -->
            <!-- end logo -->
            <div class="col-md-8 text-right">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header navigation -->
    <!-- end navigation -->

</header>
<!-- end header -->

@yield('content')
<a href="#contact"><span class="hireme-btn animated pulse infinite" style="cursor:pointer">Hire Me</span></a>
{{--<div id="mySidenav" class="sidenav">--}}
    {{--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}
    {{--<a href="#" target="_blank"><img src="assets/img/pph-icon.png">PeoplePerHour</a>--}}
    {{--<a href="#" target="_blank"><img src="assets/img/fiverr-icon.png">Fiverr</a>--}}
    {{--<a href="#" target="_blank"><img src="assets/img/upwork-icon.webp">Upwork</a>--}}
{{--</div>--}}

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="copyright">Copyright © <a href="{{ route('home') }}">alaminbijoy.me</a> 2018. All rights reserved.</span>
            </div>
            <div class="col-md-6">
                <ul class="list-inline social-buttons">
                    @isset($social_media)
                        @foreach($social_media as $social_media_icon)
                            <li class="list-inline-item">
                                <a href="{{$social_media_icon->social_media_url}}" title="{{$social_media_icon->social_media_name}}" target="_blank">
                                    @if($social_media_icon->media_id)
                                        <img style="width: 18px; margin-bottom: 4px;" src="{{$social_media_icon->media->path . $social_media_icon->media->image_name}}" alt="{{ $social_media_icon->media_id }}">
                                    @else
                                        <i class="{{$social_media_icon->icon}}" aria-hidden="true"></i>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/animatedModal.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.10.0/lazyload.min.js"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('script')

</body>
</html>
