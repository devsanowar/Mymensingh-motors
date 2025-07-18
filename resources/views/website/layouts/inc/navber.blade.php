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
                            <li><a href="{{ route('contact.page') }}">Contact </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="header_right_info">
                    <ul>
                        <li><a href="wishlist.html">Wishlist<span> <i class="zmdi zmdi-favorite-outline"></i> (0)
                                </span></a></li>
                        @if (!Auth::check() || (Auth::check() && Auth::user()->system_admin !== 'Customer'))
                            <li> <a href="{{ route('customer.login.page') }}">Login</a></li>
                        @else
                            <li class="nav-logout">
                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger customer-logout-button"> logout
                                    </button>
                                </form>
                            </li>
                        @endif
                        @if (!Auth::check() || (Auth::check() && Auth::user()->system_admin !== 'Customer'))
                            <li><a href="{{ route('customer.register.page') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                        @endif
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
