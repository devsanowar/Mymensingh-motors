@extends('admin.layouts.app')
@section('title', 'All Income')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />


    <style>
        .filter-form {
            margin-bottom: 10px;
            margin-top: 0px;
            padding-top: 12px !important;
            padding-bottom: 6px !important;
        }

        .filter-form input[type="date"]::-webkit-calendar-picker-indicator {
            padding: 10px 12px;
            border-left: 1px solid #ced4da;
            background-color: #f8f9fa;
            margin-right: -12px;
            cursor: pointer;
        }


        input[type="date"]::-webkit-calendar-picker-indicator {
            padding: 10px 12px;
            border-left: 1px solid #ced4da;
            background-color: #f8f9fa;
            cursor: pointer;
            margin-right: 4px;
        }


        input[type="date"]::-webkit-calendar-picker-indicator:focus {
            outline: none;
        }


        @media (max-width: 991.98px) {
            .filter-form {
                flex-wrap: wrap;
            }
        }

        #filterForm .form-group,
        #filterForm>div {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        #filterForm label {
            white-space: nowrap;
            margin-bottom: 0;
            min-width: 70px;
        }

        #filterForm .form-control {
            flex: 1;
        }
    </style>
@endpush


@section('admin_content')

    @php
        $countDeletedData = App\Models\Income::onlyTrashed()->get();
    @endphp

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> All Income <span><a href="{{ route('income.trash') }}" class="btn btn-primary text-uppercase">
                                    Recycle Bin (<span id="deletedCountNumber">{{ $countDeletedData->count() }}</span>)
                                </a></span>
                            <span><a href="{{ route('income.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">
                                    + Add Income
                                </a></span>
                        </h4>
                    </div>

                    <div class="body">

                        <form id="filterForm" method="GET"
                            class="border rounded shadow-sm d-flex align-items-end filter-form flex-wrap">

                            <!-- From Date -->
                            <div class="col-md-3">
                                <label for="from_date" class="mr-2">From</label>
                                <input type="date" name="from_date" id="from_date" class="form-control"
                                    value="{{ request('from_date') }}">
                            </div>

                            <!-- To Date -->
                            <div class="col-md-3">
                                <label for="to_date" class="mr-2">To</label>
                                <input type="date" name="to_date" id="to_date" class="form-control"
                                    value="{{ request('to_date') }}">
                            </div>

                            <!-- Spend By -->
                            <div class="col-md-3">
                                <label for="income_by"><b>Income By</b></label>
                                <input type="text" name="income_by" id="income_by" class="form-control"
                                    value="{{ request('income_by') }}" placeholder="Enter Name">
                            </div>

                            <!-- Category -->
                            <div class="col-md-3">
                                <label for="category_id"><b>Category</b></label>
                                <select name="category_id" id="category_id" class="form-control show-tick">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Field -->
                            <div class="col-md-3">
                                <label for="field_id"><b>Field</b></label>
                                <select name="field_id" id="field_id" class="form-control show-tick">
                                    <option value="">-- Select Field --</option>
                                    @foreach ($fields as $field)
                                        <option value="{{ $field->id }}">{{ $field->field_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" class="btn btn-secondary" id="resetBtn">Reset</button>
                            </div>
                        </form>

                        <table id="incomeDataTable"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Income By</th>
                                    <th>Category</th>
                                    <th>Field of Income</th>
                                    <th style="width: 500px">Description</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="incomeTableBody">
                                @include('admin.layouts.pages.income.partials.income_info_filter')
                            </tbody>
                        </table>
                        @include('admin.layouts.pages.income.show')
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>


    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>


    <script>
        const incomeFilterUrl = "{{ route('income.filter') }}";
        const deleteIncomeData = "{{ route('income.destroy', ':id') }}";
        const showIncomeData = '/admin/income/show/';
    </script>

    <script src="{{ asset('backend') }}/assets/js/income.js"></script>
@endpush
