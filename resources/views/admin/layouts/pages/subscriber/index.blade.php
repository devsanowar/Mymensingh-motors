@extends('admin.layouts.app')
@section('title', 'All Subscriber')

@push('styles')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush


@section('admin_content')


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> All Email</h4>
                    </div>
                    <div class="body">
                        <table id="subscriberDataTable"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($subscribers as $key => $subscriber)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subscriber->phone }}</td>
                                        {{-- <td>

                                            <form class="d-inline-block"
                                                action="{{ route('newslatter.destroy', $subscriber->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="material-icons">delete</i></button>
                                            </form>
                                        </td> --}}
                                        <td>
                                            <button type="button" data-id="{{ $subscriber->id }}"
                                                class="btn btn-danger btn-sm show_confirm">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>

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



    <script>
        $('.show_confirm').click(function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var token = $('meta[name="csrf-token"]').attr('content');
            var row = $(this).closest('tr');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/newsletter/destroy/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire("Deleted!", response.message, "success");
                                row.remove();
                                // Toastr if needed
                                toastr.success(response.message);
                            } else {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        }
                    });
                }
            });
        });



        // Pagelength override scripts
        $.extend(true, $.fn.dataTable.defaults, {
            "pageLength": 20,
            "lengthMenu": [
                [10, 20, 50, 100, -1], 
                [10, 20, 50, 100, "All"]
            ]
        });

        $(document).ready(function() {
            $('#subscriberDataTable').DataTable();
        });
    </script>
@endpush
