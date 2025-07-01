@php
    use App\Models\WebsiteSetting;
    $website_setting = WebsiteSetting::first();

    $carts = session()->get('cart', []);
    $itemCount = 0;

    foreach ($carts as $item) {
        $itemCount += $item['quantity'];
    }
@endphp

<div class="header_middle">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        @if ($website_setting && $website_setting->website_logo)
                            <img src="{{ asset($website_setting->website_logo) }}"
                                alt="{{ $website_setting->website_title ?? 'Logo' }}">
                        @else
                            <img src="{{ asset('frontend') }}/assets/img/logo/logo.png" alt="Default Logo">
                        @endif
                    </a>

                </div>
            </div>
            <div class="col-lg-7 col-md-8">
                <div class="category_search">
                    <form action="#">
                        <div class="category_search_inner">
                            <div class="select">
                                <select name="categroy_search">
                                    <option value="1" selected>All Categories</option>
                                    <option value="2">Latest Bikes</option>
                                    <option value="3">Upcoming Bike</option>
                                    <option value="4">popular Bike</option>
                                    <option value="5">Best Selling Bike</option>
                                </select>
                            </div>
                            <div class="search">
                                <input type="text" placeholder="Search Keyword Here">
                            </div>
                            <div class="submit">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-1">
                <div class="mini_cart_box_wrapper text-right">
                    <a href="#">
                        <img src="{{ asset('frontend') }}/assets/img/icon/cart.png" alt="Mini Cart Icon">
                        <span class="cart_count">{{ $itemCount }}</span>
                    </a>
                    @unless(request()->routeIs('cart.page'))
                    <ul class="mini_cart_box" id="mini-cart-container">
                        @php
                            $cart = session()->get('cart', []);
                            $subtotal = 0;
                            foreach ($cart as $item) {
                                $subtotal += $item['price'] * $item['quantity'];
                            }
                        @endphp

                        @if (count($cart) > 0)
                            @include('website.layouts.pages.cart.partials.mini-cart-items', [
                                'cartItems' => $cart,
                                'subtotal' => $subtotal,
                            ])
                        @else
                            <li class="text-center py-3">Your cart is empty</li>
                        @endif
                    </ul>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>


@include('website.layouts.inc.navber')
