<!-- resources/views/orders/partials/details.blade.php -->
<div class="order-details">
    <div class="row">
        <div class="col-md-6">
            <h6>অর্ডার তথ্য</h6>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>অর্ডার তারিখ:</strong> {{ $order->created_at->format('d M Y h:i A') }}
                </li>
                <li class="list-group-item">
                    <strong>স্ট্যাটাস:</strong> 
                    <span class="badge badge-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </li>
                <li class="list-group-item">
                    <strong>মোট Amount:</strong> {{ number_format($order->total_price, 2) }} টাকা
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <h6>পেমেন্ট তথ্য</h6>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>পেমেন্ট মেথড:</strong> {{ $order->payment_method }}
                </li>
                @if($order->transaction_id)
                <li class="list-group-item">
                    <strong>ট্রানজেকশন ID:</strong> {{ $order->transaction_id }}
                </li>
                @endif
            </ul>
        </div>
    </div>

    <h6 class="mt-4">অর্ডার আইটেম</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>প্রোডাক্ট</th>
                <th>পরিমাণ</th>
                <th>দাম</th>
                <th>মোট</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
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