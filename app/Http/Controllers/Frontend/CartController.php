<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function cartPage()
    {
        $cartContents = session()->get('cart', []);

        $totalAmount = 0;
        foreach ($cartContents as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        return view('website.layouts.pages.cart.cart_page', compact('cartContents', 'totalAmount'));
    }

    /*
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $qty = (int) $request->order_qty ?? 1;

        // Determine final price based on discount
        $final_price = $product->regular_price;

        if ($product->discount_price > 0) {
            if ($product->discount_type === 'percent') {
                $final_price = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
            } elseif ($product->discount_type === 'flat') {
                $final_price = $product->regular_price - $product->discount_price;
            }
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $final_price,
                'quantity' => $qty,
                'thumbnail' => $product->thumbnail,
                'regular_price' => $product->regular_price,
                'discount_price' => $product->discount_price,
                'discount_type' => $product->discount_type,
            ];
        }

        session()->put('cart', $cart);

        $itemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'message' => 'Product added to cart',
            'cart_count' => count($cart),
            'itemCount' => $itemCount,
        ]);
    }


*/

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $qty = (int) $request->order_qty ?? 1;

        $final_price = $product->regular_price;

        if ($product->discount_price > 0) {
            if ($product->discount_type === 'percent') {
                $final_price = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
            } elseif ($product->discount_type === 'flat') {
                $final_price = $product->regular_price - $product->discount_price;
            }
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
            $message = 'Product quantity updated in cart';
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $final_price,
                'quantity' => $qty,
                'thumbnail' => $product->thumbnail,
                'regular_price' => $product->regular_price,
                'discount_price' => $product->discount_price,
                'discount_type' => $product->discount_type,
            ];
            $message = 'Product added to cart';
        }

        session()->put('cart', $cart);

        $itemCount = array_sum(array_column($cart, 'quantity'));
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $miniCartHtml = view('website.layouts.pages.cart.partials.mini-cart-items', [
            'cartItems' => $cart,
            'subtotal' => $subtotal,
        ])->render();

        return response()->json([
            'message' => $message,
            'cart_count' => count($cart),
            'itemCount' => $itemCount,
            'mini_cart_html' => $miniCartHtml,
            'subtotal' => number_format($subtotal, 2),
        ]);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $removedItem = $cart[$id];
            unset($cart[$id]);
            session()->put('cart', $cart);

            // Calculate new totals
            $totalItems = 0;
            $newTotal = 0;

            foreach ($cart as $item) {
                $totalItems += $item['quantity'];
                $newTotal += $item['price'] * $item['quantity'];
            }

            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart successfully!',
                'cart_count' => $totalItems, // Total items count
                'new_total' => $newTotal,
                'removed_quantity' => $removedItem['quantity'],
            ]);
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'Product not found in cart!',
            ],
            404,
        );
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->product_id;
        $action = $request->action;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = intval($cart[$productId]['quantity']);

            if ($action === 'increase') {
                $cart[$productId]['quantity'] += 1;
            } elseif ($action === 'decrease' && $cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity'] -= 1;
            } elseif ($action === 'set') {
                $newQty = intval($request->quantity);
                $cart[$productId]['quantity'] = $newQty >= 1 ? $newQty : 1;
            }

            session()->put('cart', $cart);

            $subtotal = number_format($cart[$productId]['price'] * $cart[$productId]['quantity'], 2);
            $totalAmount = number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2);
            $itemCount = array_sum(array_column($cart, 'quantity'));

            return response()->json([
                'success' => true,
                'quantity' => $cart[$productId]['quantity'],
                'subtotal' => $subtotal,
                'totalAmount' => $totalAmount,
                'itemCount' => $itemCount,
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function removeFromMiniCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->item_id])) {
            unset($cart[$request->item_id]);
            session()->put('cart', $cart);
        }

        $itemCount = array_sum(array_column($cart, 'quantity'));
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $miniCartHtml =
            count($cart) > 0
                ? view('website.layouts.pages.cart.partials.mini-cart-items', [
                    'cartItems' => $cart,
                    'subtotal' => $subtotal,
                ])->render()
                : '<li class="text-center py-3">Your cart is empty</li>';

        return response()->json([
            'message' => 'Item removed from cart',
            'cart_count' => count($cart),
            'itemCount' => $itemCount, // Total quantity of all items
            'mini_cart_html' => $miniCartHtml,
            'subtotal' => number_format($subtotal, 2),
        ]);
    }
}
