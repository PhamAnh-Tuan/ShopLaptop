<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +84 962437205</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ route('trangchu') }}"><img src="images/GearVN_free-file.png" alt=""
                                style="width:140px" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            {{-- <li><a href="#"><i class="fa fa-user"></i> Account</a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> --}}
                            {{-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> --}}

                            <li style="position:relative"><a href="{{ route('cart.index') }}"><i
                                        class="fa fa-shopping-cart"></i><span style="text-align: center;width: 22px;position: absolute;top: -19px;left: 9px;background-color: #FDC27B;border-radius: 50%;">
                                        <?php
                                        $number = 0;
                                        $cart = Session()->get('cart');
                                        if ($cart != '') {
                                        foreach ($cart as $value => $val) {
                                        $number += $val['product_qty'];
                                        }
                                        echo $number;
                                        } else {
                                        echo '0';
                                        }
                                        ?></span> Gi??? h??ng </a>
                            </li>
                            {{-- <li><a href="login.html"><i class="fa fa-lock"></i> ????ng nh???p</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('trangchu') }}" class="active">Home</a></li>
                            {{-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="contact-us.html">Li??n h???</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <form action="{{ url('/tim-kiem') }}" method="GET">

                        <div class="search_box pull-right">
                            <input type="text" name="key" placeholder="T??m ki???m" />
                            {{-- <input type="submit" name="search_item" class="btn btn-default btn-sm" value="T??m"/> --}}

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->
