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
    @include('website.layouts.pages.home.product-by-category')
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

@push('scripts')
    <script>
    $(document).ready(function() {
        $(document).on('submit', '.add-to-cart-form', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            let button = form.find('.buy-btn');
            let spinner = button.find('.spinner-border');

            button.prop('disabled', true);
            spinner.removeClass('d-none');

            $.ajax({
                url: "{{ route('addToCart') }}",
                method: "POST",
                data: formData,
                success: function(response) {
                    toastr.success(response.message, '', { timeOut: 1500 });
                    $('#cart-count').text(response.cart_count);

                    // Optionally display the updated cart content if needed
                    console.log(response.cart_contents);

                    spinner.addClass('d-none');
                    button.prop('disabled', false);

                    $('#cart-count').text(response.itemCount);
                },
                error: function() {
                    toastr.error('Failed to add product.', '', { timeOut: 2000 });
                    spinner.addClass('d-none');
                    button.prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
