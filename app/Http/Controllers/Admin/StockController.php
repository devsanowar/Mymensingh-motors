<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\StockLog;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::with(['stock','unit:id,short_name'])->get();
        return view('admin.layouts.pages.stock.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::with('stock')->findOrFail($id);
        return view('admin.layouts.pages.stock.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'change_type' => 'required|in:in,out',
            'note' => 'nullable|string',
        ]);

        $stock = ProductStock::firstOrCreate(['product_id' => $id]);

        if ($request->change_type === 'in') {
            $stock->quantity += $request->quantity;
        } else {
            $stock->quantity -= $request->quantity;
        }

        $stock->save();

        StockLog::create([
            'product_id' => $id,
            'change_type' => $request->change_type,
            'quantity' => $request->quantity,
            'note' => $request->note,
        ]);

        return redirect()->route('admin.stock.index')->with('success', 'Stock updated successfully!');
    }
}
