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
                        <form action="{{ route('purchase.store') }}" method="POST" id="purchaseForm">
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
                                                {{ $product->product_name }} - {{ $product->model }}
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
                                            <th>Model</th>
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
                                            <td><input type="text" step="0.01" name="opening_balance"
                                                    id="opening_balance" class="form-control" value="0.00" readonly></td>
                                        </tr>
                                        <tr>
                                            <th>Paid</th>
                                            <td><input type="number" step="0.01" name="paid_amount" id="paid_amount"
                                                    class="form-control" value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <th>Current Balance</th>
                                            <td><input type="text" readonly name="current_balance" id="current_balance"
                                                    class="form-control" value="0.00"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">SAVE PURCHASE</button>
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
    let openingBalance = 0;

    document.addEventListener('DOMContentLoaded', function () {
        const supplierSelect = document.querySelector('select[name="supplier_id"]');
        const productSelect = document.getElementById('product_model');
        const totalDiscount = document.getElementById('total_discount');
        const transportCost = document.getElementById('transport_cost');
        const paidAmount = document.getElementById('paid_amount');

        // ✅ Supplier change event
        supplierSelect.addEventListener('change', function () {
            const supplierId = this.value;
            if (!supplierId) return;

            fetch(`/admin/get-supplier-balance/${supplierId}`)
                .then(res => res.json())
                .then(data => {
                    // ✅ Updated key from opening_balance to previous_balance
                    openingBalance = parseFloat(data.previous_balance) || 0;
                    document.getElementById('opening_balance').value = openingBalance.toFixed(2);
                    calculateTotals();
                });
        });

        // ✅ Product select event
        productSelect.addEventListener('change', function () {
            const option = this.options[this.selectedIndex];
            if (!option.value) return;

            const productName = option.dataset.name;
            const productModel = option.dataset.model;
            const purchasePrice = parseFloat(option.dataset.price) || 0;

            const rowCount = document.querySelectorAll('#purchase_items tr').length + 1;

            const row = `<tr>
                            <td>${rowCount}</td>
                            <td>${productName}<input type="hidden" name="products[][id]" value="${option.value}"></td>
                            <td>${productModel}</td>
                            <td><input type="number" name="products[][qty]" class="form-control qty" value="1" min="1"></td>
                            <td><input type="number" name="products[][price]" class="form-control price" value="${purchasePrice.toFixed(2)}"></td>
                            <td><input type="text" class="form-control row-total" readonly value="${purchasePrice.toFixed(2)}"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                        </tr>`;

            document.getElementById('purchase_items').insertAdjacentHTML('beforeend', row);
            productSelect.selectedIndex = 0;
            calculateTotals();
        });

        // ✅ Quantity or price change event
        document.getElementById('purchase_items').addEventListener('input', function (e) {
            if (e.target.classList.contains('qty') || e.target.classList.contains('price')) {
                const row = e.target.closest('tr');
                const qty = parseFloat(row.querySelector('.qty').value) || 0;
                const price = parseFloat(row.querySelector('.price').value) || 0;
                row.querySelector('.row-total').value = (qty * price).toFixed(2);
                calculateTotals();
            }
        });

        // ✅ Remove row
        document.getElementById('purchase_items').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
                calculateTotals();
            }
        });

        // ✅ When discount/transport/paid changes
        [totalDiscount, transportCost, paidAmount].forEach(input => {
            input.addEventListener('input', calculateTotals);
        });
    });

    function calculateTotals() {
        let total = 0;

        document.querySelectorAll('.row-total').forEach(input => {
            total += parseFloat(input.value) || 0;
        });

        const discount = parseFloat(document.getElementById('total_discount').value) || 0;
        const transport = parseFloat(document.getElementById('transport_cost').value) || 0;
        const paid = parseFloat(document.getElementById('paid_amount').value) || 0;

        const grandTotal = total - discount + transport;
        const currentBalance = grandTotal + openingBalance - paid;

        document.getElementById('total').value = total.toFixed(2);
        document.getElementById('grand_total').value = grandTotal.toFixed(2);
        document.getElementById('current_balance').value = currentBalance.toFixed(2);
    }
</script>

@endpush

