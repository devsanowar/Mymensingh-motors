@extends('admin.layouts.app')
@section('title', 'Edit Purchase')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Edit Purchase <span><a href="{{ route('purchase.index') }}"
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
                                    <label for="product_model">Select Product</label>
                                    <select id="product_model" class="form-control show-tick">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-name="{{ $product->product_name }}"
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
                                            <th style="width: 28%">Product</th>
                                            <th style="width: 12%">Qty</th>
                                            <th style="width: 18%">Purchase Price</th>
                                            <th style="width: 18%">Total</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="purchase_items">
                                        @foreach ($purchase->items as $index => $item)
                                            <tr data-row="{{ $index }}">
                                                <td class="sl">{{ $index + 1 }}</td>

                                                {{-- Product (edit করতে চাইলে select দাও; না চাইলে শুধু text + hidden id) --}}
                                                <td>
                                                    <select name="items[{{ $index }}][product_id]"
                                                        class="form-control product_id">
                                                        <option value="">-- Select --</option>
                                                        @foreach ($products as $p)
                                                            <option value="{{ $p->id }}"
                                                                {{ $p->id == $item->product_id ? 'selected' : '' }}>
                                                                {{ $p->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="items[{{ $index }}][id]"
                                                        value="{{ $item->id }}">
                                                </td>

                                                <td>
                                                    <input type="number" step="1" min="0"
                                                        name="items[{{ $index }}][quantity]"
                                                        class="form-control qty" value="{{ $item->quantity }}">
                                                </td>

                                                <td>
                                                    <input type="number" step="0.01" min="0"
                                                        name="items[{{ $index }}][purchase_price]"
                                                        class="form-control price" value="{{ $item->purchase_price }}">
                                                </td>

                                                <td>
                                                    <input type="text" readonly class="form-control row-total"
                                                        value="{{ number_format($item->quantity * $item->purchase_price, 2) }}">
                                                </td>

                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-danger delete-item">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Summary Section --}}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="container mt-4">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label font-weight-bold">Supplier
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ optional($purchase->supplier)->supplier_name ?? 'N/A' }}"
                                                            readonly style="border: 1px solid #ddd">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label font-weight-bold">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ optional($purchase->supplier)->phone ?? 'N/A' }}"
                                                            readonly style="border: 1px solid #ddd">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label font-weight-bold">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ optional($purchase->supplier)->address ?? 'N/A' }}"
                                                            readonly style="border: 1px solid #ddd">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Total</th>
                                            <td>
                                                <input type="text" readonly name="total" id="total"
                                                    class="form-control"
                                                    value="{{ number_format($purchase->total ?? 0, 2) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total Discount</th>
                                            <td>
                                                <input type="number" step="0.01" name="total_discount"
                                                    id="total_discount" class="form-control"
                                                    value="{{ number_format($purchase->total_discount ?? 0, 2, '.', '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Transport Cost</th>
                                            <td>
                                                <input type="number" step="0.01" name="transport_cost"
                                                    id="transport_cost" class="form-control"
                                                    value="{{ number_format($purchase->transport_cost ?? 0, 2, '.', '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Grand Total</th>
                                            <td>
                                                <input type="text" readonly name="grand_total" id="grand_total"
                                                    class="form-control"
                                                    value="{{ number_format($purchase->grand_total ?? 0, 2) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Previous Balance</th>
                                            <td class="d-flex align-items-center">
                                                <input type="text" id="opening_balance_view" class="form-control me-2"
                                                    value="{{ number_format(abs($purchase->previous_balance ?? 0), 2) }}"
                                                    readonly style="margin-right:10px;">

                                                <input type="hidden" name="previous_balance" id="opening_balance_signed"
                                                    value="{{ $purchase->previous_balance ?? 0 }}">

                                                @php
                                                    $balanceType =
                                                        ($purchase->previous_balance ?? 0) >= 0
                                                            ? 'Payable'
                                                            : 'Receivable';
                                                @endphp
                                                <input type="text" name="balance_type" id="balance_type"
                                                    class="form-control text-white {{ $balanceType === 'Payable' ? 'bg-payable' : 'bg-receivable' }}"
                                                    value="{{ $balanceType }}" readonly style="max-width:120px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Paid</th>
                                            <td class="d-flex align-items-center">
                                                <input type="number" step="0.01" name="paid_amount" id="paid_amount"
                                                    class="form-control"
                                                    value="{{ number_format($purchase->paid_amount ?? 0, 2, '.', '') }}"
                                                    style="margin-right:10px">

                                                @php $ps = $purchase->payment_status ?? ''; @endphp
                                                <select name="payment_status" id="payment_status"
                                                    class="form-control show-tick">
                                                    <option value="Paid" {{ $ps == 'Paid' ? 'selected' : '' }}>Paid
                                                    </option>
                                                    <option value="Partial" {{ $ps == 'Partial' ? 'selected' : '' }}>
                                                        Partial</option>
                                                    <option value="Due" {{ $ps == 'Due' ? 'selected' : '' }}>Due
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Current Balance</th>
                                            <td class="d-flex">
                                                <input type="text" id="current_balance_view" class="form-control me-2"
                                                    value="{{ number_format(abs($purchase->current_balance ?? 0), 2) }}"
                                                    readonly style="margin-right:10px;">

                                                @php
                                                    $cbType =
                                                        ($purchase->current_balance ?? 0) >= 0
                                                            ? 'Payable'
                                                            : 'Receivable';
                                                @endphp
                                                <input type="text" id="current_balance_type"
                                                    class="form-control text-white {{ $cbType === 'Payable' ? 'bg-payable' : 'bg-receivable' }}"
                                                    value="{{ $cbType }}" readonly style="max-width:120px;">

                                                <input type="hidden" name="current_balance" id="current_balance_signed"
                                                    value="{{ $purchase->current_balance ?? 0 }}">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            {{-- Row template (hidden) --}}
                            <template id="row_template">
                                <tr data-row="__INDEX__">
                                    <td class="sl"></td>
                                    <td>
                                        <select name="items[__INDEX__][product_id]" class="form-control product_id">
                                            <option value="">-- Select --</option>
                                            @foreach ($products as $p)
                                                <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="items[__INDEX__][id]" value="">
                                    </td>
                                    <td>
                                        <input type="number" step="1" min="0"
                                            name="items[__INDEX__][quantity]" class="form-control qty" value="1">
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0"
                                            name="items[__INDEX__][purchase_price]" class="form-control price"
                                            value="0.00">
                                    </td>
                                    <td>
                                        <input type="text" readonly class="form-control row-total" value="0.00">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger delete-item">Delete</button>
                                    </td>
                                </tr>
                            </template>

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
        (function() {
            const $tbody = $('#purchase_items');
            let rowIndex = {{ $purchase->items->count() }};

            // ---------- Helpers ----------
            const nf = (n) => (parseFloat(n || 0).toFixed(2));

            function renumberSL() {
                $tbody.find('tr').each(function(i) {
                    $(this).find('.sl').text(i + 1);
                });
            }

            function recalcRow($tr) {
                const qty = parseFloat($tr.find('.qty').val()) || 0;
                const price = parseFloat($tr.find('.price').val()) || 0;
                const total = qty * price;
                $tr.find('.row-total').val(nf(total));
                return total;
            }

            function calcPaymentStatus(grandTotal, paid) {
                if (paid >= grandTotal && grandTotal > 0) return 'Paid';
                if (paid > 0 && paid < grandTotal) return 'Partial';
                return 'Due';
            }

            function setBalanceType($el, type) {
                $el.removeClass('bg-payable bg-receivable');
                if (type === 'Payable') {
                    $el.addClass('bg-payable');
                } else {
                    $el.addClass('bg-receivable');
                }
                $el.val(type);
            }

            function recalcSummary() {
                // 1) Sum of rows
                let total = 0;
                $tbody.find('tr').each(function() {
                    total += recalcRow($(this));
                });

                // 2) Discount, transport
                const discount = parseFloat($('#total_discount').val()) || 0;
                const transport = parseFloat($('#transport_cost').val()) || 0;

                // 3) Grand total
                const grandTotal = total - discount + transport;

                // 4) Previous balance
                const prevBal = parseFloat($('#opening_balance_signed').val()) || 0;

                // 5) Paid
                const paid = parseFloat($('#paid_amount').val()) || 0;

                // 6) Current balance = prev + grand - paid
                const current = prevBal + grandTotal - paid;

                // 7) Payment status
                const paymentStatus = calcPaymentStatus(grandTotal, paid);

                // Update fields
                $('#total').val(nf(total));
                $('#grand_total').val(nf(grandTotal));

                $('#current_balance_signed').val(nf(current));
                $('#current_balance_view').val(nf(Math.abs(current)));

                const cbType = current >= 0 ? 'Payable' : 'Receivable';
                setBalanceType($('#current_balance_type'), cbType);

                $('#payment_status').val(paymentStatus);

                // Also update previous balance visual/type if needed
                const prevType = prevBal >= 0 ? 'Payable' : 'Receivable';
                setBalanceType($('#balance_type'), prevType);
                $('#opening_balance_view').val(nf(Math.abs(prevBal)));
            }

            function fixInputNames($tr, idx) {
                $tr.attr('data-row', idx);
                $tr.find('[name]').each(function() {
                    const name = $(this).attr('name');
                    const newName = name.replace(/\[\d+\]/g, '[' + idx + ']');
                    $(this).attr('name', newName);
                });
            }

            // ---------- Events ----------
            // Qty / Price change => recalc
            $(document).on('input', '.qty, .price', function() {
                const $tr = $(this).closest('tr');
                recalcRow($tr);
                recalcSummary();
            });

            // Summary fields change
            $('#total_discount, #transport_cost, #paid_amount').on('input', function() {
                recalcSummary();
            });

            // Delete row
            $(document).on('click', '.delete-item', function() {
                $(this).closest('tr').remove();
                renumberSL();
                recalcSummary();
            });

            // Add row
            $('#add_row').on('click', function() {
                const tpl = $('#row_template').html().replace(/__INDEX__/g, rowIndex);
                const $row = $(tpl);
                $tbody.append($row);
                renumberSL();
                recalcSummary();
                rowIndex++;
            });

            // Product change করলে চাইলে default price বসাতে পারো (যদি তোমার কাছে থাকে)
            // এখানে দেখালাম কীভাবে products array থেকে price বসাতে পারো
            const products = @json(
                $products->map(fn($p) => [
                        'id' => $p->id,
                        'price' => (float) ($p->purchase_price ?? 0),
                    ]));

            $(document).on('change', '.product_id', function() {
                const $tr = $(this).closest('tr');
                const id = parseInt($(this).val());
                const found = products.find(p => p.id === id);
                if (found) {
                    $tr.find('.price').val(nf(found.price));
                }
                recalcRow($tr);
                recalcSummary();
            });

            // Initial calc
            $(document).ready(function() {
                recalcSummary();
            });
        })();
    </script>
    <script src="{{ asset('backend') }}/assets/js/purchase.js"></script>
@endpush




{{-- @push('scripts')
    <script>
        const purchaseStoreRoute = "{{ route('purchase.store') }}";
        const supplierBalanceUrl = "{{ url('/admin/get-supplier-balance') }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/purchase.js"></script>
@endpush --}}
