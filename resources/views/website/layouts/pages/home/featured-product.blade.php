<section class="featured-section">
    <div class="row">
        <div class="col-12">
            <div class="section_title">
                <h2>Featured Products</h2>
            </div>
        </div>
    </div>
    <!-- <h2>Featured Products</h2> -->
    <div class="slider-container" id="sliderContainer1">
        <button class="slider-arrow left" id="arrowLeft1">&#10094;</button>
        <div class="slider-track" id="sliderTrack1">

            @forelse ($featured_products as $featured_product)
                <div class="product-card">
                    <a href="{{ route('product_single.page', $featured_product->id) }}">
                        <img src="{{ asset($featured_product->thumbnail) }}" alt="product_thumbnail">
                    </a>
                    {{-- <div class="price">
                        <span>৳{{ $featured_product->regular_price }}</span>
                    </div> --}}

                    <div class="pro-price mb-2">
                        {{-- <span>BDT:{{ number_format($product->regular_price, 2) }}</span> --}}
                        @if ($featured_product->discount_price && $featured_product->discount_type === 'flat')
                            @php
                                $product_discount_price =
                                    $featured_product->regular_price - $featured_product->discount_price;
                            @endphp
                            <span class="price"> ৳{{ number_format($product_discount_price, 2) }}</span>
                            <span class="old-price"> ৳{{ number_format($featured_product->regular_price, 2) }}</span>
                        @elseif ($featured_product->discount_price && $featured_product->discount_type === 'percent')
                            @php
                                $discount_amount =
                                    ($featured_product->regular_price * $featured_product->discount_price) / 100;
                                $product_discount_price = $featured_product->regular_price - $discount_amount;
                            @endphp
                            <span> ৳{{ number_format($product_discount_price, 2) }}</span>
                            <span class="old-price"> ৳{{ number_format($featured_product->regular_price, 2) }}</span>
                        @else
                            <span> ৳{{ number_format($featured_product->regular_price, 2) }}</span>
                        @endif
                    </div>

                    <div class="card-title"><a
                            href="{{ route('product_single.page', $featured_product->id) }}">{{ $featured_product->product_name }}</a>
                    </div>

                    <div class="rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-regular fa-star"></i></span>
                    </div>
                    <form class="add-to-cart-form">
                    <div class="product-overlay-add-to-cart">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $featured_product->id }}">
                            <input type="hidden" name="order_qty" value="1">
                            <button type="submit" class="btn product-add-to-cart-btn buy-btn">Add To Cart
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </div>
                    </form>


                </div>
            @empty
                <p style="text-align: center">Featured Product Not Found!</p>
            @endforelse

        </div>
        <button class="slider-arrow right" id="arrowRight1">&#10095;</button>
    </div>
    <div class="pagination" id="pagination1"></div>
</section>
