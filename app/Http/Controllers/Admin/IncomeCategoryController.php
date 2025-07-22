<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\IncomeCategoryStoreRequest;
use App\Http\Requests\IncomeCategoryUpdateRequest;

class IncomeCategoryController extends Controller
{
    public function index(){
        $categories = IncomeCategory::select(['id','category_name','is_active'])->get();
        return view('admin.layouts.pages.income.category.index', compact('categories'));
    }

    public function store(IncomeCategoryStoreRequest $request){
        IncomeCategory::create($request->validated());

        Toastr::success('Category Added Successfully');
        return Redirect()->route('income_category.index');
    }

    public function update(IncomeCategoryUpdateRequest $request, $id){
        $category = IncomeCategory::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Category Updated Successfully');
        return Redirect()->route('income_category.index');
    }

    public function destroy($id){
        $category = IncomeCategory::findOrFail($id);
        $category->delete();

        Toastr::success('Category Deleted Successfully');
        return Redirect()->route('income_category.index');
    }
}
