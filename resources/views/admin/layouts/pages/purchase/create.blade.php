@extends('admin.layouts.app')
@section('title', 'Create Purchase')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Create Purchase <span><a href="{{ route('purchase.index') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> All Purchase
                                </a></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="purchaseForm" method="POST">
                            @csrf

                            {{-- Top Section --}}
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="purchase_date">Date</label>
                                    <input type="date" name="purchase_date" class="form-control"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="supplier_id">Supplier</label>
                                    <select name="supplier_id" class="form-control show-tick" required>
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="voucher_number">Voucher No</label>
                                    <input type="text" name="voucher_number" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="product_model">Select Product</label>
                                    <select id="product_model" class="form-control show-tick">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-name="{{ $product->product_name }}"
                                                data-model="{{ $product->model }}"
                                                data-price="{{ $product->purchase_price }}">
                                                {{ $product->product_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Items Table --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" id="items_table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            {{-- <th>Model</th> --}}
                                            <th>Qty</th>
                                            <th>Purchase Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="purchase_items"></tbody>
                                </table>
                            </div>

                            {{-- Summary Section --}}
                            <div class="row">
                                <div class="col-md-4 offset-md-8">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Total</th>
                                            <td><input type="text" readonly name="total" id="total"
                                                    class="form-control" value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <th>Total Discount</th>
                                            <td><input type="number" step="0.01" name="total_discount"
                                                    id="total_discount" class="form-control" value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <th>Transport Cost</th>
                                            <td><input type="number" step="0.01" name="transport_cost"
                                                    id="transport_cost" class="form-control" value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <th>Grand Total</th>
                                            <td><input type="text" readonly name="grand_total" id="grand_total"
                                                    class="form-control" value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <th>Previous Balance</th>
                                            <td class="d-flex align-items-center">
                                                <!-- Visible (minus ছাড়া দেখাবে) -->
                                                <input type="text" id="opening_balance_view" class="form-control me-2"
                                                    value="0.00" readonly style="margin-right:10px;">

                                                <!-- Hidden (signed ভ্যালু সাবমিট হবে / ক্যালকুলেশনে ব্যবহার হবে) -->
                                                <input type="hidden" name="previous_balance" id="opening_balance_signed"
                                                    value="0">

                                                <!-- Balance type -->
                                                <input type="text" name="balance_type" id="balance_type"
                                                    class="form-control text-white" value="Payable" readonly
                                                    style="max-width:120px;">
                                            </td>
                                        </tr>



                                        <tr>
                                            <th>Paid</th>
                                            <td class="d-flex align-items-center">
                                                <input type="number" step="0.01" name="paid_amount" id="paid_amount"
                                                    class="form-control" value="0.00" style="margin-right:10px">
                                                
                                                <select name="payment_status" id="payment_status" class="form-control show-tick">
                                                    <option value="Paid">Paid</option>
                                                    <option value="Partial">Partial</option>
                                                    <option value="Due">Due</option>
                                                </select>
                                                </td>
                                        </tr>
                                        <tr>
                                            <th>Current Balance</th>
                                            <td class="d-flex">
                                                <!-- Visible current balance -->
                                                <input type="text" id="current_balance_view" class="form-control me-2"
                                                    value="0.00" readonly style="margin-right:10px;">

                                                <!-- Current balance type -->
                                                <input type="text" id="current_balance_type"
                                                    class="form-control text-white" value="Payable" readonly
                                                    style="max-width:120px;">

                                                <!-- Hidden signed value for form submit -->
                                                <input type="hidden" name="current_balance" id="current_balance_signed"
                                                    value="0">
                                            </td>
                                        </tr>

                                        {{-- <tr>
                                            <th>Payment Status</th>
                                            <td>
                                                <select name="payment_status" id="" class="form-control show-tick">
                                                    <option value="Paid">Paid</option>
                                                    <option value="Partial">Partial</option>
                                                    <option value="Due">Due</option>
                                                </select>
                                            </td>
                                        </tr> --}}
                                    </table>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary right" id="submitBtn">
                                    <span id="submitBtnText">Save Purchase</span></span>
                                    <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







@push('scripts')

<script>
    const purchaseStoreRoute = "{{ route('purchase.store') }}";
        const supplierBalanceUrl = "{{ url('/admin/get-supplier-balance') }}";
</script>
<script src="{{ asset('backend') }}/assets/js/purchase.js"></script>
@endpush
