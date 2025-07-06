<div class="container">
    <div class="col-lg-3 col-md-3 col-12">
        <div class="section_title">
            <h2>Part's Available </h2>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            @forelse ($brands as $brand)
                <div class="col-md-2">
                    <div class="single_banner">
                        <a href="{{ route('brand_product.page', $brand->id) }}"><img src="{{ asset($brand->image) }}" class="img-fluid"
                                alt=""></a>
                    </div>
                </div>
            @empty
                <p style="text-align: center">Brand not found!</p>
            @endforelse

        </div>
    </div>
</div>
