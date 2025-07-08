@php
    use App\Models\WebsiteSetting;
    $website_setting = WebsiteSetting::first();

    $carts = session()->get('cart', []);
    $itemCount = 0;

    foreach ($carts as $item) {
        $itemCount += $item['quantity'];
    }
@endphp
<header>
<div class="header_middle">
    <div class="container">
        <div class="row align-items-center mobile-inline-header">
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
                <div class="category_search search-container d-flex justify-content-center">
                    <div class="category_search_inner">
                        <div class="input-group search">
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

</header>

@push('scripts')





<script>
$(document).ready(function() {
    // Track if search input has focus
    let searchInputFocused = false;
    
    $('#searchInput').on('focus', function() {
        searchInputFocused = true;
    }).on('blur', function() {
        searchInputFocused = false;
    });

    // Search functionality - only trigger when typing in search input
    $('#searchInput').on('keyup', function(e) {
        // Don't trigger for arrow keys, enter, etc.
        if ([37, 38, 39, 40, 13].includes(e.keyCode)) return;
        
        var query = $(this).val();
        performSearch(query);
    });

    function performSearch(query) {
        if (query.length > 1) {
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    $('.search-box-result ul').empty();
                    
                    if (data.suggestions.length > 0) {
                        $('.search-box-result').show();
                        
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
                                            <form class="add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="${product.id}">
                                                <input type="hidden" name="order_qty" value="1">
                                                <div class="single-product-card_action">
                                                    <button type="submit" title="Add To Cart" class="btn btn-sm buy-btn">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i> Add To Cart
                                                        <span class="spinner-border spinner-border-sm d-none"></span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </li>
                            `);
                        });
                    } else {
                        $('.search-box-result').hide();
                    }
                }
            });
        } else {
            $('.search-box-result').hide();
        }
    }

    // Add to cart form submission
    $(document).on('submit', '.add-to-cart-form', function(e) {
        e.preventDefault();
        e.stopPropagation();

        let form = $(this);
        let formData = form.serialize();
        let button = form.find('.buy-btn');
        let spinner = button.find('.spinner-border');

        button.prop('disabled', true);
        spinner.removeClass('d-none');
        button.find('.btn-text').addClass('d-none');

        $.ajax({
            url: "{{ route('addToCart') }}",
            method: "POST",
            data: formData,
            success: function(response) {
                toastr.success(response.message, '', { 
                    timeOut: 1500,
                    positionClass: 'toast-bottom-right'
                });
                
                $('.cart_count').text(response.itemCount);
                $('#cart-count').text(response.itemCount);
                $('#mini-cart-container').html(response.mini_cart_html);
                
                if (response.subtotal) {
                    $('.cart-subtotal-amount').text('৳' + response.subtotal);
                }
                
                // Only keep search results visible if search input has focus
                if (searchInputFocused) {
                    $('.search-box-result').show();
                }
            },
            error: function(xhr) {
                let errorMessage = xhr.responseJSON?.message || 'Failed to add product.';
                toastr.error(errorMessage, '', { 
                    timeOut: 2000,
                    positionClass: 'toast-bottom-right'
                });
            },
            complete: function() {
                button.prop('disabled', false);
                spinner.addClass('d-none');
                button.find('.btn-text').removeClass('d-none');
            }
        });
    });

    // Hide search results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-container').length && 
            !$(e.target).closest('.search-box-result').length &&
            !$(e.target).closest('.toast').length) {
            $('.search-box-result').hide();
        }
    });

    // Remove from cart functionality
    $(document).on('click', '.remove-from-cart', function(e) {
        e.preventDefault();
        
        let itemId = $(this).data('item-id');
        let cartItem = $(this).closest('li');
        
        cartItem.css('opacity', '0.6');
        $(this).html('<i class="zmdi zmdi-spinner zmdi-hc-spin"></i>');

        $.ajax({
            url: "{{ route('removeFromCart') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                item_id: itemId
            },
            success: function(response) {
                toastr.success(response.message, '', { 
                    timeOut: 1500,
                    positionClass: 'toast-bottom-right'
                });
                
                $('.cart_count').text(response.itemCount);
                $('#cart-count').text(response.itemCount);
                $('#mini-cart-container').html(response.mini_cart_html);
                
                if (response.subtotal) {
                    $('.cart-subtotal-amount').text('৳' + response.subtotal);
                }
            },
            error: function(xhr) {
                toastr.error(
                    xhr.responseJSON?.message || 'Failed to remove item', 
                    '', { 
                        timeOut: 2000,
                        positionClass: 'toast-bottom-right'
                    }
                );
                cartItem.css('opacity', '1');
                $(this).html('<i class="zmdi zmdi-delete"></i>');
            }
        });
    });
});
</script>



@endpush




