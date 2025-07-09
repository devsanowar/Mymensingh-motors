<?php

namespace App\Http\Controllers\Admin;

use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Str;
use App\Models\Postcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = Postcategory::latest()->get();
        return view('admin.layouts.pages.postcategory.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:postcategories,category_name',
            'is_active' => 'required|in:0,1',
        ]);

        Postcategory::create([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Post Category Added Successfully.');
        return redirect()->route('post_category.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:postcategories,category_name,' . $id,
            'is_active' => 'required|in:0,1',
        ]);

        $postcategory = Postcategory::findOrFail($id);

        $postcategory->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'is_active' => (int) $request->is_active,
        ]);

        Toastr::success('Category Updated Successfully.');

        return redirect()->route('post_category.index');
    }

    public function destroy($id)
    {
        $postcategory = Postcategory::findOrFail($id);

        if ($postcategory->category_slug == 'default') {
            return response()->json(['error' => 'Default category cannot be deleted.'], 400);
        }

        $defaultCategory = Postcategory::where('category_slug', 'default')->first();
        if (!$defaultCategory) {
            return response()->json(['error' => 'Default category missing!'], 400);
        }

        $postcategory->posts()->update([
            'category_id' => $defaultCategory->id,
        ]);

        $postcategory->delete();

        return response()->json(['success' => 'Post Category deleted successfully.']);
    }

    public function changeStatus(Request $request)
    {
        $postcategory = Postcategory::find($request->id);

        if (!$postcategory) {
            return response()->json(['status' => false, 'message' => 'Post category not found.']);
        }

        $postcategory->is_active = !$postcategory->is_active;
        $postcategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $postcategory->is_active ? 'Active' : 'DeActive',
            'class' => $postcategory->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }
}
