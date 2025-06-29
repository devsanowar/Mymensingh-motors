@extends('website.layouts.app')
@section('title', 'Home')
@section('website_content')
    <!-- slider-area-start -->
    <div class="slider_wrapper">
        @include('website.layouts.pages.home.slider')
    </div>
    <!-- slider-area-end -->


     <!-- Categories Product start -->
    <div class="product-categories">
        @include('website.layouts.pages.home.category')
    </div>
    <!-- Categories Product end -->


    <!--Available parts area start-->
    <div class="banner_area pt-50">
        
        @include('website.layouts.pages.home.brand')

    </div>
    <!--Available parts area end-->


    <!-- Featured Product start -->
    @include('website.layouts.pages.home.featured-product')
    <!-- Featured Product end -->

    <!--Latest product start-->
    <div class="hot_details_product pt-80 pb-80">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="section_title">
                        <h2>Products</h2>
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
                        <a href="#"><img src="{{ asset('frontend') }}/assets/img/bike/bike-longg.jpg" height="680px"
                                alt="Shop Banner"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Latest product end-->

   


    <!--Banner product section-->
    @include('website.layouts.pages.home.promobanner-product')
    <!--Banner product section end-->


    <!--Full Width  banner cta start-->
    @include('website.layouts.pages.home.cta')
    <!--Full Width Banner cta end-->

    <!--Latest Post start-->
   @include('website.layouts.pages.home.blog')
    <!--Latest Post end-->

    
@endsection
