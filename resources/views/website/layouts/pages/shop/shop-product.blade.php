<div class="col-lg-9 col-md-12 col-12 shop_details">
    <div class="row">
        @include('website.layouts.pages.shop.shop-bar-filtering')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content">
                <div class="tab-pane active show fade" id="grid_view" role="tabpanel">
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product-card">
                                    <span class="sale-new_badge">New</span>
                                    <div class="produc_thumb">
                                        <a href="{{ route('product_single.page', $product->id) }}"><img
                                                src="{{ asset($product->thumbnail) }}" alt=""></a>
                                    </div>
                                    <div class="single-product-card_hover">
                                        <div class="single-product-card__desc">
                                            <h3><a
                                                    href="{{ route('product_single.page', $product->id) }}">{{ $product->product_name }}</a>
                                            </h3>
                                            <div class="single-product-card-price_amount">
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
                                            {{-- <div class="single-product-card-shop">
                                                <a href="#" title="Add To Cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                    Cart</a>
                                            </div> --}}
                                            <form class="add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="order_qty" value="1">
                                                <div class="single-product-card_action">
                                                    <button href="#" title="Add To Cart"
                                                        class="btn btn-sm buy-btn">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i> Add To Cart
                                                        <span class="spinner-border spinner-border-sm d-none"></span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Product not found.</p>
                        @endforelse

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
                                                    <span
                                                        class="discount_price">-{{ $product->discount_price }}%</span>
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
@endpush
