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
                                            <div class="single-product-card-shop">
                                                <a href="#" title="Add To Cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                    Cart</a>
                                            </div>
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
                        <div class="col-12 mb-40">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single_Product_list">
                                        <div class="single__product">
                                            <span class="pro_badge">Sale</span>
                                            <div class="produc_thumb">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('frontend') }}/assets/img/product/1.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="product_hover">
                                                <div class="product_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i>
                                                        Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product__desc">
                                        <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                        <div class="product_rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        </div>
                                        <div class="price_amount">
                                            <span class="current_price">$2999.99</span>
                                            <span class="discount_price">-08%</span>
                                            <span class="old_price">$3700.00</span>
                                        </div>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Est sit cum quaerat accusantium sint fugit
                                            perspiciatis fugiat cupiditate quia officiis obcaecati
                                            nesciunt molestias culpa, temporibus natus similique.
                                            Accusantium, asperiores quia blanditiis nemo repellat ab
                                            quod similique animi deserunt! Atque, nobis. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-40">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="single_Product_list">
                                        <div class="single__product">
                                            <div class="produc_thumb">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('frontend') }}/assets/img/product/3.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="product_hover">
                                                <div class="product_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i>
                                                        Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product__desc">
                                        <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                        <div class="product_rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        </div>
                                        <div class="price_amount">
                                            <span class="current_price">$2999.99</span>
                                        </div>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Est sit cum quaerat accusantium sint fugit
                                            perspiciatis fugiat cupiditate quia officiis obcaecati
                                            nesciunt molestias culpa, temporibus natus similique.
                                            Accusantium, asperiores quia blanditiis nemo repellat ab
                                            quod similique animi deserunt! Atque, nobis. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-40">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single_Product_list">
                                        <div class="single__product">
                                            <span class="pro_badge">New</span>
                                            <div class="produc_thumb">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('frontend') }}/assets/img/product/5.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="product_hover">
                                                <div class="product_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i>
                                                        Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product__desc">
                                        <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                        <div class="product_rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        </div>
                                        <div class="price_amount">
                                            <span class="current_price">$2999.99</span>
                                        </div>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Est sit cum quaerat accusantium sint fugit
                                            perspiciatis fugiat cupiditate quia officiis obcaecati
                                            nesciunt molestias culpa, temporibus natus similique.
                                            Accusantium, asperiores quia blanditiis nemo repellat ab
                                            quod similique animi deserunt! Atque, nobis. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single_Product_list">
                                        <div class="single__product">
                                            <span class="pro_badge">Sale</span>
                                            <div class="produc_thumb">
                                                <a href="#"><img
                                                        src="{{ asset('frontend') }}/assets/img/product/home2/4.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="product_hover">
                                                <div class="product_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i>
                                                        Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product__desc">
                                        <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                        <div class="product_rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        </div>
                                        <div class="price_amount">
                                            <span class="current_price">$2999.99</span>
                                            <span class="discount_price">-08%</span>
                                            <span class="old_price">$3700.00</span>
                                        </div>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Est sit cum quaerat accusantium sint fugit
                                            perspiciatis fugiat cupiditate quia officiis obcaecati
                                            nesciunt molestias culpa, temporibus natus similique.
                                            Accusantium, asperiores quia blanditiis nemo repellat ab
                                            quod similique animi deserunt! Atque, nobis. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pagination_box mt-70">
        <div class="col-12">
            <div class="pagination">
                <ul>
                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i> prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="active">4</li>
                    <li>..</li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">next<i class="zmdi zmdi-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
