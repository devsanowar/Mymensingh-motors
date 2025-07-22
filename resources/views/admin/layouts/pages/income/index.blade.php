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
            padding-top: 6px !important;
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
    </style>
@endpush


@section('admin_content')

    @php
        $countDeletedData = App\Models\Cost::onlyTrashed()->get();
    @endphp

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> All Income <span><a href="{{ route('cost.trash') }}"
                                    class="btn btn-primary text-uppercase">Recycle Bin ( {{ $countDeletedData->count() }}
                                    )</a></span> <span><a href="{{ route('income.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">
                                    + Add Income
                                </a></span></h4>
                    </div>

                    <div class="body">
                        
                        <table id="productDataTable"
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

                            <tbody id="costTableBody">
                                @foreach ($incomes as $key => $income)
                                    <tr id="incomeRow-{{ $income->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $income->date }}</td>
                                        <td>{{ $income->income_by ?? 'N/A' }}</td>
                                        <td>{{ $income->category->category_name ?? 'N/A' }}</td>
                                        <td>{{ $income->field->field_name ?? 'N/A' }}</td>
                                        <td>{!! $income->description ?? 'N/A' !!}</td>
                                        <td>{{ $income->amount }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm view-cost-btn"
                                                data-id="{{ $income->id }}"><i
                                                    class="material-icons text-white">visibility</i> </a>

                                            <a href="{{ route('income.edit', $income->id) }}" class="btn btn-warning btn-sm">
                                                <i class="material-icons text-white">edit</i></a>

                                            {{-- <form class="d-inline-block" action=""
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="material-icons">delete</i></button>
                                            </form> --}}

                                            <form class="d-inline-block delete-income-form"
                                                data-id="{{ $income->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm delete-income-btn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('admin.layouts.pages.cost.show')
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


        $(document).ready(function() {
            $(".delete-income-btn").click(function(e) {
                e.preventDefault();

                const button = $(this);
                const form = button.closest(".delete-income-form");
                const fieldOfCostId = form.data("id");
                const deleteUrl = "{{ route('income.destroy', ':id') }}".replace(':id',
                    fieldOfCostId);
                const csrfToken = form.find('input[name="_token"]').val();

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will delete the field of income permanently.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: "POST",
                            data: {
                                _token: csrfToken,
                                _method: "DELETE"
                            },
                            success: function(response) {
                                console.log(response);

                                if (response.success) {
                                    Swal.fire("Deleted!", response.success, "success");
                                    $("#incomeRow-" + fieldOfCostId).remove();
                                } else if (response.error) {
                                    Swal.fire("Error!", response.error, "error");
                                } else {
                                    Swal.fire("Error!", "Deletion failed.", "error");
                                }
                            },
                            error: function(xhr) {
                                let errorMsg = "Something went wrong.";
                                if (xhr.responseJSON && xhr.responseJSON.error) {
                                    errorMsg = xhr.responseJSON.error;
                                }
                                Swal.fire("Error!", errorMsg, "error");
                                console.error(xhr.responseText);
                            }

                        });
                    }
                });
            });
        });



        $(document).ready(function() {
            $('.view-cost-btn').click(function(e) {
                e.preventDefault();

                var costId = $(this).data('id');

                $.ajax({
                    url: '/admin/cost/' + costId, // Resource route show()
                    type: 'GET',
                    success: function(data) {
                        $('#cost-date').text(data.date);
                        $('#cost-category').text(data.category ? data.category.category_name :
                            'N/A');
                        $('#cost-field').text(data.field ? data.field.field_name : 'N/A');
                        $('#cost-description').text(data.description);
                        $('#cost-amount').text(data.amount);
                        $('#cost-spend-by').text(data.spend_by);

                        $('#costDetailsModal').modal('show');
                    },
                    error: function() {
                        alert('Could not load cost details.');
                    }
                });
            });
        });


    </script>

    {{-- <script src="{{ asset('backend') }}/assets/js/cost.js"></script> --}}
@endpush
