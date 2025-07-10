<?php

namespace App\Http\Controllers\Admin;

use App\Models\FieldOfCost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FieldOfCostStoreRequest;
use App\Http\Requests\FieldOfCostUpdateRequest;

class FieldofCostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $field_of_costs = FieldOfCost::latest()->get();
        return view('admin.layouts.pages.cost.field-of-cost.index', compact('field_of_costs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FieldOfCostStoreRequest $request)
    {
        FieldOfCost::create($request->validated());
        Toastr::success('Field of cost added.');
        return Redirect()->route('field-of-cost.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FieldOfCostUpdateRequest $request, string $id)
    {
        $field_of_cost = FieldOfCost::findOrFail($id);

        $field_of_cost->update([
            'field_name' => $request->field_name,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Field of cost Updated Successfully');
        return Redirect()->route('field-of-cost.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $field_of_cost = FieldOfCost::findOrFail($id);

        if ($field_of_cost->costs()->count() > 0) {
            return response()->json(
                [
                    'error' => 'You can\'t delete this field of cost because it has related costs.',
                ],
                400,
            );
        }

        $field_of_cost->delete();

        return response()->json([
            'success' => 'Field of cost deleted successfully.',
        ]);
    }

    public function FieldOfCostStatusChange(Request $request)
    {
        $field_of_cost = FieldOfCost::find($request->id);

        if (!$field_of_cost) {
            return response()->json(['status' => false, 'message' => 'Field of cost not found.']);
        }

        $field_of_cost->is_active = !$field_of_cost->is_active;
        $field_of_cost->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $field_of_cost->is_active ? 'Active' : 'DeActive',
            'class' => $field_of_cost->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }
}
