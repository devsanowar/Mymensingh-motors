@extends('admin.layouts.app')
@section('title', 'Visit Logs')
@push('styles')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <style>
        .form-line.case-input {
            border: 1px solid #b8b8b8;
        }
    </style>
@endpush


@section('admin_content')

@php
    $data = json_decode(file_get_contents(storage_path('app/visitor_count.json')), true);
@endphp


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            All Visitors
                            <span style="float:right">
                                Total Visitors: {{ $data['total'] }}
                            </span>
                        </h4>
                    </div>
                    <div class="body">
                        <table id="upazilaDataTable"
                            class="table table-bordered table-striped table-hover dataTable js-exportable">

                            <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>Browser</th>
                                    <th>OS</th>
                                    <th>Device</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Duration (s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->browser }}</td>
                                        <td>{{ $log->platform }}</td>
                                        <td>{{ $log->device }}</td>
                                        <td>{{ $log->country }}</td>
                                        <td>{{ $log->city }}</td>
                                        <td>{{ $log->visit_start }}</td>
                                        <td>{{ $log->visit_end }}</td>
                                        <td>{{ $log->duration }}</td>
                                    </tr>
                                @endforeach
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
    <script>
        const upazilaStatusRoute = "{{ route('upazila.status') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/upazila.js"></script>
@endpush
