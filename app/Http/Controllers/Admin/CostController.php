<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cost;
use App\Models\FieldOfCost;
use App\Models\CostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CostStoreRequest;
use App\Http\Requests\CostUpdateRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redirect;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $costs = Cost::with(['category:id,category_name', 'field:id,field_name'])
        //     ->latest()
        //     ->get();

        $costs = Cost::with('category', 'field')->latest()->get();

        $categories = CostCategory::all();
        $fields = FieldOfCost::all();

        return view('admin.layouts.pages.cost.index', compact('costs', 'categories','fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CostCategory::select('id', 'category_name')->where('is_active', 1)->get();
        $field_of_costs = FieldOfCost::select('id', 'field_name')->where('is_active', 1)->get();
        return view('admin.layouts.pages.cost.create', compact('categories', 'field_of_costs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CostStoreRequest $request)
    {
        $validated = $request->validated();
        Cost::create($validated);

        Toastr::success('Cost successfully added.');
        return Redirect()->route('cost.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cost = Cost::with(['category', 'field'])->findOrFail($id);

        if (request()->ajax()) {
            return response()->json([
                'date' => $cost->date,
                'category' => $cost->category,
                'field' => $cost->field,
                'description' => $cost->description,
                'amount' => $cost->amount,
                'spend_by' => $cost->spend_by,
            ]);
        }
        return view('admin.layouts.pages.cost.show', compact('cost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cost = Cost::findOrFail($id);
        $categories = CostCategory::select('id', 'category_name')->where('is_active', 1)->get();
        $field_of_costs = FieldOfCost::select('id', 'field_name')->where('is_active', 1)->get();
        return view('admin.layouts.pages.cost.edit', compact('cost', 'categories', 'field_of_costs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CostUpdateRequest $request, string $id)
    {
        $cost = Cost::findOrFail($id);

        $validated = $request->validated();
        $cost->update($validated);

        toastr()->success('Cost updated successfully.');
        return redirect()->route('cost.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cost = Cost::findOrFail($id);
        $cost->delete();

        Toastr::success('Cost successfully deleted.');
        return Redirect()->route('cost.index');
    }

    public function filter(Request $request)
    {
        $query = Cost::with('category', 'field');

        if ($request->from_date) {
            $query->whereDate('date', '>=', $request->from_date);
        }

        if ($request->to_date) {
            $query->whereDate('date', '<=', $request->to_date);
        }

        if ($request->spend_by) {
            $query->where('spend_by', 'like', '%' . $request->spend_by . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->field_id) {
            $query->where('field_id', $request->field_id);
        }

        $costs = $query->latest()->get();

        $html = view('admin.layouts.pages.cost.partials.cost_info_filter', compact('costs'))->render();

        return response()->json(['html' => $html]);
    }

    public function trashedData()
    {
        $costs = Cost::onlyTrashed()->get();
        return view('admin.layouts.pages.cost.recycle-bin.all-trashdata', compact('costs'));
    }

    public function restoreData($id)
    {
        Cost::withTrashed()->where('id', $id)->restore();
        $toast = Toastr();
        $toast->success('Cost restored successfully.');
        return redirect()->back();
    }

    public function forceDeleteData($id)
    {
        $cost = Cost::withTrashed()->where('id', $id)->first();
        $cost->forceDelete();

        Toastr::success('Cost permanently deleted.');
        return redirect()->back();
    }
}
