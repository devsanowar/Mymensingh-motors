<div class="card">
    <div class="card-body">
        <h5>Order Information</h5>
        <p><strong>Tracking Number:</strong> {{ $order->order_id }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_method) }}</p>
        <hr>
        <h5>Shipping Details</h5>
        <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
    </div>
</div>
