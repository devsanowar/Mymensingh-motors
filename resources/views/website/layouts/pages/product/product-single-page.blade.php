@extends('website.layouts.app')
@section('title', 'Product Single Page')
@section('website_content')
    <!--Breadcrumb section-->
    <div class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>{{ $product->product_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->

    <!--product Details Inner-->
    <div class="product_details_inner left_sidebar ptb-70">
        <div class="container">
            <div class="row">
                <!--Product Tab Style start-->
                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-img-content">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="{{ asset($product->thumbnail) }}"
                                        data-zoom-image="{{ asset($product->thumbnail) }}" alt="big-1">
                                </a>
                            </div>
                            <div class="single-zoom-thumb mt-20">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    @foreach (is_array($product->images) ? $product->images : json_decode($product->images, true) as $image)
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update=""
                                                data-image="{{ asset($image) }}" data-zoom-image="{{ asset($image) }}">
                                                <img src="{{ asset($image) }}" alt="zo-th-1" />
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>



                <!--Product Tab Style End-->
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-content">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="rating-number">
                            <div class="product_rating">
                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                            </div>
                            <div class="review_count">
                                <span>2 Ratting (S)</span>
                            </div>
                        </div>
                        <div class="price_amount">
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
                        <p>{!! $product->short_description !!}</p>
                        {{-- <div class="product_variant_select">
                            <div class="select-option-part">
                                <label>Size*</label>
                                <select class="nice-select">
                                    <option value="">- Please Select -</option>
                                    <option value="">xl</option>
                                    <option value="">ml</option>
                                    <option value="">m</option>
                                    <option value="">sl</option>
                                </select>
                            </div>
                            <div class="select-option-part">
                                <label>Color*</label>
                                <select class="nice-select">
                                    <option value="">- Please Select -</option>
                                    <option value="">orange</option>
                                    <option value="">pink</option>
                                    <option value="">yellow</option>
                                </select>
                            </div>
                        </div> --}}


                        <form class="add-to-cart-form mt-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="single_product_action d-flex align-items-center">
                                <div class="cart-plus-minus">
                                    <input type="text" value="1" name="order_qty" class="cart-plus-minus-box">
                                </div>
                                <div class="add_to_cart_btn">
                                    <a href="#" class="btn-add-to-cart-link">add to cart</a>
                                </div>
                            </div>
                        </form>

                        {{-- <div class="single_product_action d-flex align-items-center">
                                <div class="cart-plus-minus">
                                    <input type="text" value="02" name="order_qty" class="cart-plus-minus-box">
                                </div>
                                <div class="add_to_cart_btn">
                                    <a href="#">add to cart</a>
                                </div>
                                <div class="wishlist">
                                    <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                </div>
                            </div> --}}


                        {{-- <div class="wishlist">
                            <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                        </div> --}}
                    </div>




                    <div class="product_details_cat_list mt-35">
                        <div class="categories_label">
                            <span>Categories: </span>
                        </div>
                        <ul>
                            <li><a href="#">{{ $product->category->category_name }}</a></li>

                        </ul>
                    </div>
                    {{-- <div class="product_details_tag_list mtb-10">
                            <div class="tag_label">
                                <span>Tags : </span>
                            </div>
                            <ul>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">electronics</a></li>
                                <li><a href="#">toys</a></li>
                                <li><a href="#">food</a></li>
                                <li><a href="#">jewellery</a></li>
                            </ul>
                        </div> --}}
                    <div class="product-share">
                        <div class="share_label">
                            <span>Share :</span>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Product Thumbnail Description Start -->
            <div class="product_desc_tab_container mt-100 ">

                <div class="thumb-desc-inner">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="product_desc_tab nav" role="tablist">
                                <li><a class="active" data-toggle="tab" href="#dtail">Description</a></li>
                                <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                            </ul>
                            <!-- Product Thumbnail Tab Content Start -->
                            <div class="tab-content thumb-content mt-30">
                                <div id="dtail" class="tab-pane fade show active">
                                    <p>{!! $product->long_description !!}</p>
                                </div>
                                <div id="review" class="tab-pane fade">
                                    <!-- Reviews Start -->
                                    <div class="review">
                                        <div class="group-title">
                                            <h2>customer review</h2>
                                        </div>
                                        <ul class="review-list">
                                            <!-- Single Review List Start -->

                                            <!-- Single Review List Start -->
                                            <li>
                                                <span>value</span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <label>Posted on 12/20/18</label>
                                            </li>
                                            <!-- Single Review List End -->
                                        </ul>
                                    </div>
                                    <!-- Reviews End -->
                                    <!-- Reviews Start -->
                                    <div class="review mt-20">
                                        <h2 class="review-title mb-15">You're reviewing: <br><span>Faded Short
                                                Sleeves T-shirt</span></h2>
                                        <p class="review-mini-title">your rating</p>
                                        <ul class="review-list">
                                            <!-- Single Review List Start -->
                                            <li>
                                                <span>Quality</span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                            <!-- Single Review List End -->
                                            <!-- Single Review List Start -->
                                            <li>
                                                <span>price</span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                            <!-- Single Review List End -->
                                            <!-- Single Review List Start -->
                                            <li>
                                                <span>value</span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                            <!-- Single Review List End -->
                                        </ul>
                                        <!-- Reviews Field Start -->
                                        <div class="riview-field mt-40">
                                            <div class="review_comment_box_inner">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label class="req" for="sure-name">Name</label>
                                                        <input type="text" id="sure-name" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="req" for="subject">Title of review</label>
                                                        <input type="text" id="subject" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="req" for="comments">Your Review</label>
                                                        <textarea rows="5" id="comments" required="required"></textarea>
                                                    </div>
                                                    <button type="submit" class="customer-btn">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Reviews Field Start -->
                                    </div>
                                    <!-- Reviews End -->
                                </div>
                            </div>
                            <!-- Product Thumbnail Tab Content End -->
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!--Realted Product section start-->
            <section class="featured-section">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>
                <!-- <h2>Related Products</h2> -->
                <div class="slider-container" id="sliderContainer1">
                    <button class="slider-arrow left" id="arrowLeft1">&#10094;</button>
                    <div class="slider-track" id="sliderTrack1">

                        @forelse ($relatedProducts as $product)
                            <div class="product-card"><img src="{{ asset($product->thumbnail) }}" alt="">
                                <div class="single-product-card-price_amount">
                                    @if ($product->discount_price && $product->discount_type === 'flat')
                                        @php
                                            $product_discount_price =
                                                $product->regular_price - $product->discount_price;
                                        @endphp
                                        <span
                                            class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                        <span class="old_price">৳{{ number_format($product->regular_price, 2) }}</span>
                                    @elseif ($product->discount_price && $product->discount_type === 'percent')
                                        @php
                                            $discount_amount =
                                                ($product->regular_price * $product->discount_price) / 100;
                                            $product_discount_price = $product->regular_price - $discount_amount;
                                        @endphp
                                        <span
                                            class="current_price">৳{{ number_format($product_discount_price, 2) }}</span>
                                        <span class="discount_price">-{{ $product->discount_price }}%</span>
                                        <span class="old_price">৳{{ number_format($product->regular_price, 2) }}</span>
                                    @else
                                        <span
                                            class="current_price">৳{{ number_format($product->regular_price, 2) }}</span>
                                    @endif
                                </div>
                                <div class="card-title">{{ $product->product_name }}</div>
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
                        @empty
                        @endforelse

                    </div>
                    <button class="slider-arrow right" id="arrowRight1">&#10095;</button>
                </div>
                <div class="pagination" id="pagination1"></div>
            </section>
            <!--Realted Product section end-->
        </div>
    </div>
    </div>
    <!--product Details End-->
@endsection

@push('scripts')

    {{-- <script src="{{ asset('frontend') }}/assets/js/cart.js"></script> --}}

    
    <script>
        $(document).ready(function() {
            var owl = $("#gallery_01");
            owl.owlCarousel({
                items: 4,
                margin: 10,
                loop: false,
                nav: false, // built-in nav বন্ধ রাখো
                dots: false
            });

            // Custom Prev
            $(".custom-owl-prev").click(function() {
                owl.trigger('prev.owl.carousel');
            });

            // Custom Next
            $(".custom-owl-next").click(function() {
                owl.trigger('next.owl.carousel');
            });
        });
    </script>


<script>
    // Global flag to check if toastr is initialized
    if (typeof toastrInitialized === 'undefined') {
        var toastrInitialized = true;
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "preventDuplicates": true, // এই লাইনটি ডুপ্লিকেট মেসেজ প্রতিরোধ করবে
            "newestOnTop": true
        };
    }

    $(document).ready(function() {
        // Quantity increment/decrement
        $(document).on('click', '.plus', function() {
            let input = $(this).closest('form').find('.cart-plus-minus-box');
            input.val((i, val) => Math.max(1, (parseInt(val) || 1) + 1));
        });

        $(document).on('click', '.minus', function() {
            let input = $(this).closest('form').find('.cart-plus-minus-box');
            input.val((i, val) => Math.max(1, (parseInt(val) || 1) - 1));
        });

        $(document).on('click', '.btn-add-to-cart-link', function(e) {
            e.preventDefault();
            $(this).closest('form').submit();
        });

        // Add to cart with single event binding
        var cartFormSubmitted = false;
        $(document).off('submit.addToCart').on('submit.addToCart', '.add-to-cart-form', function(e) {
            e.preventDefault();
            
            if (cartFormSubmitted) return;
            cartFormSubmitted = true;
            
            let form = $(this);
            let button = form.find('.buy-btn');
            
            button.prop('disabled', true)
                 .find('.spinner-border').removeClass('d-none')
                 .siblings('.btn-text').addClass('d-none');

            $.ajax({
                url: "{{ route('addToCart') }}",
                method: "POST",
                data: form.serialize(),
                success: function(response) {
                    toastr.success(response.message);
                    updateCartUI(response);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message || 'Failed to add product.');
                },
                complete: function() {
                    button.prop('disabled', false)
                         .find('.spinner-border').addClass('d-none')
                         .siblings('.btn-text').removeClass('d-none');
                    cartFormSubmitted = false;
                }
            });
        });

        
    });
</script>
@endpush
