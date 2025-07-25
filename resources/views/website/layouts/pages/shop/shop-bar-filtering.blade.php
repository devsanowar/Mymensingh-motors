<div class="col-12">
    <!-- Shop Top Bar Start -->
    <div class="shop-top-bar d-flex justify-content-between align-items-center">

        <div class="shop_top_left d-flex align-items-center">
            <!-- Product View Mode -->
            <div class="product-view-mode nav" role="tablist">
                <a class="active" href="#grid_view" data-toggle="tab" role="tab" aria-controls="grid_view"><i
                        class="fa fa-th"></i></a>
                <a href="#list_view" data-toggle="tab" role="tab" aria-controls="list_view"><i
                        class="fa fa-list"></i></a>
            </div>

            <!-- Product Showing -->
            {{-- <div class="product-showing d-flex">
                <p>Showing</p>
                <select name="showing" class="nice-select">
                    <option value="1">8</option>
                    <option selected value="2">12</option>
                    <option value="3">16</option>
                    <option value="4">20</option>
                    <option value="5">24</option>
                </select>
            </div> --}}

            <div class="product-showing d-flex align-items-center">
                <p>প্রতি পৃষ্ঠায় দেখান:</p>
                <select name="per_page" class="nice-select" id="itemsPerPage">
                    <option value="9" {{ request('per_page', 9) == 9 ? 'selected' : '' }}>9</option>
                    <option value="12" {{ request('per_page', 9) == 12 ? 'selected' : '' }}>12</option>
                    <option value="15" {{ request('per_page', 9) == 15 ? 'selected' : '' }}>15</option>
                    <option value="18" {{ request('per_page', 9) == 18 ? 'selected' : '' }}>18</option>
                    <option value="21" {{ request('per_page', 9) == 21 ? 'selected' : '' }}>21</option>
                </select>
            </div>

            <!-- Product Short -->
            {{-- <div class="product-short d-flex">
                <p>Short by</p>
                <select name="sortby" class="nice-select">
                    <option value="trending">Trending items</option>
                    <option value="sales">Best sellers</option>
                    <option value="rating">Best rated</option>
                    <option value="date">Newest items</option>
                    <option value="price-asc">Price: low to high</option>
                    <option value="price-desc">Price: high to low</option>
                </select>
            </div> --}}

        </div>
        <!-- Product Pages -->
        <div class="product-pages">
            <p>Pages 1 of 25</p>
        </div>

    </div><!-- Shop Top Bar End -->
</div>
