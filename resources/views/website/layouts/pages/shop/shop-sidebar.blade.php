<div class="col-lg-3 col-md-8 col-12">
    <div class="shop_sidebar">

        <div class="sidebar_widget mb-50">
            <div class="widget_title">
                <h3>Categories</h3>
            </div>
            <div class="widget_categories">
                <ul>
                    @forelse ($categories as $category)
                        <li><a href="#"> {{ $category->category_name }}<span class="caet_count">( {{ $category->products_count }} )</span></a></li>
                    @empty
                        
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
                    <li><a href="#">Yamaha</a></li>
                    <li><a href="#">Hero</a></li>
                    <li><a href="#">Kawasaki</a></li>
                    <li><a href="#">Suzuki</a></li>
                    <li><a href="#">Fz</a></li>
                    <li><a href="#">Discover</a></li>
                    <li><a href="#">Hunk</a></li>
                    <li><a href="#">Ducati</a></li>
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
