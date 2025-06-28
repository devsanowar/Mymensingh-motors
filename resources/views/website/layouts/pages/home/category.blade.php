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
        @forelse ($categories as $category)
            <div class="col-md-2">
                <div class="single-categories">
                    <img src="{{ asset($category->image) }}" class="img-fluid"
                        alt="category image">
                    <h4 class="product-category-title"><a href="#">{{ $category->category_name }}</a></h4>
                </div>
            </div>
        @empty
        <p style="font-size: text-center">Category not found!</p>
        @endforelse

    </div>
</div>
