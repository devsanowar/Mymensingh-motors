<div class="col-lg-9 col-md-12 col-12 shop_details">
    <div class="row">
        @include('website.layouts.pages.shop.shop-bar-filtering')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content">
                <div class="tab-pane active show fade" id="grid_view" role="tabpanel">

                    <div class="shop_wrapper">
                        @include('website.layouts.pages.shop.partials.product_filter_by_price')
                    </div>
                </div>
                <div class="tab-pane fade" id="list_view" role="tabpanel">
                    <div class="row">

                        @forelse ($products as $product)
                            <div class="col-12 mb-40">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="single_Product_list">
                                            <div class="single__product">
                                                <span class="pro_badge">New</span>
                                                <div class="produc_thumb">
                                                    <a href="{{ route('product_single.page', $product->id) }}"><img
                                                            src="{{ asset($product->thumbnail) }}" alt=""></a>
                                                </div>
                                                <form class="add-to-cart-form">
                                                    <div class="product_hover">
                                                        {{-- <div class="product_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i>
                                                        Add
                                                        To Cart</a>
                                                </div> --}}
                                                        <div class="product_action">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="order_qty" value="1">
                                                            <button type="submit"
                                                                class="btn zmdi zmdi-shopping-cart-plus buy-btn">Add To
                                                                Cart
                                                                <span
                                                                    class="spinner-border spinner-border-sm d-none"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="product__desc">
                                            <h3><a
                                                    href="{{ route('product_single.page', $product->id) }}">{{ $product->product_name }}</a>
                                            </h3>
                                            <div class="product_rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            </div>
                                            <div class="price_amount">
                                                @if ($product->discount_price && $product->discount_type === 'flat')
                                                    @php
                                                        $product_discount_price =
                                                            $product->regular_price - $product->discount_price;
                                                    @endphp
                                                    <span
                                                        class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                                    <span
                                                        class="old_price">৳{{ number_format($product->regular_price, 2) }}</span>
                                                @elseif ($product->discount_price && $product->discount_type === 'percent')
                                                    @php
                                                        $discount_amount =
                                                            ($product->regular_price * $product->discount_price) / 100;
                                                        $product_discount_price =
                                                            $product->regular_price - $discount_amount;
                                                    @endphp
                                                    <span
                                                        class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                                    <span class="discount_price">-{{ $product->discount_price }}%</span>
                                                    <span
                                                        class="old_price">৳{{ number_format($product->regular_price, 2) }}</span>
                                                @else
                                                    <span
                                                        class="current_price">৳{{ number_format($product->regular_price, 2) }}</span>
                                                @endif
                                            </div>
                                            <p>{!! $product->short_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Product not found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($products->hasPages())
        <div class="row pagination_box mt-70">
            <div class="col-12">
                <div class="pagination">
                    <ul>
                        {{-- Previous --}}
                        @if ($products->onFirstPage())
                            <li class="disabled"><span><i class="zmdi zmdi-chevron-left"></i></span></li>
                        @else
                            <li><a href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage() - 1]) }}"><i
                                        class="zmdi zmdi-chevron-left"></i></a></li>
                        @endif

                        {{-- Pages --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['page' => $page]) }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($products->hasMorePages())
                            <li><a href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage() + 1]) }}"><i
                                        class="zmdi zmdi-chevron-right"></i></a></li>
                        @else
                            <li class="disabled"><span><i class="zmdi zmdi-chevron-right"></i></span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endif


</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // আইটেম পার পেজ সিলেক্টর চেঞ্জ ডিটেক্ট করুন
            $('#itemsPerPage').change(function() {
                var itemsPerPage = $(this).val();
                updateUrlParameter('per_page', itemsPerPage);
            });

            // URL প্যারামিটার আপডেট করার ফাংশন
            function updateUrlParameter(key, value) {
                var currentUrl = window.location.href;
                var url = new URL(currentUrl);
                var searchParams = new URLSearchParams(url.search);

                // বিদ্যমান প্যারামিটার আপডেট করুন বা নতুন যোগ করুন
                searchParams.set(key, value);

                // পেজ রিলোড করুন নতুন URL সহ
                window.location.href = url.pathname + '?' + searchParams.toString();
            }
        });
    </script>

    {{-- price filter script --}}
    <script>
        $(document).ready(function() {
            // Initialize price slider
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 5000,
                values: [0, 5000],
                slide: function(event, ui) {
                    $("#selected-price-range").val('Tk. ' + ui.values[0] + ' - Tk. ' + ui.values[1]);
                    $("#filter-min-price").val(ui.values[0]);
                    $("#filter-max-price").val(ui.values[1]);
                },
                change: function(event, ui) {
                    // When user stops sliding, filter is triggered
                    filterProducts(ui.values[0], ui.values[1]);
                },
                create: function(event, ui) {
                    const values = $(this).slider("values");
                    $("#selected-price-range").val('Tk. ' + values[0] + ' - Tk. ' + values[1]);
                    $("#filter-min-price").val(values[0]);
                    $("#filter-max-price").val(values[1]);
                }
            });

            // Filter function extracted for reuse
            function filterProducts(min_price, max_price) {
                // Step 1: Existing query params ধরো
                const url = new URL(window.location.href);
                const params = new URLSearchParams(url.search);

                // Step 2: নতুন min/max overwrite করো
                params.set('min_price', min_price);
                params.set('max_price', max_price);

                // Step 3: AJAX request path বানাও
                const ajaxUrl = "{{ route('shop_page') }}" + '?' + params.toString();

                console.log('AJAX URL:', ajaxUrl); // Debug!

                $.ajax({
                    url: ajaxUrl,
                    method: "GET",
                    success: function(response) {
                        $('.shop_wrapper').html(response);
                    },
                    error: function() {
                        toastr.error('Failed to filter products.', 'Error');
                    }
                });
            }

        });
    </script>
@endpush
