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
        $costs = Cost::with(['category:id,category_name', 'field:id,field_name'])
            ->latest()
            ->get();
        return view('admin.layouts.pages.cost.index', compact('costs'));
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
}
