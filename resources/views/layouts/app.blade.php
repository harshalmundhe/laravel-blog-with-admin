<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{ config('app.name') }}: @yield('title', ucfirst(str_replace("/","",$_SERVER['REQUEST_URI'])))
    </title>
	 <base href="http://{{$_SERVER['HTTP_HOST']}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->
    
	<!-- core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	@yield('include_css')
    
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
</head><!--/head-->

<body class="homepage">
<div id="app"></div>
    
    
    @include("inc.navbar")
    @include("inc.searchbox")
    
    @include("inc.messages")
    @yield('content')
    
    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">We are hiring</a></li>
                            <li><a href="#">Meet the team</a></li>
                            <li><a href="#">Copyright</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Refund policy</a></li>
                            <li><a href="#">Ticket system</a></li>
                            <li><a href="#">Billing system</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Developers</h3>
                        <ul>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">SEO Marketing</a></li>
                            <li><a href="#">Theme</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Email Marketing</a></li>
                            <li><a href="#">Plugin Development</a></li>
                            <li><a href="#">Article Writing</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Our Partners</h3>
                        <ul>
                            <li><a href="#">Adipisicing Elit</a></li>
                            <li><a href="#">Eiusmod</a></li>
                            <li><a href="#">Tempor</a></li>
                            <li><a href="#">Veniam</a></li>
                            <li><a href="#">Exercitation</a></li>
                            <li><a href="#">Ullamco</a></li>
                            <li><a href="#">Laboris</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="float-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    @yield('include_js')
</body>
</html>
