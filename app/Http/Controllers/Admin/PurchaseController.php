<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductStock;

class PurchaseController extends Controller
{
    public function index(){
        
        return view('admin.layouts.pages.purchase.index');
    }

    public function create(){
        $products = Product::all();
        $suppliers = Supplier::where('is_active', 1)->select(['id','supplier_name'])->get();
        return view('admin.layouts.pages.purchase.create', compact('suppliers', 'products'));
    }


public function getSupplierBalance($id)
{
    $supplier = Supplier::findOrFail($id);

    $balance = $supplier->opening_balance ?? 0;
    $type = $supplier->balance_type ?? 'payable'; // default to 'payable'

    // যদি receivable হয়, তাহলে balance কে negative করে পাঠানো হবে
    $previous_balance = $type === 'receivable' ? -1 * $balance : $balance;

    return response()->json([
        'previous_balance' => $previous_balance
    ]);
}



    public function store(Request $request)
{
    $validated = $request->validate([
        'purchase_date'   => 'required|date',
        'supplier_id'     => 'required|exists:suppliers,id',
        'voucher_number'  => 'required|string',
        'total'           => 'required|numeric',
        'grand_total'     => 'required|numeric',
        'items'           => 'required|array|min:1',
        'items.*.product_id'    => 'required|exists:products,id',
        'items.*.quantity'      => 'required|integer|min:1',
        'items.*.purchase_price'=> 'required|numeric|min:0',
    ]);

    DB::transaction(function () use ($request, &$purchase) {
        $purchase = Purchase::create([
            'purchase_date'    => $request->purchase_date,
            'supplier_id'      => $request->supplier_id,
            'voucher_no'       => $request->voucher_number,
            'total_amount'     => $request->total,
            'total_discount'   => $request->total_discount ?? 0,
            'transport_cost'   => $request->transport_cost ?? 0,
            'grand_total'      => $request->grand_total,
            'previous_balance' => $request->previous_balance ?? 0,
            'paid_amount'      => $request->paid_amount ?? 0,
            'current_balance'  => $request->current_balance ?? 0,
            'payment_method'   => $request->payment_type,
            'payment_status'   => $request->payment_status,
        ]);

        foreach ($request->items as $item) {
            $purchase->items()->create([
                'product_id'     => $item['product_id'],
                'quantity'       => $item['quantity'],
                'purchase_price' => $item['purchase_price'],
                'total'          => $item['total'],
            ]);

            // স্টক আপডেট
            ProductStock::updateOrCreate(
                ['product_id' => $item['product_id'], 'showroom_id' => auth()->user()->showroom_id ?? null],
                ['quantity'   => DB::raw('quantity + '.$item['quantity'])]
            );
        }
    });

    return response()->json(['status' => true, 'id' => $purchase->id]);
}




}
