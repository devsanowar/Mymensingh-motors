<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::select(['id','supplier_name','contact_person','phone','email','opening_balance','address','is_active'])->get();
        return view('admin.layouts.pages.supplier.index', compact('suppliers'));
    }

    public function create(){
        return view('admin.layouts.pages.supplier.create');
    }

    public function store(SupplierStoreRequest $request){
        Supplier::create([
            'supplier_name'   => $request->supplier_name,
            'contact_person'  => $request->contact_person,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'address'         => $request->address,
            'opening_balance' => $request->opening_balance ?? 0,
            'is_active'       => $request->is_active,
        ]);
        return Redirect()->route('supplier.index');
    }

    public function edit($id){
        $supplier = Supplier::findOrFail($id);
        return view('admin.layouts.pages.supplier.edit', compact('supplier'));
    }

    public function update(SupplierUpdateRequest $request, $id){
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'supplier_name'   => $request->supplier_name,
            'contact_person'  => $request->contact_person,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'address'         => $request->address,
            'opening_balance' => $request->opening_balance ?? 0,
            'is_active'       => $request->is_active,
        ]);
        Toastr::success('Supplier Updated Successfully.');
        return Redirect()->route('supplier.index');
    }


    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return response()->json(['success' => 'Supplier successfully deleted.']);
    }


    public function supplierChangeStatus(Request $request)
    {
        $supplier = Supplier::find($request->id);

        if (!$supplier) {
            return response()->json(['status' => false, 'message' => 'Supplier not found.']);
        }

        $supplier->is_active = !$supplier->is_active;
        $supplier->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $supplier->is_active ? 'Active' : 'DeActive',
            'class' => $supplier->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }


}
