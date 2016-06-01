<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link href="/public/css/bootstrap.min.css" rel="stylesheet" type='text/css'>
    <link href='/public/fonts/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='/public/fonts/lovelo/stylesheet.css' rel='stylesheet' type='text/css'>

    <link href='/public/css/owl.carousel.css' rel='stylesheet' type='text/css'>
    <link href='/public/css/owl.theme.css' rel='stylesheet' type='text/css'>
    <link href="/public/rs-plugin/css/settings.css" rel="stylesheet" type='text/css'>
    <link href="/public/css/custom.css" rel="stylesheet" type='text/css'>

    <!--[if lt IE 9]>
    <script src="/public/js/html5shiv.min.js"></script>
    <script src="/public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--Start class site-->
    <div class="tz-site">

        <!--Start id tz header-->
        <header id="tz-header" class="bk-white">
            <div class="container">

                <!--Start class header top-->
                <div class="header-top">
                    <ul class="pull-left">
                        <li>
                            <a href="/language/en">
                                {{ trans("master.english") }}
                            </a>
                        </li>
                        <li>
                            <a href="/language/nl">
                                {{ trans("master.dutch") }}
                            </a>
                        </li>
                    </ul>
                    <ul class="pull-right">
                        <li>
                            <a href="/wishlist">{{ trans("master.wishlist") }}</a>
                        </li>
                        <li>
                            <a href="/cart">{{ trans("master.cart") }}</a>
                        </li>
                        <li class="tz-header-login">
							@if (Session::get('isAuthenticated') == true)
								<a href="/login/off">{{ trans("master.logoff") }}</a>
							@else
								<a href="#">{{ trans("master.login") }}</a>
								<div class="tz-login-form">
									<form action="login" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<p class="form-content">
											<label for="username">{{ trans("master.username") }}</label>
											<input type="text" name="username" id="username" value="{{ old('gebruikersnaam') }}">
										</p>
										<p class="form-content">
											<label for="password">{{ trans("master.password") }}</label>
											<input type="password" name="password" id="password">
										</p>
										<p class="form-footer">
											<button type="submit" class="pull-right button_class">{{ trans("master.login") }}</button>
										</p>
									</form>
								</div>
							@endif
                        </li>
                    </ul>
                </div>
                <!--End class header top-->

                <!--Start header content-->
                <div class="header-content">
                    <h3 class="tz-logo pull-left">{{ config('webshop.Webshopname') }}</h3>
                    <div class="tz-search pull-right">

                        <!--Start form search-->
                        <form action="search" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="tz-query" id="tz-query" name="zoekterm" value="{{ old('zoekterm') }}" placeholder="{{ trans('master.searchforproduct') }}">
                            <button type="submit"></button>
						</form>
                        <!--End Form search-->
                    </div>
                </div>
                <!--End class header content-->
            </div>

            <!--Start main menu -->
            <nav class="tz-menu-primary">
                <div class="container">

                    <!--Main Menu-->
                    <ul class="tz-main-menu pull-left nav-collapse">
                        <li>
                            <a href="/">{{ trans("master.home") }}</a>
                        </li>
                        <li>
                            <a href="/products">{{ trans("master.products") }}</a>
                        </li>
                        <li>
                            <a href="/quoatation">{{ trans("master.quoatation") }}</a>
                        </li>
                        <li>
                            <a href="/contact">{{ trans("master.contact") }}</a>
                        </li>
                    </ul>
                    <!--End Main menu-->

                    <!--navigation mobi-->
                    <button data-target=".nav-collapse" class="btn-navbar tz_icon_menu" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!--End navigation mobi-->
                </div>
            </nav>
            <!--End stat main menu-->

        </header>
        <!--End id tz header-->

        @yield('content')

        <!--Start Footer-->
        <footer class="tz-footer">
            <div class="footer-widget">
                <div class="container">

                    <!--Start footer left-->
                    <div class="footer-left">
                        <div class="contact-info widget">
                            <h3 class="widget-title">{{ trans("master.contactinfo") }}</h3>
                            <ul>
                                <li>
                                    <span>{{ trans('quoatation.address') }}:</span>
                                    <address>{{ config('webshop.Street') }} {{ config('webshop.Number') }}, {{ config('webshop.City') }},<br> {{ config('webshop.Country') }}</address>
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.phone') }}:</span> {{ config('webshop.Phone') }}
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.email') }}:</span> {{ config('webshop.Email') }}
                                </li>
                        </div>
                        <!--<div class="widget">
                            <ul class="tz-social">
                                <li>
                                    <a class="fa fa-facebook" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-twitter" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-google-plus" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-tumblr" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-flickr" href="#"></a>
                                </li>
                                <li>
                                    <a class="fa fa-pinterest" href="#"></a>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                    <!--End footer left-->

                    <!--Start footer right-->
                    <div class="footer-right">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="widget widget_nav_menu">
                                    <h3 class="widget-title">{{ trans("master.information") }}</h3>
                                    <ul>
                                        <li>
                                            <a href="/faq">{{ trans("master.faq") }}</a>
                                        </li>
                                        <li>
                                            <a href="/privacypolicy">{{ trans("master.privacypolicy") }}</a>
                                        </li>
                                        <li>
                                            <a href="/shipping">{{ trans("master.shipping") }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End footer right-->

                </div>
            </div>
            <div class="tz-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <p>Copyright &copy; 2016 {{ config('webshop.Webshopname') }}. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer-->

    </div>
    <!--End class site-->

    <script type='text/javascript' src="/public/js/jquery.min.js"></script>
    <script type='text/javascript' src="/public/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="/public/js/off-canvas.js"></script>
    <!--jQuery Countdow-->
    <script type='text/javascript' src="/public/js/jquery.plugin.min.js"></script>
    <script type='text/javascript' src="/public/js/jquery.countdown.min.js"></script>
    <!--End Countdow-->
    <script type='text/javascript' src="/public/js/jquery.parallax-1.1.3.js"></script>
    <script type='text/javascript' src="/public/js/owl.carousel.js"></script>
    <script type='text/javascript' src="/public/js/custom.js"></script>
    <script type='text/javascript' src='/public/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='/public/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='/public/rs-plugin/js/custom-rs.js'></script>
</body>
</html>