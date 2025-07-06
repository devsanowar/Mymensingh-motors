@extends('website.layouts.app')
@section('title', 'Category products')
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
                            <li>{{ $category->category_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->

<section id="categorywiseProduct" class="ptb-80">
        <div class="container">
        <div class="tab-pane active show fade" id="hot_all" role="tabpanel">
            <div class="row">
                @forelse($category->products as $product)
                    <div class="col-lg-3 col-md-6">
                        <!-- Single Product Card starts -->
                        <div class="single-product-card">
                            <div class="produc_thumb">
                                <a href="{{ route('product_single.page', $product->id) }}">
                                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->product_name }}">
                                </a>
                            </div>
                            <div class="single-product-card_hover">
                                <div class="single-product-card__desc">
                                    <h3>
                                        <a href="{{ route('product_single.page', $product->id) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </h3>
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
                        <!-- Single Product Card ends -->
                    </div>
                @empty
                    <p>No products found.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection
