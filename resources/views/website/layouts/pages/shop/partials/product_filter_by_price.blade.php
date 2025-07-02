<div class="row">
    @forelse ($products as $product)
        <div class="col-lg-4 col-md-6">
            <div class="single-product-card">
                {{-- <span class="sale-new_badge">New</span> --}}
                <div class="produc_thumb">
                    <a href="{{ route('product_single.page', $product->id) }}"><img src="{{ asset($product->thumbnail) }}"
                            alt=""></a>
                </div>
                <div class="single-product-card_hover">
                    <div class="single-product-card__desc">
                        <h3><a href="{{ route('product_single.page', $product->id) }}">{{ $product->product_name }}</a>
                        </h3>
                        <div class="single-product-card-price_amount">
                            @if ($product->discount_price && $product->discount_type === 'flat')
                                @php
                                    $product_discount_price = $product->regular_price - $product->discount_price;
                                @endphp
                                <span class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                <span class="old_price">৳{{ number_format($product->regular_price, 2) }}</span>
                            @elseif ($product->discount_price && $product->discount_type === 'percent')
                                @php
                                    $discount_amount = ($product->regular_price * $product->discount_price) / 100;
                                    $product_discount_price = $product->regular_price - $discount_amount;
                                @endphp
                                <span class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                <span class="discount_price">-{{ $product->discount_price }}%</span>
                                <span class="old_price">৳{{ number_format($product->regular_price, 2) }}</span>
                            @else
                                <span class="current_price">৳{{ number_format($product->regular_price, 2) }}</span>
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
                                <button href="#" title="Add To Cart" class="btn btn-sm buy-btn">
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
