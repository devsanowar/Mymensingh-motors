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



            <div class="col-md-6 d-none d-md-block">
                <div class="category_search d-flex justify-content-center">
                    <div class="category_search_inner">
                        <div class="input-group search" style="max-width: 450px;">
                            <input type="text" class="form-control search-input" id="searchInput"
                                placeholder="Search here..." aria-label="Search" />
                            <button class="btn btn-search d-flex align-items-center submit justify-content-center"
                                type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="search-box-result mt-2">
                    <ul class="list-unstyled">
                        <li class="search-box-list"></li>
                    </ul>
                </div>
            </div>







            <div class="col-lg-2 col-md-1">
                <div class="mini_cart_box_wrapper text-right">
                    <a href="#">
                        <img src="{{ asset('frontend') }}/assets/img/icon/cart.png" alt="Mini Cart Icon">
                        <span class="cart_count">{{ $itemCount }}</span>
                    </a>
                    @unless (request()->routeIs('cart.page'))
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var query = $(this).val();

                if (query.length > 1) { // Trigger search if query has more than one character
                    $.ajax({
                        url: "{{ route('search') }}", // Your search route
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('.search-box-result ul').empty(); // Clear previous results

                            if (data.suggestions.length > 0) {
                                $('.search-box-result').show(); // Show the result box

                                data.suggestions.forEach(function(product) {
                                    $('.search-box-result ul').append(`
									<li class="search-box-list">
										<a href="${product.url}" class="search-result-item d-flex justify-content-between align-items-center">
											<div class="d-flex align-items-center gap-3">
												<img src="${product.thumbnail}" class="search-img-result" alt="${product.product_name}">
												<div>
													<p class="search-book-title">${product.product_name}</p>
												</div>
											</div>
											<div class="price-btn-container" style="display:flex; align-items:center;">
												<span class="search-book-price px-2">
													${product.discount_price
														? `<s class="text-danger">${product.regular_price} TK</s> <span class="text-success">${product.final_price} TK</span>`
														: `<span class="text-primary">${product.final_price} TK</span>`}
												</span>

												<!--<a href="${product.url}" class="btn-buy search-box-btn">Buy Now</a>-->
												</a>
												<button class="btn-buy-now btn-buy custom-search-button" data-id="${product.id}">Buy Now</button>

											</div>

									</li>
								`);
                                });
                            } else {
                                $('.search-box-result').hide(); // Hide if no results
                            }
                        }
                    });
                } else {
                    $('.search-box-result').hide(); // Hide search box when input is empty
                }
            });

            // Hide search results when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.category_search').length) {
                    $('.search-box-result').hide();
                }
            });
        });
    </script>
@endpush
