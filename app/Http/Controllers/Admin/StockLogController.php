<?php

namespace App\Http\Controllers\Admin;

use App\Models\StockLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockLogController extends Controller
{
    public function index()
    {
        $logs = StockLog::with('product')->latest()->paginate(10);
        return view('admin.layouts.pages.stock.stocklog', compact('logs'));
    }

    public function StockLogFilter(Request $request)
    {
        $query = StockLog::with('product')->latest();

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate($request->get('date_type', 'created_at'), '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate($request->get('date_type', 'created_at'), '<=', $request->to_date);
        }

        $logs = $query->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.layouts.pages.stock.partials.search-log', compact('logs'))->render(),
            ]);
        }

        return view('admin.layouts.pages.stock.stocklog', compact('logs'));
    }

    
}
