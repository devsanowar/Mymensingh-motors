<div class="banner_product_section pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    @forelse ($promobanners as $promobanner)
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_banner banner_length">
                                <a href="{{ $promobanner->url }}"><img src="{{ asset($promobanner->image) }}"
                                        alt="Shop Banner"></a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Promo banner not found!</p>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12">
                <div class="best_seller_product_carousel owl-carousel">
                    <div class="best_selling_single">
                        @forelse ($bestSellings as $bestSelling)
                            <div class="single__product_sm mb-30">
                                <div class="produc_thumb">
                                    <a href="product-details.html"><img src="{{ asset($bestSelling->thumbnail) }}"
                                            alt=""></a>
                                </div>
                                <div class="product__desc">
                                    <h3><a href="product-details.html">{{ $bestSelling->product_name }}</a></h3>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="price_amount">
                                        @if ($bestSelling->discount_price && $bestSelling->discount_type === 'flat')
                                            @php
                                                $product_discount_price =
                                                    $bestSelling->regular_price - $bestSelling->discount_price;
                                            @endphp
                                            <span
                                                class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                            <span
                                                class="old_price">৳{{ number_format($bestSelling->regular_price, 2) }}</span>
                                        @elseif ($bestSelling->discount_price && $bestSelling->discount_type === 'percent')
                                            @php
                                                $discount_amount =
                                                    ($bestSelling->regular_price * $bestSelling->discount_price) / 100;
                                                $product_discount_price = $bestSelling->regular_price - $discount_amount;
                                            @endphp
                                            <span
                                                class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                            <span class="discount_price">-{{ $bestSelling->discount_price }}%</span>
                                            <span
                                                class="old_price">৳{{ number_format($bestSelling->regular_price, 2) }}</span>
                                        @else
                                            <span
                                                class="current_price">৳{{ number_format($bestSelling->regular_price, 2) }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        @empty

                            <p>Best selling product not found!</p>
                        @endforelse

                    </div>
                    <div class="best_selling_single">
                        <div class="single__product_sm mb-30">
                            <div class="produc_thumb">
                                <a href="product-details.html"><img
                                        src="{{ asset('frontend') }}/assets/img/product/pro_sm_1.png"
                                        alt=""></a>
                            </div>
                            <div class="product__desc">
                                <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="price_amount">
                                    <span class="current_price">৳2999.99</span>
                                    <span class="discount_price">-10%</span>
                                    <span class="old_price">৳3700.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="single__product_sm mb-30">
                            <div class="produc_thumb">
                                <a href="product-details.html"><img
                                        src="{{ asset('frontend') }}/assets/img/product/pro_sm_2.png"
                                        alt=""></a>
                            </div>
                            <div class="product__desc">
                                <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="price_amount">
                                    <span class="current_price">৳2999.99</span>
                                    <span class="discount_price">-10%</span>
                                    <span class="old_price">৳3700.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="single__product_sm">
                            <div class="produc_thumb">
                                <a href="product-details.html"><img
                                        src="{{ asset('frontend') }}/assets/img/product/pro_sm_3.png"
                                        alt=""></a>
                            </div>
                            <div class="product__desc">
                                <h3><a href="#">Lotafaj una khdii</a></h3>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price_amount">
                                    <span class="current_price">৳2999.99</span>
                                    <span class="discount_price">-10%</span>
                                    <span class="old_price">৳3700.00</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="best_selling_single">
                        <div class="single__product_sm mb-30">
                            <div class="produc_thumb">
                                <a href="product-details.html"><img
                                        src="{{ asset('frontend') }}/assets/img/product/pro_sm_1.png"
                                        alt=""></a>
                            </div>
                            <div class="product__desc">
                                <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="price_amount">
                                    <span class="current_price">৳2999.99</span>
                                    <span class="discount_price">-10%</span>
                                    <span class="old_price">৳3700.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="single__product_sm mb-30">
                            <div class="produc_thumb">
                                <a href="product-details.html"><img
                                        src="{{ asset('frontend') }}/assets/img/product/pro_sm_2.png"
                                        alt=""></a>
                            </div>
                            <div class="product__desc">
                                <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="price_amount">
                                    <span class="current_price">৳2999.99</span>
                                    <span class="discount_price">-10%</span>
                                    <span class="old_price">৳3700.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="single__product_sm">
                            <div class="produc_thumb">
                                <a href="product-details.html"><img
                                        src="{{ asset('frontend') }}/assets/img/product/pro_sm_3.png"
                                        alt=""></a>
                            </div>
                            <div class="product__desc">
                                <h3><a href="#">Lotafaj una khdii</a></h3>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price_amount">
                                    <span class="current_price">৳2999.99</span>
                                    <span class="discount_price">-10%</span>
                                    <span class="old_price">৳3700.00</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
