<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-4">
                <div class="left-header clearfix">
                    <ul>
                        <li>
                            <p><i class="fa fa-phone" aria-hidden="true"></i>0334938322</p>
                        </li>
                        <li class="hd-none">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i>Mon-fri : 8:00-21:00</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="right-header">
                    <ul>
                        <li><a href="my-account.html"><i class="fa fa-user"></i>My account</a></li>
                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i>My cart</a></li>
                        <li><a href="wishlist.html"><i class="fa fa-heart"></i>My wishlist</a></li>
                        <li><a href="checkout.html"><i class="fa fa-usd"></i>Creck out</a></li>
                        @guest
                            <li><a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a></li>
                        @endguest
                        @auth
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom header-bottom-one" id="sticky-menu">
    <div class="container relative">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-xs-4">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('tasnm/img/logo.png') }}" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-xs-8 static">
                <div class="all-manu-area">
                    <div class="mainmenu clearfix hidden-sm hidden-xs">
                        <nav>
                            <ul>
                                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li><a href="#">Danh mục</a>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li><a data-toggle="tab" href="#category-{{ $category->category_id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="shop.html">Shop</a>
                                    <div class="magamenu ">
                                        <ul class="again">
                                            <li class="single-menu colmd4">
                                                <span>men’s wear</span>
                                                <a href="#">shirts & top</a>
                                                <a href="#">shoes</a>
                                                <a href="#">dresses</a>
                                                <a href="#">shwmwear</a>
                                            </li>
                                            <li class="single-menu colmd4">
                                                <span>women’s wear</span>
                                                <a href="#">shirts & tops</a>
                                                <a href="#">shoes</a>
                                                <a href="#">dresses</a>
                                                <a href="#">shwmwear</a>
                                            </li>
                                            <li class="single-menu colmd4">
                                                <span>accessories</span>
                                                <a href="#">sunglasses</a>
                                                <a href="#">leather</a>
                                                <a href="#">belts</a>
                                                <a href="#">rings</a>
                                            </li>
                                            <li class="single-menu colmd4 colmd5">
                                                <a href="#">
                                                    <img alt="" src="img/maga-banner.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>                              
                                <li><a href="shop.html">Liên hệ</a></li>
                                <li><a href="blog.html">Hỏi đáp</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- mobile menu start -->
                    <!-- mobile menu end -->
                    <div class="right-header re-right-header">
                        <ul>
                            <li class="re-icon tnm"><i class="fa fa-search" aria-hidden="true"></i>
                                <form method="get" id="searchform" action="{{ route('search') }}">
                                    @csrf
                                    <input type="text" value="" name="query" id="ws" placeholder="Search product..." />
                                    <button type="submit"><i class="pe-7s-search"></i></button>
                                </form>
                            </li>
                            
                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i><span
                                        class="color1">2</span></a>
                                <ul class="drop-cart">
                                    <li>
                                        <a href="cart.html"><img src="img/cart/1.png" alt="" /></a>
                                        <div class="add-cart-text">
                                            <p><a href="#">White Shirt</a></p>
                                            <p>$50.00</p>
                                            <span>Color : Blue</span>
                                            <span>Size : SL</span>
                                        </div>
                                        <div class="pro-close">
                                            <i class="pe-7s-close"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="cart.html"><img src="img/cart/2.png" alt="" /></a>
                                        <div class="add-cart-text">
                                            <p><a href="#">White Shirt</a></p>
                                            <p>$50.00 x 2</p>
                                            <span>Color : Blue</span>
                                            <span>Size : SL</span>
                                        </div>
                                        <div class="pro-close">
                                            <i class="pe-7s-close"></i>
                                        </div>
                                    </li>
                                    <li class="total-amount clearfix">
                                        <span class="floatleft">total</span>
                                        <span class="floatright"><strong>= $150.00</strong></span>
                                    </li>
                                    <li>
                                        <div class="goto text-center">
                                            <a href="cart.html"><strong>go to cart &nbsp;<i
                                                        class="pe-7s-angle-right"></i></strong></a>
                                        </div>
                                    </li>
                                    <li class="checkout-btn text-center">
                                        <a href="checkout.html">Check out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
