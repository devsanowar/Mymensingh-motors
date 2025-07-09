<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FieldOfCostStoreRequest;
use App\Models\FieldOfCost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

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
        Toastr::success("Field of cost added.");
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
