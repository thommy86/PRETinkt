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
                            <a href="#">
                                <?php echo trans("master.english"); ?>
                                <span class="fa fa-angle-down tz-down"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php echo trans("master.dutch"); ?>
                                <span class="fa fa-angle-down tz-down"></span>
                            </a>
                        </li>
                    </ul>
                    <ul class="pull-right">
                        <li>
                            <a href="/wishlist"><?php echo trans("master.wishlist"); ?></a>
                        </li>
                        <li>
                            <a href="/cart"><?php echo trans("master.cart"); ?></a>
                        </li>
                        <li class="tz-header-login">
                            <a href="#"><?php echo trans("master.login"); ?></a>
                            <div class="tz-login-form">
                                <form>
                                    <p class="form-content">
                                        <label for="username"><?php echo trans("master.username"); ?></label>
                                        <input type="text" name="username" id="username" value="">
                                    </p>
                                    <p class="form-content">
                                        <label for="password"><?php echo trans("master.password"); ?></label>
                                        <input type="password" name="username" id="password" value="">
                                    </p>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--End class header top-->

                <!--Start header content-->
                <div class="header-content">
                    <h3 class="tz-logo pull-left"><a href="index.html"><img src="/public/images/logo.png" alt="home" /></a></h3>
                    <div class="tz-search pull-right">

                        <!--Start form search-->
                        <form>
                            <input type="text" class="tz-query" id="tz-query" value="" placeholder="Search for product">
                            <button type="submit"></button>
                        </form>
                        <!--End Form search-->

                        <!--live search-->
                        <div class="live-search">
                            <ul>
                                <li>
                                    <div class="live-img"><img src="/public/images/product/product-search1.jpg" alt="product search one"></div>
                                    <div class="live-search-content">
                                        <h6><a href="single-product.html">Defy Advanced</a></h6>
                                        <span class="live-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="product-color">
                                                <i class="light-blue"></i>
                                                <i class="orange"></i>
                                                <i class="orange-dark"></i>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End live search-->
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
                            <a href="/"><?php echo trans("master.home"); ?></a>
                        </li>
                        <li>
                            <a href="/products"><?php echo trans("master.products"); ?></a>
                        </li>
                        <li>
                            <a href="/quoatation"><?php echo trans("master.quoatation"); ?></a>
                        </li>
                        <li>
                            <a href="/contact"><?php echo trans("master.contact"); ?></a>
                        </li>
                    </ul>
                    <!--End Main menu-->

                    <!--Shop meta-->
                    <ul class="tz-ecommerce-meta pull-right">
                        <li class="tz-menu-wishlist">
                            <a href="#"><strong>0</strong></a>
                        </li>
                        <li class="tz-mini-cart">
                            <a href="shop-cart.html"><strong>2</strong>Cart : $199.00</a>

                            <!--Mini cart-->
                            <ul class="cart-inner">
                                <li class="mini-cart-content">
                                    <div class="mini-cart-img"><img src="/public/images/product/product-cart1.png" alt="product search one"></div>
                                    <div class="mini-cart-ds">
                                        <h6><a href="single-product.html">Liv Race Day Short</a></h6>
                                        <span class="mini-cart-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="mini-meta">
                                               <span class="mini-color">Color: <i class="orange"></i></span>
                                               <span class="mini-qty">Qty: 5</span>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mini-cart-delete"><img src="/public/images/delete.png" alt="delete"></span>
                                </li>
                                <li class="mini-cart-content">
                                    <div class="mini-cart-img"><img src="/public/images/product/product-cart2.png" alt="product search one"></div>
                                    <div class="mini-cart-ds">
                                        <h6><a href="single-product.html">City Pedals Sport</a></h6>
                                        <span class="mini-cart-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="mini-meta">
                                               <span class="mini-color">Color: <i class="orange"></i></span>
                                               <span class="mini-qty">Qty: 5</span>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mini-cart-delete"><img src="/public/images/delete.png" alt="delete"></span>
                                </li>
                                <li class="mini-cart-content">
                                    <div class="mini-cart-img"><img src="/public/images/product/product-cart3.png" alt="product search one"></div>
                                    <div class="mini-cart-ds">
                                        <h6><a href="single-product.html">Gloss</a></h6>
                                        <span class="mini-cart-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="mini-meta">
                                               <span class="mini-color">Color: <i class="orange"></i></span>
                                               <span class="mini-qty">Qty: 5</span>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mini-cart-delete"><img src="/public/images/delete.png" alt="delete"></span>
                                </li>
                                <li class="mini-subtotal">
                                    <span class="subtotal-content">
                                        Subtotal:
                                        <strong class="pull-right">$1,100.00</strong>
                                    </span>
                                </li>
                                <li class="mini-footer">
                                    <a href="/cart" class="view-cart"><?php echo trans("master.cart"); ?></a>
                                    <a href="/checkout" class="check-out"><?php echo trans("master.checkout"); ?></a>
                                </li>
                            </ul>
                            <!--End mini cart-->

                        </li>
                    </ul>
                    <!--End Shop meta-->

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
                            <h3 class="widget-title"><?php echo trans("master.contactinfo"); ?></h3>
                            <ul>
                                <li>
                                    <span><?php echo trans("master.address"); ?> :</span>
                                    <address>
                                        <?php echo config('app.Street'); ?> <?php echo config('app.Number'); ?>, <?php echo config('app.City'); ?>,<br> <?php echo config('app.Country'); ?>
                                    </address>
                                </li>
                                <li>
                                    <span><?php echo trans("master.phone"); ?> :</span>
                                    <?php echo config('app.Phone'); ?>
                                </li>
                                <li>
                                    <span><?php echo trans("master.email"); ?> :</span>
                                    <?php echo config('app.Emailaddress'); ?>
                                </li>
                            </ul>
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
                                    <h3 class="widget-title"><?php echo trans("master.information"); ?></h3>
                                    <ul>
                                        <li>
                                            <a href="/faq"><?php echo trans("master.faq"); ?></a>
                                        </li>
                                        <li>
                                            <a href="/privacy"><?php echo trans("master.privacypolicy"); ?></a>
                                        </li>
                                        <li>
                                            <a href="/shipping"><?php echo trans("master.shipping"); ?></a>
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
                            <p>Copyright &copy; 2016 <?php echo config('app.Webshopename'); ?>. All rights reserved.</p>
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