<?php

namespace App\Http\Controllers\Admin;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\FieldOfIncome;
use App\Models\IncomeCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\IncomeStoreRequest;
use App\Http\Requests\IncomeUpdateRequest;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::with(['category:id,category_name', 'field:id,field_name'])
            ->latest()
            ->get();
        $categories = IncomeCategory::all();
        $fields = FieldOfIncome::all();

        return view('admin.layouts.pages.income.index', compact('incomes', 'categories', 'fields'));
    }

    public function create()
    {
        $categories = IncomeCategory::select('id', 'category_name')->where('is_active', 1)->get();
        $field_of_incomes = FieldOfIncome::select('id', 'field_name')->where('is_active', 1)->get();
        return view('admin.layouts.pages.income.create', compact('categories', 'field_of_incomes'));
    }

    public function store(IncomeStoreRequest $request)
    {
        $validated = $request->validated();
        Income::create($validated);

        Toastr::success('Income successfully added.');
        return Redirect()->route('income.index');
    }

    public function show($id)
    {
        $income = Income::with(['category', 'field'])->findOrFail($id);

        if (request()->ajax()) {
            return response()->json([
                'date' => $income->date,
                'category' => $income->category,
                'field' => $income->field,
                'description' => $income->description,
                'amount' => $income->amount,
                'income_by' => $income->income_by,
            ]);
        }
        return view('admin.layouts.pages.income.show', compact('income'));
    }

    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $categories = IncomeCategory::select('id', 'category_name')->where('is_active', 1)->get();
        $field_of_incomes = FieldOfIncome::select('id', 'field_name')->where('is_active', 1)->get();
        return view('admin.layouts.pages.income.edit', compact('income', 'categories', 'field_of_incomes'));
    }

    public function update(IncomeUpdateRequest $request, $id)
    {
        $income = Income::findOrFail($id);

        $validated = $request->validated();
        $income->update($validated);

        toastr()->success('Income updated successfully.');
        return redirect()->route('income.index');
    }

    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();

        return response()->json(['success' => 'Income successfully deleted.']);
    }


    public function filter(Request $request)
    {
        $query = Income::with('category', 'field');

        if ($request->from_date) {
            $query->whereDate('date', '>=', $request->from_date);
        }

        if ($request->to_date) {
            $query->whereDate('date', '<=', $request->to_date);
        }

        if ($request->income_by) {
            $query->where('income_by', 'like', '%' . $request->income_by . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->field_id) {
            $query->where('field_id', $request->field_id);
        }

        $incomes = $query->latest()->get();

        $html = view('admin.layouts.pages.income.partials.income_info_filter', compact('incomes'))->render();

        return response()->json(['html' => $html]);
    }



    public function trashedData()
    {
        $incomes = Income::onlyTrashed()->get();
        return view('admin.layouts.pages.income.recycle-bin.all-trashdata', compact('incomes'));
    }

    public function restoreData($id)
    {
        Income::withTrashed()->where('id', $id)->restore();

        return response()->json(['success' => 'Income restored successfully.']);
    }

    public function forceDeleteData($id)
    {
        $income = Income::withTrashed()->where('id', $id)->first();
        $income->forceDelete();

       return response()->json(['success' => 'Income successfully deleted.']);
    }
}
