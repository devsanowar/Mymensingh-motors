@extends('website.layouts.app')
@section('title', 'Checkout Page')
@section('website_content')
    <!--Breadcrumb section-->
    <div class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->

    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="col-md-12">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <form action="{{ route('place_an_order') }}" method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h3>Billing / Shipping Details</h3>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" name="first_name" placeholder="First full name" value="{{ $customer->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" placeholder="Enter Last name" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" placeholder="Enter phone number" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="country-select">
                                        <label>District <span class="required">*</span></label>

                                        <select class="select" name="district_id" id="district" required>
                                            <option value="">Select District</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->district_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('district_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="country-select">
                                        <label>Upazila <span class="required">*</span></label>
                                        <select class="select" name="upazila_id" id="upazila" required>
                                            <option value="">Select Upazila</option>
                                        </select>
                                    </div>
                                    @error('upazila_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" placeholder="Street address" />
                                    </div>
                                </div>
                            </div>

                            <div class="order-notes">
                                <div class="checkout-form-list mrg-nn">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" name="order_note" cols="30" rows="10"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>

                        </div>
                    
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartContents as $cartContent)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $cartContent['name'] }} <strong class="product-quantity"> ×
                                                    {{ $cartContent['quantity'] }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span
                                                    class="amount">৳{{ $cartContent['price'] * $cartContent['quantity'] }}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount" data-amount="{{ $totalAmount }}">৳
                                                {{ $totalAmount }}</span></td>
                                    </tr>
                                    <tr class="shipping">
                                        <td colspan="2">
                                            <h4>Shipping Options</h4>
                                            <ul style="list-style: none; padding: 0;">
                                                @foreach ($shippings as $shipping)
                                                    <li style="padding: 10px; margin-bottom: 8px; background: #f9f9f9; border-radius: 4px; transition: background 0.3s;"
                                                        onmouseover="this.style.background='#f0f0f0'"
                                                        onmouseout="this.style.background='#f9f9f9'">
                                                        <input type="radio" name="shipping_charge"
                                                            id="shipping_{{ $shipping->id }}" class="shipping-radio"
                                                            value="{{ $shipping->shipping_charge }}" required
                                                            style="margin-right: 10px;">

                                                        <label for="shipping_{{ $shipping->id }}"
                                                            style="display: flex; justify-content: space-between; width: 100%; cursor: pointer;">
                                                            <span style="font-size: 15px; color: #2e2e2e;">
                                                                {{ $shipping->shipping_area }}
                                                            </span>
                                                            <span
                                                                style="font-weight: 600; color: #DB1E3D; font-size: 15px;">
                                                                ৳{{ $shipping->shipping_charge }}
                                                            </span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount"
                                                    id="total-amount">৳{{ $totalAmount }}</span></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4 class="payment-header text-left">Payment Method</h4>
                                            <ul class="payment-methods-list">
                                                @foreach ($paymentMethods as $paymentMethod)
                                                    <li class="payment-method-item">
                                                        <input type="radio" name="payment_method"
                                                            id="payment_{{ $loop->index }}"
                                                            value="{{ $paymentMethod->name }}" class="payment-radio"
                                                            required>
                                                        <label for="payment_{{ $loop->index }}"
                                                            class="payment-label">{{ $paymentMethod->name }}</label>
                                                    </li>
                                                @endforeach

                                                <div id="bkash-fields" class="payment-extra-fields">
                                                    <input type="text" name="transaction_number" class="payment-input"
                                                        placeholder="Transaction Number">
                                                    <input type="text" name="transaction_id" class="payment-input"
                                                        placeholder="Transaction ID">
                                                </div>
                                            </ul>
                                        </td>
                                    </tr>


                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="order-button-payment">
                                    <input type="submit" value="Place order" />
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.payment-method-radio').forEach(function(radio) {
            radio.addEventListener('change', function() {
                const method = this.value.toLowerCase();
                if (method === 'bkash') {
                    document.getElementById('bkash-fields').style.display = 'block';
                } else {
                    document.getElementById('bkash-fields').style.display = 'none';
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#district').on('change', function() {
                let district_id = $(this).val();

                $('#upazila').empty().append('<option>Loading...</option>');

                if (district_id) {
                    $.ajax({
                        url: '/get-upazilas/' + district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#upazila').empty().append(
                                '<option value="">Select Upazila</option>');
                            $.each(data, function(index, upazila) {
                                $('#upazila').append('<option value="' + upazila.id +
                                    '">' + upazila.upazila_name + '</option>');
                            });
                        },
                        error: function() {
                            $('#upazila').empty().append('<option>Error loading</option>');
                        }
                    });
                }
            });
        });
    </script>

    {{-- <script>
        document.querySelectorAll('.shipping-radio').forEach(function(radio) {
            radio.addEventListener('change', function() {
                const shipping = parseFloat(this.value);
                const subtotal = parseFloat(document.querySelector('#subtotal').dataset.amount);
                const total = shipping + subtotal;
                document.querySelector('#total-amount').innerText = total.toFixed(2);
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('.shipping-radio');
            const totalElement = document.getElementById('total-amount');

            // Get subtotal from the initial total amount (remove currency symbol)
            let subtotal = parseFloat(totalElement.textContent.replace('৳', '')) || 0;

            radios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const shipping = parseFloat(this.value) || 0;
                    const newTotal = subtotal + shipping;
                    totalElement.textContent = '৳' + newTotal.toFixed(2);
                });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentRadios = document.querySelectorAll('.payment-radio');
            const bkashFields = document.getElementById('bkash-fields');
            const nagadFields = document.getElementById('nagad-fields');

            paymentRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Hide all payment fields first
                    document.querySelectorAll('.payment-fields').forEach(field => {
                        field.style.display = 'none';
                        // Make all fields not required when hidden
                        field.querySelectorAll('input').forEach(input => {
                            input.required = false;
                        });
                    });

                    // Show relevant fields based on selection
                    if (this.dataset.method === 'bkash') {
                        bkashFields.style.display = 'block';
                        bkashFields.querySelectorAll('input').forEach(input => {
                            input.required = true;
                        });
                    } else if (this.dataset.method === 'nagad') {
                        nagadFields.style.display = 'block';
                        nagadFields.querySelectorAll('input').forEach(input => {
                            input.required = true;
                        });
                    }
                });
            });
        });
    </script>
@endpush
