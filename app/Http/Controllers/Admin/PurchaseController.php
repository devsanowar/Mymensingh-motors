<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseStoreRequest;
use Brian2694\Toastr\Facades\Toastr;

class PurchaseController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::where('is_active', 1)
            ->select(['id', 'supplier_name'])
            ->get();

        $purchases = Purchase::with('supplier')->get();
        return view('admin.layouts.pages.purchase.index', compact('suppliers', 'purchases'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::where('is_active', 1)
            ->select(['id', 'supplier_name'])
            ->get();
        return view('admin.layouts.pages.purchase.create', compact('suppliers', 'products'));
    }

    public function getSupplierBalance($id)
    {
        $supplier = Supplier::findOrFail($id);

        $balance = $supplier->opening_balance ?? 0;
        $type = $supplier->balance_type ?? 'payable';

        $previous_balance = $type === 'receivable' ? -1 * $balance : $balance;

        return response()->json([
            'previous_balance' => $previous_balance,
            'balance_type' => $supplier->balance_type,
        ]);
    }

    public function store(PurchaseStoreRequest $request)
    {
        $purchase = DB::transaction(function () use ($request) {
            $supplier = Supplier::lockForUpdate()->findOrFail($request->supplier_id);

            $items = collect($request->products)->map(function ($i) {
                $qty = (int) $i['qty'];
                $price = (float) $i['price'];
                return [
                    'product_id' => (int) $i['id'],
                    'quantity' => $qty,
                    'purchase_price' => $price,
                    'total' => $qty * $price,
                ];
            });

            $total = $items->sum('total');
            $discount = (float) ($request->total_discount ?? 0);
            $transport = (float) ($request->transport_cost ?? 0);
            $paid = (float) ($request->paid_amount ?? 0);
            $grandTotal = $total - $discount + $transport;

            $previousBalance = (float) ($supplier->opening_balance ?? 0);

            // মোট হিসাব = আগের বকেয়া + নতুন purchase
            $totalPayable =
                $supplier->balance_type === 'receivable'
                    ? $grandTotal - $previousBalance // আগে পেতে ছিল
                    : $previousBalance + $grandTotal; // আগে দিতে ছিল

            $rawCurrent = $totalPayable - $paid;
            if (abs($rawCurrent) < 0.00001) {
                $rawCurrent = 0;
            }
            $currentBalance = $rawCurrent;

            $paymentStatus = $currentBalance == 0 ? 'Paid' : ($paid > 0 ? 'Partial' : 'Due');

            $purchase = Purchase::create([
                'purchase_date' => $request->purchase_date,
                'supplier_id' => $request->supplier_id,
                'voucher_number' => $request->voucher_number,
                'total_amount' => $total,
                'total_discount' => $discount,
                'transport_cost' => $transport,
                'grand_total' => $grandTotal,
                'previous_balance' => $previousBalance,
                'paid_amount' => $paid,
                'current_balance' => $currentBalance,
                'payment_method' => $request->payment_type ?? 'Cash',
                'payment_status' => $paymentStatus,
            ]);

            foreach ($items as $item) {
                $purchase->items()->create($item);
                ProductStock::updateOrCreate(['product_id' => $item['product_id']], ['quantity' => DB::raw('quantity + ' . $item['quantity'])]);
            }

            // Supplier table update
            if ($currentBalance == 0) {
                // সব হিসাব ক্লিয়ার হলে
                $supplier->update([
                    'opening_balance' => 0,
                    'balance_type' => 'payable',
                ]);
            } else {
                $supplier->update([
                    'opening_balance' => abs($currentBalance),
                    'balance_type' => $currentBalance > 0 ? 'payable' : 'receivable',
                ]);
            }

            return $purchase;
        });

        Toastr::success('Purchase successfully done!');
        return redirect()->back();
    }

    public function edit($id) {}

    public function filter(Request $request)
    {
        $query = Purchase::with('supplier');

        // Filter by Voucher No
        if ($request->voucher_no) {
            $query->where('voucher_number', 'like', '%' . $request->voucher_no . '%');
        }

        // Filter by Supplier
        if ($request->supplier_id) {
            $query->where('supplier_id', $request->supplier_id);
        }

        // Filter by Date Range
        if ($request->from_date && $request->to_date) {
            $query->whereBetween('purchase_date', [$request->from_date, $request->to_date]);
        } elseif ($request->from_date) {
            $query->whereDate('purchase_date', '>=', $request->from_date);
        } elseif ($request->to_date) {
            $query->whereDate('purchase_date', '<=', $request->to_date);
        }

        $purchases = $query->get();

        $grandTotalSum = $purchases->sum('grand_total');
        $dueSum = $purchases->sum('current_balance');

        return response()->json([
            'purchases' => $purchases,
            'grand_total_sum' => $grandTotalSum,
            'due_sum' => $dueSum,
        ]);
    }


    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return response()->json(['status' => 'success', 'message' => 'Purchase deleted successfully.']);
    }


    public function trashedData()
    {
        $purchases = Purchase::with('supplier')->onlyTrashed()->get();

        return view('admin.layouts.pages.purchase.recyclebin.trashed-data', compact('purchases'));
    }


    public function restoreData($id)
    {
        Purchase::withTrashed()->where('id', $id)->restore();

        return response()->json(['success' => 'Purchase restored successfully.']);
    }

    public function forceDeleteData($id)
    {
        $purchase = Purchase::withTrashed()->where('id', $id)->first();
        $purchase->forceDelete();

       return response()->json(['success' => 'Purchase successfully deleted.']);
    }

    
}
