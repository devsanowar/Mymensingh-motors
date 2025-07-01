@extends('website.layouts.app')
@section('title', 'Home')
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
                                <li>{{ $pageTitle }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb section end-->


        <!--shop area start-->
        <div class="shop_area ptb-100">
            <div class="container">
                <div class="row">
                    @include('website.layouts.pages.shop.shop-sidebar')
                    

                    @include('website.layouts.pages.shop.shop-product')
                </div>


            </div>
        </div>
        <!--shop area end-->
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
</script> --}}
@endpush