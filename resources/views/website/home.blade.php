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
        button.find('.btn-text').addClass('d-none');

        $.ajax({
            url: "{{ route('addToCart') }}",
            method: "POST",
            data: formData,
            success: function(response) {
                toastr.success(response.message, '', { 
                    timeOut: 1500,
                    positionClass: 'toast-bottom-right'
                });
                
                // Update all cart count elements
                $('.cart_count').text(response.itemCount);
                $('#cart-count').text(response.itemCount);
                
                // Update mini cart
                $('#mini-cart-container').html(response.mini_cart_html);
                
                // Update subtotal if displayed elsewhere
                if (response.subtotal) {
                    $('.cart-subtotal-amount').text('৳' + response.subtotal);
                }
            },
            error: function(xhr) {
                let errorMessage = xhr.responseJSON?.message || 'Failed to add product.';
                toastr.error(errorMessage, '', { 
                    timeOut: 2000,
                    positionClass: 'toast-bottom-right'
                });
            },
            complete: function() {
                // Reset button state
                button.prop('disabled', false);
                spinner.addClass('d-none');
                button.find('.btn-text').removeClass('d-none');
            }
        });
    });

    // Remove from cart functionality remains the same
    $(document).on('click', '.remove-from-cart', function(e) {
        e.preventDefault();
        
        let itemId = $(this).data('item-id');
        let cartItem = $(this).closest('li');
        
        // Set loading state
        cartItem.css('opacity', '0.6');
        $(this).html('<i class="zmdi zmdi-spinner zmdi-hc-spin"></i>');

        $.ajax({
            url: "{{ route('removeFromCart') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                item_id: itemId
            },
            success: function(response) {
                toastr.success(response.message, '', { 
                    timeOut: 1500,
                    positionClass: 'toast-bottom-right'
                });
                
                // Update all cart count elements
                $('.cart_count').text(response.itemCount);
                $('#cart-count').text(response.itemCount);
                
                // Update mini cart
                $('#mini-cart-container').html(response.mini_cart_html);
                
                // Update subtotal if displayed elsewhere
                if (response.subtotal) {
                    $('.cart-subtotal-amount').text('৳' + response.subtotal);
                }
            },
            error: function(xhr) {
                toastr.error(
                    xhr.responseJSON?.message || 'Failed to remove item', 
                    '', { 
                        timeOut: 2000,
                        positionClass: 'toast-bottom-right'
                    }
                );
                cartItem.css('opacity', '1');
                $(this).html('<i class="zmdi zmdi-delete"></i>');
            }
        });
    });
});
</script>





{{-- <script>
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
                        // Update all cart count elements
                        $('.cart_count').text(response.itemCount);
                        $('#cart-count').text(response.itemCount);

                        // Update mini cart
                        $('#mini-cart-container').html(response.mini_cart_html);

                        // Show success message
                        toastr.success(response.message);
                    },
                error: function() {
                    toastr.error('Failed to add product.', '', { timeOut: 2000 });
                    spinner.addClass('d-none');
                    button.prop('disabled', false);
                }
            });
        });

        // Remove from cart functionality
            $(document).on('click', '.remove-from-cart', function(e) {
                e.preventDefault();

                let item = $(this).closest('li');
                item.css('opacity', '0.5');

                let itemId = $(this).data('item-id');

                $.ajax({
                    url: "{{ route('removeFromCart') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        item_id: itemId
                    },
                    success: function(response) {
                        // Update all cart count elements
                        $('.cart_count').text(response.itemCount);
                        $('#cart-count').text(response.itemCount);

                        // Update mini cart
                        $('#mini-cart-container').html(response.mini_cart_html);

                        // Show success message
                        toastr.success(response.message);
                    },
                    error: function() {
                        toastr.error('Failed to remove item');
                    }
                });
            });


    });
</script> --}}
@endpush
