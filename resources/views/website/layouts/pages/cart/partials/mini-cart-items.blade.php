@foreach($cartItems as $id => $item)
<li class="single_product_cart">
    <div class="cart_img">
        <a href="">
            <img src="{{ asset($item['thumbnail']) }}" alt="{{ $item['name'] }}">
        </a>
    </div>
    <div class="cart_title">
        <h5><a href="">{{ $item['name'] }}</a></h5>
        <span>৳{{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</span>
    </div>
    <div class="cart_delete">
        <a href="#" class="remove-from-cart" data-item-id="{{ $id }}">
            <i class="zmdi zmdi-delete"></i>
        </a>
    </div>
</li>
@endforeach

<li class="cart_space">
    <div class="cart_sub">
        <h4>Subtotal</h4>
    </div>
    <div class="cart_price">
        <h4>৳{{ number_format($subtotal, 2) }}</h4>
    </div>
</li>
<li class="cart_btn_wrapper">
    <a class="cart_btn" href="{{ route('cart.page') }}">view cart</a>
    <a class="cart_btn" href="{{ route('checkout.page') }}">checkout</a>
</li>