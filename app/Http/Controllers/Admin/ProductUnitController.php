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
}
