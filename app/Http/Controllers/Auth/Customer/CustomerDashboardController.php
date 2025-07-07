<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $orders = $user
            ->orders()
            ->with(['orderItems.product'])
            ->latest()
            ->paginate(10);

        $downloads = [];

        foreach ($orders as $order) {
            foreach ($order->orderItems as $item) {
                if ($item->product && $item->product->download_link) {
                    $downloads[] = [
                        'product_name' => $item->product->name,
                        'order_date' => $order->created_at->format('M d, Y'),
                        'expires' => 'Never',
                        'download_link' => $item->product->download_link,
                    ];
                }
            }
        }

        return view('auth.customer.customer-dashboard', compact('orders', 'downloads'));
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

    public function invoice(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            abort(403);
        }

        $order->load(['orderItems.product']);

        if (request()->ajax()) {
            return view('auth.customer.partials.download-invoice', compact('order'))->render();
        }

        return view('auth.customer.customer-dashboard', compact('order'));
    }

    public function cancel(Request $request, $id)
    {
        $validated = $request->validate([
            'cancel_reason' => 'nullable|string|max:500',
        ]);

        $order = Order::findOrFail($id);

        if ($order->user_id != auth()->id()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Unauthorized action.',
                ],
                403,
            );
        }

        if (!$order->canBeCancelled()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'শুধুমাত্র পেন্ডিং অর্ডার ক্যান্সেল করা যাবে',
                ],
                400,
            );
        }

        $order->update([
            'status' => 'cancelled',
            'cancel_reason' => $validated['cancel_reason'],
            'cancelled_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'অর্ডার সফলভাবে ক্যান্সেল করা হয়েছে',
        ]);
    }

    public function trackOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
        ]);

        $order = Order::where('order_id', $request->order_id)->first();

        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tracking number not found!',
            ]);
        }

        $html = view('Auth.customer.partials.track_order_result', compact('order'))->render();

        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }
}
