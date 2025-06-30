    <div class="hot_details_product pt-80 pb-80">
        <!-- container starts -->
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="section_title">
                        <h2>Products</h2>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="nav product_tab_menu justify-content-end" role="tablist">
                        <!-- All tab -->
                        <a class="active" href="#hot_all" data-toggle="tab" role="tab" aria-selected="true"
                            aria-controls="hot_all">All</a>
                        <!-- Dynamic category tabs -->
                        @foreach ($categoriesWiseProducts as $category)
                            <a href="#hot_{{ $category->id }}" data-toggle="tab" role="tab" aria-selected="false"
                                aria-controls="hot_{{ $category->id }}">
                                {{ $category->category_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mt-60">
                <div class="col-lg-12">
                    <div class="tab-content">

                        <!-- All Tab Content -->
                        <div class="tab-pane active show fade" id="hot_all" role="tabpanel">
                            <div class="row">
                                @forelse($allProducts as $product)
                                    <div class="col-lg-4 col-md-6">
                                        <!-- Single Product Card starts -->
                                        <div class="single-product-card">
                                            <div class="produc_thumb">
                                                <a href="{{ route('product_single.page', $product->id) }}">
                                                    <img src="{{ asset('storage/products/' . $product->image) }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                            <div class="single-product-card_hover">
                                                <div class="single-product-card__desc">
                                                    <h3>
                                                        <a href="{{ route('product_single.page', $product->id) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h3>
                                                    <div class="single-product-card-price_amount">
                                                        <span
                                                            class="current_price">৳{{ number_format($product->price, 2) }}</span>
                                                        @if ($product->discount)
                                                            <span
                                                                class="discount_price">-{{ $product->discount }}%</span>
                                                            <span
                                                                class="old_price">৳{{ number_format($product->old_price, 2) }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="single-product-card_action">
                                                        <a href="#" title="Add To Cart">
                                                            <i class="zmdi zmdi-shopping-cart-plus"></i> Add To Cart
                                                        </a>
                                                    </div>
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

                        <!-- Category Tabs Content -->
                        @foreach ($categoriesWiseProducts as $category)
                            <div class="tab-pane fade" id="hot_{{ $category->id }}" role="tabpanel">
                                <div class="row">
                                    @forelse($category->products as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <!-- Single Product Card starts -->
                                            <div class="single-product-card">
                                                <div class="produc_thumb">
                                                    <a href="{{ route('product_single.page', $product->id) }}">
                                                        <img src="{{ asset('storage/products/' . $product->image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                                <div class="single-product-card_hover">
                                                    <div class="single-product-card__desc">
                                                        <h3>
                                                            <a href="{{ route('product_single.page', $product->id) }}">
                                                                {{ $product->name }}
                                                            </a>
                                                        </h3>
                                                        <div class="single-product-card-price_amount">
                                                            <span
                                                                class="current_price">৳{{ number_format($product->price, 2) }}</span>
                                                            @if ($product->discount)
                                                                <span
                                                                    class="discount_price">-{{ $product->discount }}%</span>
                                                                <span
                                                                    class="old_price">৳{{ number_format($product->old_price, 2) }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="single-product-card_action">
                                                            <a href="#" title="Add To Cart">
                                                                <i class="zmdi zmdi-shopping-cart-plus"></i> Add To Cart
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product Card ends -->
                                        </div>
                                    @empty
                                        <p>No products in this category.</p>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- container ends -->

    </div>
