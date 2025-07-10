<?php

namespace App\Http\Controllers\Admin;

use App\Models\CostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CostCategoryStoreRequest;
use App\Http\Requests\CostCategoryUpdateRequest;
use Brian2694\Toastr\Toastr as ToastrToastr;

class CostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CostCategory::latest()->get();
        return view('admin.layouts.pages.cost.category.index', compact('categories'));
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
    public function store(CostCategoryStoreRequest $request)
    {
        CostCategory::create($request->validated());

        Toastr::success('Category Added Successfully');
        return Redirect()->route('cost-category.index');

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
    public function update(CostCategoryUpdateRequest $request, string $id)
    {
        $category = CostCategory::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Category Updated Successfully');
        return Redirect()->route('cost-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CostCategory::findOrFail($id);
        if ($category->costs()->count() > 0) {
            return redirect()->route('cost-category.index')->with('error', 'You can\'t delete this category because it has related costs.');
        }


        $category->delete();
        Toastr::success("Category deleted successfully.");
        return Redirect()->route('cost-category.index');
    }

    public function costCategoryStatusChange(Request $request){
        $category = CostCategory::find($request->id);

        if (!$category) {
            return response()->json(['status' => false, 'message' => 'Category not found.']);
        }

        $category->is_active = !$category->is_active;
        $category->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $category->is_active ? 'Active' : 'DeActive',
            'class' => $category->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }
}
