<div class="header_bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="menu d-none d-lg-block ">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="{{ route('shop_page') }}">Shop</a></li>
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
                        <li> <a href="">Login</a></li>
                        <li> <a href="{{ route('customer.register.page') }}">Register</a></li>
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
                                <li><a href="{{ route('shop_page') }}">Shop</a></li>
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
