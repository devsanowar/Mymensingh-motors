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
        let openingBalanceSigned = 0; // signed value (receivable হলে negative)
        let productIndex = 0;

        $(document).ready(function() {
            const supplierSelect = $('select[name="supplier_id"]');
            const productSelect = $('#product_model');
            const totalDiscount = $('#total_discount');
            const transportCost = $('#transport_cost');
            const paidAmount = $('#paid_amount');

            supplierSelect.on('change', function() {
                const supplierId = $(this).val();
                if (!supplierId) return;

                $.ajax({
                    url: `/admin/get-supplier-balance/${supplierId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        openingBalanceSigned = parseFloat(data.previous_balance) || 0;

                        $('#opening_balance_view').val(Math.abs(openingBalanceSigned).toFixed(
                            2));

                        $('#opening_balance_signed').val(openingBalanceSigned);

                        const t = (data.balance_type || 'payable').toLowerCase();
                        const nice = t.charAt(0).toUpperCase() + t.slice(1);
                        const $bt = $('#balance_type');

                        $bt.val(nice);

                        if (t === 'receivable') {
                            $bt.css({
                                backgroundColor: 'red',
                                color: 'white'
                            });
                        } else {
                            $bt.css({
                                backgroundColor: 'green',
                                color: 'white'
                            });
                        }

                        calculateTotals();
                    },
                    error: function(xhr) {
                        console.error("Error loading supplier balance:", xhr.responseText);
                    }
                });
            });


            productSelect.on('change', function() {
                const option = $(this).find('option:selected');
                if (!option.val()) return;

                const productId = option.val();

                if ($(`#purchase_items input[type="hidden"][value="${productId}"]`).length) {
                    $(this).prop('selectedIndex', 0);
                    return;
                }

                const productName = option.data('name');
                const productModel = option.data('model');
                const purchasePrice = parseFloat(option.data('price')) || 0;

                const sl = $('#purchase_items tr').length + 1;
                const idx = productIndex++;

                const row = `<tr data-idx="${idx}">
                            <td class="sl">${sl}</td>
                            <td>
                                ${productName}
                                <input type="hidden" name="products[${idx}][id]" value="${productId}">
                            </td>
                            <td>${productModel}</td>
                            <td>
                                <input type="number" name="products[${idx}][qty]" class="form-control qty" value="1" min="1">
                            </td>
                            <td>
                                <input type="number" name="products[${idx}][price]" class="form-control price" value="${purchasePrice.toFixed(2)}" step="0.01" min="0">
                            </td>
                            <td>
                                <input type="text" class="form-control row-total" readonly value="${purchasePrice.toFixed(2)}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                            </td>
                        </tr>`;

                $('#purchase_items').append(row);
                productSelect.prop('selectedIndex', 0);
                calculateTotals();
            });


            $('#purchase_items').on('input', '.qty, .price', function() {
                const row = $(this).closest('tr');
                const qty = parseFloat(row.find('.qty').val()) || 0;
                const price = parseFloat(row.find('.price').val()) || 0;
                row.find('.row-total').val((qty * price).toFixed(2));
                calculateTotals();
            });

            $('#purchase_items').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                reindexSL();
                calculateTotals();
            });

            totalDiscount.on('input', calculateTotals);
            transportCost.on('input', calculateTotals);
            paidAmount.on('input', calculateTotals);
        });

        function reindexSL() {
            $('#purchase_items tr').each(function(i) {
                $(this).find('.sl').text(i + 1);
            });
        }



        function calculateTotals() {
            let total = 0;

            $('.row-total').each(function() {
                total += parseFloat($(this).val()) || 0;
            });

            const discount = parseFloat($('#total_discount').val()) || 0;
            const transport = parseFloat($('#transport_cost').val()) || 0;
            const paid = parseFloat($('#paid_amount').val()) || 0;

            const grandTotal = total - discount + transport;
            const currentBalance = grandTotal + openingBalanceSigned - paid;

            $('#total').val(total.toFixed(2));
            $('#grand_total').val(grandTotal.toFixed(2));

            $('#current_balance_signed').val(currentBalance.toFixed(2));

            $('#current_balance_view').val(Math.abs(currentBalance).toFixed(2));

            const balanceTypeField = $('#current_balance_type');
            if (currentBalance < 0) {
                balanceTypeField.val('Receivable')
                    .css('background-color', 'red')
                    .css('color', 'white');
            } else {
                balanceTypeField.val('Payable')
                    .css('background-color', 'green')
                    .css('color', 'white');
            }
        }
    </script>
@endpush
