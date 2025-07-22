<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FieldOfIncome;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\FieldOfIncomeStoreRequest;
use App\Http\Requests\FieldOfIncomeUpdateRequest;

class FieldOfIncomeController extends Controller
{
    public function index(){
        $field_of_incomes = FieldOfIncome::latest()->get();
        return view('admin.layouts.pages.income.income-field.index', compact('field_of_incomes'));
    }

    public function store(FieldOfIncomeStoreRequest $request){
        FieldOfIncome::create($request->validated());
        Toastr::success('Field of income added.');
        return Redirect()->route('field_of_income.index');
    }

    public function update(FieldOfIncomeUpdateRequest $request, $id){
        $field_of_income = FieldOfIncome::findOrFail($id);

        $field_of_income->update([
            'field_name' => $request->field_name,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Field of income Updated Successfully');
        return Redirect()->route('field_of_income.index');
    }


    public function destroy(string $id)
    {
        $field_of_income = FieldOfIncome::findOrFail($id);

        // if ($field_of_income->costs()->count() > 0) {
        //     return response()->json(
        //         [
        //             'error' => 'You can\'t delete this field of income because it has related costs.',
        //         ],
        //         400,
        //     );
        // }

        $field_of_income->delete();

        return response()->json([
            'success' => 'Field of income deleted successfully.',
        ]);
    }


    public function changeFieldOfIncomeStatus(Request $request)
    {
        $field_of_income = FieldOfIncome::find($request->id);

        if (!$field_of_income) {
            return response()->json(['status' => false, 'message' => 'Field of cost not found.']);
        }

        $field_of_income->is_active = !$field_of_income->is_active;
        $field_of_income->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $field_of_income->is_active ? 'Active' : 'DeActive',
            'class' => $field_of_income->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }


}
