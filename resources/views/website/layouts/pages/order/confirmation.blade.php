@extends('website.layouts.app')
@section('title', 'Order Success Message')
@section('website_content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-md-10 col-sm-12">
                <div class="order-success-card text-center">
                    <div id="print-area">
                        <div style="text-align: center; margin: 20px 0;">
                            <!-- Company Logo -->
                            <a href="index.html" style="display: inline-block;">
                                <img src="{{ asset($website_setting->website_logo) }}" alt="Marco Footwear Logo"
                                    style="display: block; margin: 0 auto; width: 160px;">
                            </a>
                        </div>

                        <!-- Company Info -->
                        <div class="d-flex justify-content-between align-items-center my-4">
                            <div class="text-start">
                                <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                                <p>{{ $order->phone }}</p>
                                <p>{{ $order->address }}</p>
                            </div>
                            <div class="text-end">
                                <p><strong>Invoice :</strong> #{{ $order->id }}</p>
                                <p><strong>Order ID:</strong> #{{ $order->order_id }}</p>
                                <p><strong>Created:</strong> {{ $order->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="invoice">
                            <p class="invoice-text">Invoice</p>
                        </div>

                        <!-- Order Summary -->
                        <div class="text-start pt-4">
                            @if (isset($order))
                                @if ($order->orderItems && count($order->orderItems) > 0)
                                    <!-- <h5 class="mb-3">Order Summary</h5> -->
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered align-middle text-center">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Rate</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderItems as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->product->product_name ?? 'Product not found' }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ number_format($item->price, 2) }} TK</td>
                                                        <td>{{ number_format($item->quantity * $item->price, 2) }} TK</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-end">Shipping Cost:</th>
                                                    <th>{{ number_format($order->shipping_charge, 2) }} TK</th>
                                                </tr>

                                                <tr>
                                                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                                                    <td><strong>৳{{ number_format($order->total_price, 2) }}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-danger">No items found in this order.</p>
                                @endif
                            @else
                                <p class="text-danger">Order information not found.</p>
                            @endif
                        </div>
                    </div>
                    <!-- logo and invoice number -->



                    <!-- Action Buttons -->
                    <div class="row text-center mt-4 g-2">
                        <div class="col-md-12 col-12 mb-2">
                            <button onclick="window.print()"
                                class="marco-btn print-btn w-100 py-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-print me-2"></i>Print Confirmation
                            </button>
                        </div>
                        <div class="col-md-6 col-12">
                            <a href="{{ route('home') }}" class="marco-btn w-100 py-2">Back to Home</a>
                        </div>
                        <div class="col-md-6 col-12">
                            <a href="{{ route('shop_page') }}" class="marco-btn shop-btn w-100 py-2">Shop Again</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
