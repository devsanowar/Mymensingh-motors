@extends('admin.layouts.app')
@section('title', 'Supplier')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

@endpush


@section('admin_content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> All Supplier
                            <span><a href="{{ route('supplier.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">
                                    + Add Supplier
                                </a></span>
                        </h4>
                    </div>

                    <div class="body">

                        <table id="supplierDataTable"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Supplier Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Opening Balance</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($suppliers as $key => $supplier)
                                <tr id="supplierRow-{{ $supplier->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $supplier->supplier_name ?? 'N/A' }}</td>
                                    <td>{{ $supplier->contact_person ?? 'N/A' }}</td>
                                    <td>{{ $supplier->phone ?? 'N/A' }}</td>
                                    <td>{{ $supplier->email ?? 'N/A' }}</td>
                                    <td>{{ $supplier->opening_balance ?? 'N/A' }}</td>
                                    <td>{!! $supplier->address ?? 'N/A' !!}</td>
                                    <td>
                                        <button data-id="{{ $supplier->id }}" class="btn btn-sm status-toggle-btn {{ $supplier->is_active ? 'btn-success' : 'btn-danger' }}">
                                        {{ $supplier->is_active ? 'Active' : 'DeActive' }}
                                        </button>
                                    </td>
                                    <td>

                                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm">
                                            <i class="material-icons text-white">edit</i></a>


                                        <form class="d-inline-block delete-supplier-form" data-id="{{ $supplier->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-supplier-btn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>





@push('scripts')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>


    <script>
        const deleteSupplierData = "{{ route('supplier.destroy', ':id') }}";
        const supplierStatusRoute = "{{ route('supplier.status') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('backend') }}/assets/js/supplier.js"></script>
@endpush

@endsection