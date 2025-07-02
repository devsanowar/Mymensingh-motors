<div class="col-lg-3 col-md-8 col-12">
    <div class="shop_sidebar">

        <div class="sidebar_widget mb-50">
            <div class="widget_title">
                <h3>Categories</h3>
            </div>
            <div class="widget_categories">
                <ul>
                    @forelse ($categories as $category)
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}">
                                {{ $category->category_name }}
                                <span class="caet_count">({{ $category->products_count }})</span>
                            </a>
                        </li>
                    @empty
                        <li>No categories found.</li>
                    @endforelse
                </ul>
            </div>
        </div>


        <div class="sidebar_widget mb-50">
            <div class="widget_title">
                <h3>Brands</h3>
            </div>
            <div class="widget_brand">
                <ul>
                    @forelse ($brands as $brand)
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['brand' => $brand->id]) }}">
                                {{ $brand->brand_name }}
                                <span class="caet_count"> ({{ $brand->products_count }})</span>
                            </a>
                        </li>
                    @empty
                        <li>No Brands Found</li>
                    @endforelse
                </ul>
            </div>

        </div>


        <div class="sidebar_widget mb-50">
            <div class="widget_title">
                <h3>Filter by Price</h3>
            </div>

            <form id="price-filter-form">
                <div class="custom--range">
                    <div id="slider-range" class="custom--range__range"></div>
                    <div class="custom--range__content d-flex flex-wrap justify-content-betwwen">

                        <input type="text" id="selected-price-range" class="custom--range__prices" id="amount"
                            readonly />
                        <!-- Hidden fields for real values -->
                        <input type="hidden" id="filter-min-price" name="min_price">
                        <input type="hidden" id="filter-max-price" name="max_price">
                    </div>
                </div>
            </form>

        </div>

        <div class="sidebar-item widget_list widget_filter">
            <h5 class="sidebar-item__title">Filter by Price</h5>



        </div>

    </div>
</div>
