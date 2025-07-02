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
                <h3>Price</h3>
            </div>
            <div class="widget_price">
                <div class="sidebar-price">
                    <div id="price-range"></div>
                    <input type="text" id="price-amount" readonly>
                </div>
            </div>
        </div>

    </div>
</div>
