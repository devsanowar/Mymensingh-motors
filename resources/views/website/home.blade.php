@extends('website.layouts.app')
@section('title', 'Home')
@section('website_content')
    <!-- slider-area-start -->
    <div class="slider_wrapper">
        @include('website.layouts.pages.home.slider')
    </div>
    <!-- slider-area-end -->

    <!--Banner area start-->
    <div class="banner_area pt-50">
        <div class="container">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="section_title">
                    <h2>Part's Available </h2>
                </div>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-2">
                        <div class="single_banner">
                            <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/bajaj.jpg" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single_banner">
                            <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/hero.jpg" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single_banner">
                            <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/honda.jpg" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single_banner">
                            <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/suzuki.jpg" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single_banner">
                            <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/tvs.jpg" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col_2">
                        <div class="single_banner">
                            <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/yamaha.jpg" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner_area_inner d-flex -->

    </div>
    <!--Banner area end-->
    <!-- Featured Product start -->
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
                <div class="product-card">
                    <img src="{{ asset('frontend') }}/assets/img/featured/1.png" alt="">
                    <div class="price">
                        <span>৳1,450</span>
                    </div>
                    <div class="card-title">Steelbird Full Face Helmet</div>
                    <div class="rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-regular fa-star"></i></span>
                    </div>
                    <div class="product-overlay-add-to-cart">
                        <a href="#" class="product-add-to-cart-btn">Add To Cart</a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('frontend') }}/assets/img/featured/2.png" alt="">
                    <div class="price">
                        <span>৳220</span>
                    </div>
                    <div class="card-title">NGK Spark Plug (C7HSA)</div>
                    <div class="rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-regular fa-star"></i></span>
                    </div>
                    <div class="product-overlay-add-to-cart">
                        <a href="#" class="product-add-to-cart-btn">Add To Cart</a>
                    </div>
                </div>
                <div class="product-card"><img src="{{ asset('frontend') }}/assets/img/featured/3.png" alt="">
                    <div class="price">
                        <span>৳990</span>
                    </div>
                    <div class="card-title">Motul 7100 4T 10W40 (1L)</div>
                    <div class="rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-regular fa-star"></i></span>
                    </div>
                    <div class="product-overlay-add-to-cart">
                        <a href="#" class="product-add-to-cart-btn">Add To Cart</a>
                    </div>
                </div>
                <div class="product-card"><img src="{{ asset('frontend') }}/assets/img/featured/4.jpg" alt="">
                    <div class="price">
                        <span>৳390</span>
                    </div>
                    <div class="card-title">Anti Theft Disc Brake Lock</div>
                    <div class="rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-regular fa-star"></i></span>
                    </div>
                    <div class="product-overlay-add-to-cart">
                        <a href="#" class="product-add-to-cart-btn">Add To Cart</a>
                    </div>
                </div>
                <div class="product-card"><img src="{{ asset('frontend') }}/assets/img/featured/5.png" alt="">
                    <div class="price">
                        <span>৳520</span>
                    </div>
                    <div class="card-title">Bike Mobile Holder with Charger</div>
                    <div class="rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-regular fa-star"></i></span>
                    </div>
                    <div class="product-overlay-add-to-cart">
                        <a href="#" class="product-add-to-cart-btn">Add To Cart</a>
                    </div>
                </div>
            </div>
            <button class="slider-arrow right" id="arrowRight1">&#10095;</button>
        </div>
        <div class="pagination" id="pagination1"></div>
    </section>
    <!-- Featured Product end -->

    <!--Hot Deal product start-->
    <div class="hot_details_product pt-110 pb-107">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="section_title">
                        <h2>Hot Deals</h2>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="nav product_tab_menu justify-content-end" role="tablist">
                        <a class="active" href="#hot_all" data-toggle="tab" role="tab" aria-selected="true"
                            aria-controls="hot_all">All</a>
                        <a href="#hot_bike" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="hot_bike">Bike</a>
                        <a href="#hot_tiar" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="hot_tiar">Tiar</a>
                        <a href="#hot_parts" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="hot_parts">Parts</a>
                        <a href="#hot_wheel" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="hot_wheel">Wheel</a>
                        <a href="#hot_light" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="hot_light">Light</a>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-lg-9 col-md-12 ">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="hot_all" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/3.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9 </a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/4.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/4.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/6.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-6">
                                            <div class="single__product">
                                                <div class="produc_thumb">
                                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/2.png"
                                                            alt=""></a>
                                                </div>
                                                <div class="product_hover">
                                                    <div class="product_action">
                                                        <a href="#" title="Add To Cart"><i
                                                                class="zmdi zmdi-shopping-cart-plus"></i> Add To Cart</a>
                                                    </div>
                                                    <div class="product__desc">
                                                        <h3><a href="product-details.html">Alloy Shimano z3</a></h3>
                                                        <div class="price_amount">
                                                            <span class="current_price">৳2999.99</span>
                                                            <span class="discount_price">-10%</span>
                                                            <span class="old_price">৳3700.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                            </div>
                        </div>
                        <!-- second tab content -->
                        <div class="tab-pane fade" id="hot_bike" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- third tab content -->
                        <div class="tab-pane fade" id="hot_tiar" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/6.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fourth tab content -->
                        <div class="tab-pane fade" id="hot_parts" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-6">
                                            <div class="single__product">
                                                <div class="produc_thumb">
                                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/6.png"
                                                            alt=""></a>
                                                </div>
                                                <div class="product_hover">
                                                    <div class="product_action">
                                                        <a href="#" title="Add To Cart"><i
                                                                class="zmdi zmdi-shopping-cart-plus"></i> Add To Cart</a>
                                                    </div>
                                                    <div class="product__desc">
                                                        <h3><a href="product-details.html">Soffer Pro x33</a></h3>
                                                        <div class="price_amount">
                                                            <span class="current_price">৳2999.99</span>
                                                            <span class="discount_price">-10%</span>
                                                            <span class="old_price">৳3700.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                            </div>
                        </div>
                        <!-- Five tab content -->
                        <div class="tab-pane fade" id="hot_wheel" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/6.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- six tab content -->
                        <div class="tab-pane fade" id="hot_light" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/5.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="single_banner long_hot_detals d-lg-none">
                        <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/banner_tab_1.jpg" alt="Shop Banner"></a>
                    </div>
                    <div class="single_banner long_hot_detals d-none d-lg-block">
                        <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/bike-longg.jpg" height="744px"
                                alt="Shop Banner"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hot Deal product end-->

    <!-- Categories Product start -->
    <div class="product-categories">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-4 col-md-3 col-12">
                    <div class="section_title">
                        <h2>Product Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single category -->
                <div class="col-md-2">
                    <div class="single-categories">
                        <img src="{{ asset('frontend') }}/assets/img/categories/part-1.jpg" class="img-fluid" alt="category image">
                        <h4 class="product-category-title"><a href="#">Motorcycle Tyre</a></h4>
                    </div>
                </div>
                <!-- single category -->
                <div class="col-md-2">
                    <div class="single-categories">
                        <img src="{{ asset('frontend') }}/assets/img/categories/helmet-6.jpg" class="img-fluid" alt="category image">
                        <h4 class="product-category-title"><a href="#">Racing Helmet</a></h4>
                    </div>
                </div>
                <!-- single category -->
                <div class="col-md-2">
                    <div class="single-categories">
                        <img src="{{ asset('frontend') }}/assets/img/categories/car-brake.avif" class="img-fluid" alt="category image">
                        <h4 class="product-category-title"><a href="#">Disc Brakes</a></h4>
                    </div>
                </div>
                <!-- single category -->
                <div class="col-md-2">
                    <div class="single-categories">
                        <img src="{{ asset('frontend') }}/assets/img/categories/-mirror-vector.jpg" class="img-fluid" alt="category image">
                        <h4 class="product-category-title"><a href="#">Side Mirrors</a></h4>
                    </div>
                </div>
                <!-- single category -->
                <div class="col-md-2">
                    <div class="single-categories">
                        <img src="{{ asset('frontend') }}/assets/img/categories/chain-bicycle .avif" class="img-fluid" alt="category image">
                        <h4 class="product-category-title"><a href="#">Bike Chain</a></h4>
                    </div>
                </div>
                <!-- single category -->
                <div class="col-md-2">
                    <div class="single-categories">
                        <img src="{{ asset('frontend') }}/assets/img/categories/led-headlights.avif" class="img-fluid" alt="category image">
                        <h4 class="product-category-title"><a href="#">LED Headlight</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Product end -->

    <!--Hot Deal product start-->
    <div class="hot_details_product pb-110">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="section_title">
                        <h2>Best Product </h2>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="nav product_tab_menu justify-content-end" role="tablist">
                        <a class="active" href="#best_all" data-toggle="tab" role="tab" aria-selected="true"
                            aria-controls="best_all">All</a>
                        <a href="#best_bike" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="best_bike">Bike</a>
                        <a href="#best_tiar" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="best_tiar">Tiar</a>
                        <a href="#best_parts" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="best_parts">Parts</a>
                        <a href="#best_wheel" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="best_wheel">Wheel</a>
                        <a href="#best_light" data-toggle="tab" role="tab" aria-selected="false"
                            aria-controls="best_light">Light</a>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-lg-9 col-md-12 ">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="best_all" role="tabpanel">
                            <div class="row carousel_product owl-carousel">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="best_bike" role="tabpanel">
                            <div class="row carousel_product owl-carousel">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="best_tiar" role="tabpanel">
                            <div class="row carousel_product owl-carousel">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="best_parts" role="tabpanel">
                            <div class="row ">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="best_wheel" role="tabpanel">
                            <div class="row carousel_product owl-carousel">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/1.jpeg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="best_light" role="tabpanel">
                            <div class="row carousel_product owl-carousel">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-card">
                                        <div class="produc_thumb">
                                            <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/hot/2.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-product-card_hover">
                                            <div class="single-product-card__desc">
                                                <h3><a href="product-details.html">Gasoline Scooter A9</a></h3>
                                                <div class="single-product-card-price_amount">
                                                    <span class="current_price">৳2999.99</span>
                                                    <span class="discount_price">-10%</span>
                                                    <span class="old_price">৳3700.00</span>
                                                </div>
                                                <div class="single-product-card_action">
                                                    <a href="#" title="Add To Cart"><i
                                                            class="zmdi zmdi-shopping-cart-plus"></i> Add To
                                                        Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-12 hot_righr_sidebar">
                    <div class="single_banner long_hot_detals d-lg-none">
                        <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/banner_tab_2.png" alt="Shop Banner"></a>
                    </div>
                    <div class="single_banner  d-lg-block d-none">
                        <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/5.jpg" alt="Shop Banner"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hot Deal product end-->


    <!--Banner product section-->
    <div class="banner_product_section pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_banner banner_length">
                                <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/6.jpg" alt="Shop Banner"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_banner banner_length">
                                <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/7.jpg" alt="Shop Banner"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="best_seller_product_carousel owl-carousel">
                        <div class="best_selling_single">
                            <div class="single__product_sm mb-30">
                                <div class="produc_thumb">
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_1.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_2.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_3.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_1.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_2.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_3.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_1.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_2.png"
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
                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/pro_sm_3.png"
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
    <!--Banner product section end-->


    <!--Full Width  banner start-->
    <div class="full_width_banner pb-110">
        <div class="single_banner">
            <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/8.jpg" alt="Shop Banner"></a>
        </div>
    </div>
    <!--Full Width Banner end-->

    <!--Latest Post start-->
    <div class="latest_post pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-lg-4 col-md-6">
                    <div class="single_blog_post mb-40">
                        <div class="post_thumbnail">
                            <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/1.jpg" alt=""></a>
                        </div>
                        <div class="post_content_meta">
                            <div class="post_meta">
                                <ul>
                                    <li>Posted March 20.</li>
                                    <li>400+ View </li>
                                    <li><a href="#"> 20+ Like</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_desc">
                                <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro dream</a>
                                </h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
                            </div>
                            <div class="read_more_btn">
                                <a href="blog-details.html">Read More <span><i
                                            class="zmdi zmdi-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_blog_post mb-40">
                        <div class="post_thumbnail">
                            <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/2.jpg" alt=""></a>
                        </div>
                        <div class="post_content_meta">
                            <div class="post_meta">
                                <ul>
                                    <li>Posted March 20.</li>
                                    <li>400+ View </li>
                                    <li><a href="#"> 20+ Like</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_desc">
                                <h2><a href="blog-details.html">Sed ut perspiciatis unde omnis iste natus sit</a>
                                </h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
                            </div>
                            <div class="read_more_btn">
                                <a href="blog-details.html">Read More <span><i
                                            class="zmdi zmdi-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_blog_post mb-40">
                        <div class="post_thumbnail">
                            <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/3.jpg" alt=""></a>
                        </div>
                        <div class="post_content_meta">
                            <div class="post_meta">
                                <ul>
                                    <li>Posted March 20.</li>
                                    <li>400+ View </li>
                                    <li><a href="#"> 20+ Like</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_desc">
                                <h2><a href="blog-details.html">Quis autem vel eum tempore voluptate</a></h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
                            </div>
                            <div class="read_more_btn">
                                <a href="blog-details.html">Read More <span><i
                                            class="zmdi zmdi-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Latest Post end-->

    <!--Newsletter section start -->
    <div class="newsletter_section ptb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="newsletter_text">
                        <h2>Get All Updates</h2>
                        <p>Sign up our newsleter today. Also get allert for new product.</p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="newsletter_form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Newsletter section end -->
@endsection
