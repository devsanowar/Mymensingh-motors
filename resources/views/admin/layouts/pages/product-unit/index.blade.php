@extends('admin.layouts.app')
@section('title', 'All Units')

@push('styles')

<!-- JQuery DataTable Css -->
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
                    <h4>
                        All Unit
                        <span>
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-warning text-white text-uppercase text-bold right" data-toggle="modal" data-target="#addProductUnitModal">
                                + Add New
                            </button>
                        </span>
                    </h4>
                </div>
                <div class="body">
                    <table id="districtDataTable" class="table table-bordered table-striped table-hover dataTable js-exportable" >
                        <thead>
                            <tr>
                                <th style="width: 60px">S/N</th>
                                <th>Full Name</th>
                                <th>Short Name</th>
                                <th>Description</th>
                                <th style="width: 60px">Status</th>
                                <th style="width: 160px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($units as $key=>$unit)
                            <tr id="unitRow-{{ $unit->id }}">
                                <td>{{ $key+1 }}</td>
                                <td class="unit-fullname">{{ $unit->fullname }}</td>
                                <td class="unit-short_name">{{ $unit->short_name }}</td>
                                <td class="unit-description">{{ Str::limit($unit->description, 30, '...') }}</td>

                                <td>
                                    <button data-id="{{ $unit->id }}" class="btn btn-sm status-toggle-btn {{ $unit->is_active ? 'btn-success' : 'btn-danger' }}">
                                        {{ $unit->is_active ? 'Active' : 'DeActive' }}
                                    </button>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm editDistrict"
                                       data-id="{{ $unit->id }}"
                                       data-name="{{ $unit->fullname }}"
                                       data-shortname="{{ $unit->short_name }}"
                                       data-description="{{ $unit->description }}"
                                       data-status="{{ $unit->is_active }}">
                                        <i class="material-icons text-white">edit</i>
                                    </a>

                                    <form class="d-inline-block" action="{{ route('district.destroy',$unit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="material-icons">delete</i></button>
                                    </form>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!--Add District Bootstrap Modal -->
                @include('admin.layouts.pages.product-unit.create')


                <!-- Edit District Modal -->
                @include('admin.layouts.pages.product-unit.edit')




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



 <!-- Script For status change -->
 {{-- <script>
    const districtStatusRoute = "{{ route('district.status') }}";
    const csrfToken = "{{ csrf_token() }}";
</script> --}}
<script src="{{ asset('backend') }}/assets/js/product_unit.js"></script>

@endpush





