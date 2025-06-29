<div class="header_bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="menu d-none d-lg-block ">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="shop.html">Shop <i class="zmdi zmdi-chevron-down"></i></a>
                                <ul class="sub_menu">
                                    <li><a href="shop.html">Shop </a></li>
                                    <li><a href="shop-list-right-sidebar.html">shop Right Sidebar</a></li>
                                    <li><a href="shop-without-sidebar.html">shop without Sidebar</a></li>
                                    <li><a href="product-details.html">Product Details </a></li>
                                    <li><a href="product-details-sidebar.html">Product Details Sidebar </a>
                                    </li>
                                    <li><a href="checkout.html">Checkout </a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('blog.page') }}">Blog</a></li>
                            <li><a href="contact-us.html">Contact </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="header_right_info">
                    <ul>
                        <li><a href="wishlist.html">Wishlist<span> <i class="zmdi zmdi-favorite-outline"></i> (0)
                                </span></a></li>
                        <li> <a href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 d-lg-none">
                <!--Mobile menu murkup start-->
                <div class="mobile-menu-area d-lg-none">
                    <div class="mobile-menu clearfix">
                        <nav>
                            <ul>
                                <li><a href="{{ route('home') }}">HOME </a> </li>
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="shop.html">Shop</a>
                                    <ul>
                                        <li><a href="shop.html">Shop </a></li>
                                        <li><a href="shop-list-right-sidebar.html">shop Right Sidebar</a>
                                        </li>
                                        <li><a href="shop-without-sidebar.html">shop without Sidebar</a>
                                    </ul>
                                </li>
                                <li><a href="{{ route('blog.page') }}">Blog</a> </li>
                                <li><a href="contact-us.html">CONTACT </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--Mobile menu murkup End-->
            </div>
        </div>
    </div>
</div>
