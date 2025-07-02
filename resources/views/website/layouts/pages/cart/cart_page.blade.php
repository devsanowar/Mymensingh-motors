@extends('website.layouts.app')
@section('title', 'Cart Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush
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
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->

    <!-- PAGE SECTION START -->
    <div class="cart_page_area pt-80 pb-60">
        <form action="#">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="cart-table table-responsive mb-40">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="quantity-input-field">
                                    @forelse ($cartContents as $productId => $cartItem)
                                        <tr data-id="{{ $productId }}">
                                            <td class="pro-thumbnail"><a href="#"><img
                                                        src="{{ asset($cartItem['thumbnail']) }}" alt="" /></a></td>
                                            <td class="pro-title"><a href="#">{{ $cartItem['name'] }}</a></td>
                                            <td class="pro-price"><span
                                                    class="amount">৳{{ number_format($cartItem['price'], 2) }}</span></td>
                                            <td class="pro-quantity">
                                                <div class="product-quantity">
                                                    <input type="number" value="{{ $cartItem['quantity'] }}" />
                                                </div>
                                            </td>
                                            <td class="pro-subtotal cart-price">
                                                ৳{{ number_format($cartItem['price'] * $cartItem['quantity'], 2) }}</td>

                                            {{-- <td class="pro-remove"><a href="{{ route('removefrom.cart', $productId) }}"
                                                    onclick="return confirm('Are you sure?')">×</a></td> --}}
                                            <td>
                                                <a id="show_confirm" href="#" class="remove-from-cart"
                                                    data-item-id="{{ $productId }}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <h4 style="font-size: 18px; font-weight:600; color:#ccc">Your cart is empty!</h4>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="cart-buttons mb-30">
                            {{-- <input type="submit" value="Update Cart" /> --}}
                            <a href="{{ route('shop_page') }}">Continue Shopping</a>
                        </div>
                        <div class="cart-coupon mb-40">
                            <h4>Coupon</h4>
                            <p>Enter your coupon code if you have one.</p>
                            <div class="coupon_form_inner">
                                <input type="text" placeholder="Coupon code" />
                                <input type="submit" value="Apply Coupon" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="cart-total mb-40">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span
                                                    class="amount cart-subtotal">৳{{ number_format($totalAmount, 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong>
                                                    <span class="amount cart-total">
                                                        ৳{{ number_format($totalAmount, 2) }}
                                                    </span>
                                                </strong>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="proceed-to-checkout section mt-30">
                                <a href="#">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
    <!-- PAGE SECTION END -->
@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>


    <script>
        // Quantity increment and decrement
        $(document).on('change', '.product-quantity input[type="number"]', function(e) {
            let $input = $(this);
            let $row = $input.closest('tr');
            let productId = $row.data('id');
            let newQuantity = parseInt($input.val());

            if (isNaN(newQuantity) || newQuantity < 1) {
                newQuantity = 1;
                $input.val(newQuantity);
            }

            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    action: 'set',
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log('Response:', response);

                    if (response.success) {
                        // Remove commas before parsing to float
                        let subtotal = parseFloat(response.subtotal.replace(/,/g, '')) || 0;
                        let totalAmount = parseFloat(response.totalAmount.replace(/,/g, '')) || 0;
                        let quantity = Number(response.quantity) || 1;

                        // Update input quantity safely
                        $input.val(quantity);

                        // Update subtotal price for this row
                        $row.find('.cart-price').text('৳' + subtotal.toFixed(2));

                        // Update cart subtotal and total
                        $('.amount.cart-subtotal').text('৳' + totalAmount.toFixed(2));
                        $('.amount.cart-total').text('৳' + totalAmount.toFixed(2));

                        // Update ALL cart item count elements
                        $('#cart-count, .cart_count').text(response
                            .itemCount); // এই লাইনটি পরিবর্তন করুন

                        // Toastr success notification (optional)
                        toastr.success('Cart updated successfully!', 'Success', {
                            timeOut: 1500,
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        toastr.error('Failed to update cart.', 'Error', {
                            timeOut: 2000,
                            closeButton: true,
                            progressBar: true
                        });
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    toastr.error('Failed to update cart.', 'Error', {
                        timeOut: 2000,
                        closeButton: true,
                        progressBar: true
                    });
                }
            });
        });


        // cart item remove from cart page

        $(document).ready(function() {
            // Remove item from cart with SweetAlert confirmation
            $(document).on('click', '#show_confirm', function(e) {
                e.preventDefault();

                var itemId = $(this).data('item-id');
                var $row = $(this).closest('tr');
                var $this = $(this);

                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to remove this item from your cart?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, remove it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/cart/remove/' + itemId,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Format numbers properly
                                    function formatNumber(num) {
                                        return '৳' + parseFloat(num).toFixed(2).replace(
                                            /\d(?=(\d{3})+\.)/g, '$&,');
                                    }

                                    // Remove item row
                                    $row.remove();

                                    // Update cart subtotal and total
                                    $('.amount.cart-subtotal').text(formatNumber(
                                        response.new_total));
                                    $('.amount.cart-total').text(formatNumber(response
                                        .new_total));

                                    // Update cart count
                                    $('.cart-count, .cart_count, #cart-count').text(
                                        response.cart_count);

                                    // Show success message
                                    Swal.fire({
                                        title: "Removed!",
                                        text: response.message,
                                        icon: "success",
                                        timer: 1500,
                                        showConfirmButton: false
                                    });

                                    // If cart is empty, show empty message
                                    if (response.cart_count === 0) {
                                        $('.cart-table tbody').append(
                                            '<tr><td colspan="6" class="text-center" style="font-size: 18px; font-weight:600; color:#ccc">Your cart is empty</td></tr>'
                                        );
                                    }
                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Error!",
                                    text: xhr.responseJSON?.message ||
                                        'Error removing item',
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
