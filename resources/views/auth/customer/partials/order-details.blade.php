
<div class="order-details">
    <div class="row">
        <div class="col-md-6">
            <h6>Order Information</h6>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Order date:</strong> {{ $order->created_at->format('d M Y h:i A') }}
                </li>
                <li class="list-group-item">
                    <strong>Status:</strong>
                    <span
                        class="badge badge-{{ $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                        {{ ucfirst($order->status) }}
                    </span>

                    @if ($order->status == 'pending')
                        <button class="btn btn-sm btn-outline-danger ml-2 cancel-order-btn"
                            data-order-id="{{ $order->id }}">
                            <i class="fas fa-times-circle"></i> Cancel the order
                        </button>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Total Amount:</strong> {{ number_format($order->total_price, 2) }} টাকা
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <h6>Payment Information</h6>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Payment Method:</strong> {{ $order->payment_method }}
                </li>
                @if ($order->transaction_id)
                    <li class="list-group-item">
                        <strong>Tranjection ID:</strong> {{ $order->transaction_id }}
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <h6 class="mt-4">Order Items</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} টাকা</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }} টাকা</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<!-- Cancel Order Confirmation Modal -->
<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancel the order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this order?</p>
                <form id="cancelOrderForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="cancel_reason">Reason</label>
                        <textarea class="form-control" id="cancel_reason" name="cancel_reason" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmCancelBtn">Submit</button>
            </div>
        </div>
    </div>
</div>
