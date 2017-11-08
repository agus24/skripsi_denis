<!doctype html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <title>{{ Config::get('app.name') }}</title>
        <link rel="shortcut icon" href="images/favicon.ico">

        <link rel='stylesheet' href='{{ asset('front/css/settings.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/bootstrap.min.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/swatches-and-photos.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/prettyPhoto.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/jquery.selectBox.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/font-awesome.min.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic%7CCrimson+Text:400,400italic,600,600italic,700,700italic' type='text/css' media='all'/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel='stylesheet' href='{{ asset('front/css/elegant-icon.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/style.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/commerce.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/custom.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('front/css/magnific-popup.css') }}' type='text/css' media='all'/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        .cart-qty {
            width:60%;
            float:left;
            border:none;
        }
        .cart-qty:hover {
            border:none !important;
        }
    </style>
    </head>
    <body>
        <div class="offcanvas open">
            <div class="offcanvas-wrap">
                <div class="offcanvas-user clearfix">
                    <a class="offcanvas-user-account-link">
                        {{-- <i class="fa fa-user"></i> Login --}}
                    </a>
                    @include('front.layouts.topBar')
                </div>
                <nav class="offcanvas-navbar">
                    <ul class="offcanvas-nav">
                        @include('front.layouts.sidebar')
                    </ul>
                </nav>
            </div>
        </div>
        <div id="wrapper" class="wide-wrap">
            <div class="offcanvas-overlay"></div>
            <header class="header-container header-type-center header-navbar-center header-scroll-resize">
                <div class="topbar">
                    <div class="container topbar-wap">
                        <div class="row">
                            <div class="col-sm-6 col-left-topbar">
                                <div class="left-topbar">
                                </div>
                            </div>
                            <div class="col-sm-6 col-right-topbar">
                                <div class="right-topbar">
                                    <div class="user-login">
                                        <ul class="nav top-nav primary-nav" style="text-align: right;">
                                            @include('front.layouts.topBar')
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-container">
                    <div class="navbar navbar-default navbar-scroll-fixed">
                        <div class="navbar-default-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="navbar-default-col">
                                        <div class="navbar-wrap">
                                            <div class="navbar-header">
                                                <div class="navbar-header-left">
                                                </div>
                                                <div class="navbar-header-center">
                                                    <button type="button" class="navbar-toggle">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar bar-top"></span>
                                                        <span class="icon-bar bar-middle"></span>
                                                        <span class="icon-bar bar-bottom"></span>
                                                    </button>
                                                    <a class="cart-icon-mobile" href="#">
                                                        <i class="elegant_icon_bag_alt"></i>
                                                        <span>0</span>
                                                    </a>
                                                    <a class="navbar-brand" href="{{ url('/') }}">
                                                        <h1>{{ Config::get('app.name') }}</h1>
                                                    </a>
                                                </div>
                                                <div class="navbar-header-right">
                                                @if ($errors->any())
                                                    <ul class="alert alert-danger" style="text-align:center">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                    <div class="navbar-minicart navbar-minicart-topbar">
                                                        <div class="navbar-minicart">
                                                            <a class="minicart-link" href="#">
                                                                <span class="minicart-icon">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>{{ $cart->count() }}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <nav class="collapse navbar-collapse primary-navbar-collapse">
                                                <ul class="nav navbar-nav primary-nav">
                                                    @include('front.layouts.sidebar')
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-search-overlay hide">
                            <div class="container">
                                <div class="header-search-overlay-wrap">
                                    <form class="searchform">
                                        <input type="search" class="searchinput" name="s" autocomplete="off" value="" placeholder="Search..."/>
                                    </form>
                                    <button type="button" class="close">
                                        <span aria-hidden="true" class="fa fa-times"></span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content-container no-padding">
                <div class="container-full">
                    <div class="main-content">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer id="footer" class="footer">
                <div class="footer-widget">
                    <div class="container">
                        <div class="footer-widget-wrap">
                            <div class="row">
                                <div class="footer-widget-col col-md-6 col-sm-12">
                                    <div class="widget widget_text">
                                        <div class="textwidget">
                                            <ul class="address">
                                                <li>
                                                    <i class="fa fa-home"></i>
                                                    <h4>Address:</h4>
                                                    <p>JL. RAYA SERANG KM. 68, NAMBO ILIR, SERANG, BANTEN</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-mobile"></i>
                                                    <h4>Phone:</h4>
                                                    <p>0254-402675</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-envelope"></i>
                                                    <h4>Email:</h4>
                                                    <p>Kti.kingtire@yahoo.co.id</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-widget-col col-md-6 col-sm-12">
                                    <div class="widget widget_nav_menu">
                                        <h3 class="widget-title">
                                            <span>infomation</span>
                                        </h3>
                                        <div class="menu-infomation-container">
                                            <ul class="menu">
                                                <li><a href="{{ url('about-us') }}">About Us</a></li>
                                                <li><a href="{{ url('termcondition') }}">Term &#038; Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @include('modal.login')
        @include('modal.register')
        @include('modal.forgetPassword')
        @include('front.layouts.cart')
        @yield('modal')

        <script type='text/javascript' src='{{ asset('front/js/jquery.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery-migrate.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.themepunch.tools.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.themepunch.revolution.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/easing.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/imagesloaded.pkgd.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/bootstrap.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/superfish-1.7.4.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.appear.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/script.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/swatches-and-photos.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.cookie.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.prettyPhoto.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.prettyPhoto.init.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.selectBox.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.touchSwipe.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.transit.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.carouFredSel.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/jquery.magnific-popup.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/isotope.pkgd.min.js') }}'></script>

        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.video.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.slideanims.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.actions.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.layeranimation.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.kenburn.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.navigation.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.migration.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('front/js/extensions/revolution.extension.parallax.min.js') }}'></script>
        <script type="text/javascript">

            var tpj=jQuery;

            var revapi7;
            tpj(document).ready(function() {
                if(tpj("#rev_slider").revolution == undefined){
                    revslider_showDoubleJqueryError("#rev_slider");
                }else{
                    revapi7 = tpj("#rev_slider").show().revolution({
                        sliderType:"standard",
                        sliderLayout:"fullwidth",
                        dottedOverlay:"none",
                        delay:9000,
                        navigation: {
                            keyboardNavigation:"off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                            onHoverStop:"on",
                            touch:{
                                touchenabled:"on",
                                swipe_threshold: 75,
                                swipe_min_touches: 50,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            }
                            ,
                            arrows: {
                                style:"gyges",
                                enable:true,
                                hide_onmobile:true,
                                hide_under:600,
                                hide_onleave:true,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                tmp:'',
                                left: {
                                    h_align:"left",
                                    v_align:"center",
                                    h_offset:30,
                                    v_offset:0
                                },
                                right: {
                                    h_align:"right",
                                    v_align:"center",
                                    h_offset:30,
                                    v_offset:0
                                }
                            }
                            ,
                            bullets: {
                                enable:true,
                                hide_onmobile:true,
                                hide_under:600,
                                style:"hephaistos",
                                hide_onleave:true,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                direction:"horizontal",
                                h_align:"center",
                                v_align:"bottom",
                                h_offset:0,
                                v_offset:30,
                                space:5,
                                tmp:''
                            }
                        },
                        gridwidth:1170,
                        gridheight:600,
                        lazyType:"smart",
                        parallax: {
                            type:"mouse",
                            origo:"slidercenter",
                            speed:2000,
                            levels:[2,3,4,5,6,7,12,16,10,50],
                        },
                        shadow:0,
                        spinner:"off",
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,
                        shuffle:"off",
                        autoHeight:"off",
                        disableProgressBar:"on",
                        hideThumbsOnMobile:"off",
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        debugMode:false,
                        fallbacks: {
                            simplifyAll:"off",
                            nextSlideOnWindowFocus:"off",
                            disableFocusListener:false,
                        }
                    });
                }
            }); /*ready*/
        </script>
        @yield('script')
    </body>
</html>
