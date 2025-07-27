@extends('admin.layouts.app')
@section('title', 'All Purchase')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link
        href="{{ asset('backend') }}/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <style>
        .filter-form {
            background: #fff;
            border-radius: 5px;
            padding: 20px 20px 12px 20px;
            box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .filter-form h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            color: #333;
        }

        .filter-form .form-control {
            height: 38px;
            font-size: 14px;
        }

        .filter-form .btn {
            height: 38px;
        }


            /* Simple Loading Spinner */
    .loading-spinner {
        text-align: center;
        padding: 20px;
        font-size: 16px;
        font-weight: 500;
        color: #555;
    }
    .loading-spinner i {
        font-size: 22px;
        margin-right: 6px;
        color: #DB1E3D;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }


    </style>
@endpush
@section('admin_content')

    @php
        $countDeletedData = App\Models\Purchase::onlyTrashed()->get();
    @endphp

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">

                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h4>All Purchase Info <span><a href="{{ route('purchase.trash') }}" class="btn btn-primary btn-sm">RECYCLE BIN (<span id="deletedCountNumber">{{ $countDeletedData->count() }}</span>)</a></span></h4>

                        <div>
                            <a href="{{ route('purchase.create') }}" class="btn btn-primary">+ Create Purchase</a>
                        </div>
                    </div>
                    <div class="body">
                        <div class="filter-form mb-3">
                            <form id="purchaseFilterForm" class="form-inline row">
                                <!-- Voucher No -->
                                <div class="form-group mb-2 col-md-2">
                                    <input type="text" name="voucher_no" class="form-control w-100"
                                        placeholder="Voucher No" style="border: 1px solid #ddd">
                                </div>

                                <!-- Supplier Name -->
                                <div class="form-group mb-2 col-md-3">
                                    <select name="supplier_id" class="form-control show-tick w-100">
                                        <option value="">-- Select Supplier Name --</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date From -->
                                <div class="form-group mb-2 col-md-3">
                                    <input type="date" name="from_date" class="form-control w-100" placeholder="From" style="border: 1px solid #ddd">
                                </div>

                                <!-- Date To -->
                                <div class="form-group mb-2 col-md-3">
                                    <input type="date" name="to_date" class="form-control w-100" placeholder="To" style="border: 1px solid #ddd">
                                </div>

                                <!-- Show Button -->
                                <div class="form-group mb-2 col-md-1">
                                    <button type="submit" class="btn btn-primary w-100">Show</button>
                                </div>
                            </form>
                        </div>

                        <!-- Table -->
                        <table id="purchaseDataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Voucher No</th>
                                    <th>Supplier Name</th>
                                    <th>Phone</th>
                                    <th>Total (TK)</th>
                                    <th>Paid (Tk)</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="purchaseTableBody">
                                <!-- AJAX দ্বারা ডেটা আসবে -->
                            </tbody>
                        </table>

                        <!-- Total Section -->
                        <div class="mt-2">
                            <strong>Total Grand Total: </strong><span id="grandTotalSum">0</span> TK |
                            <strong>Total Due: </strong><span id="dueSum">0</span> TK
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script
        src="{{ asset('backend') }}/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>

    <script src="{{ asset('backend') }}/assets/js/pages/forms/basic-form-elements.js"></script>


    <script>
        const csrfToken = "{{ csrf_token() }}";
        const purchaseFilter = "{{ route('purchase.filter') }}";
        const purchaseDeleteUrl = "{{ route('purchase.destroy', ':id') }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/purchase.js"></script>
@endpush
