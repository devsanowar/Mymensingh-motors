<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        $orders = $user->orders()
               ->with(['orderItems.product'])
               ->latest()
               ->paginate(10);

        return view('auth.customer.customer-dashboard', compact('orders'));
    }

    public function show(Order $order)
{
    // অথেন্টিকেশন চেক করুন
    if (auth()->id() !== $order->user_id) {
        abort(403);
    }

    $order->load(['orderItems.product']);

    if (request()->ajax()) {
        return view('auth.customer.partials.order-details', compact('order'))->render();
    }

    return view('auth.customer.customer-dashboard', compact('order'));
}

}
