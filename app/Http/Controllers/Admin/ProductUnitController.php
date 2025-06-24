<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;

class ProductUnitController extends Controller
{
    public function index(){
        $units = ProductUnit::latest()->get();
        return view('admin.layouts.pages.product-unit.index', compact('units'));
    }

    public function store(UnitStoreRequest $request){
        ProductUnit::create($request->all());

        Toastr::success('Product unit successfully added.');
        return redirect()->back();
    }


    public function update(UnitUpdateRequest $request){
        $unit = ProductUnit::findOrFail($request->unit_id);
        $unit->update($request->all());

        Toastr::success('Product unit successfully added.');
        return redirect()->back();
    }


    public function destroy($id){
        $deleteUnit = ProductUnit::findOrFail($id);
        $deleteUnit->delete();

        Toastr::success('Product Unit Deleted Successfully.');
        return redirect()->back();
    }


    public function unitStatusChange(Request $request)
    {
        $productUnit = ProductUnit::find($request->id);

        if (!$productUnit) {
            return response()->json(['status' => false, 'message' => 'Product Unit not found.']);
        }

        $productUnit->is_active = !$productUnit->is_active;
        $productUnit->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $productUnit->is_active ? 'Active' : 'DeActive',
            'class' => $productUnit->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }


}
