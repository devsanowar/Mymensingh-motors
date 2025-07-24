@extends('admin.layouts.app')
@section('title', 'All Purchase')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link href="{{ asset('backend') }}/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">

                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h4>All Purchase Info</h4>
                        
                        <div>
                            <a href="{{ route('purchase.create') }}" class="btn btn-primary">+ Create Purchase</a>
                        </div>
                    </div>
                    <div class="body">
                        <table id="purchaseDataTable" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="purchaseTableBody">

                            </tbody>
                        </table>
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
    <script src="{{ asset('backend') }}/assets/js/purchase.js"></script>
@endpush