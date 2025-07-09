@extends('admin.layouts.app')
@section('title', 'Field of cost')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush

@section('admin_content')
    <div class="container-fluid">
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-uppercase">
                            All Field Of Cost
                            <span>
                                <!-- Trigger button -->
                                <button type="button" class="btn btn-primary right" data-toggle="modal"
                                    data-target="#addFieldOfCostModal">
                                    Add Field Of Cost
                                </button>
                            </span>
                        </h4>
                    </div>

                    @if (session('success'))
                        <script>
                            toastr.success("{{ session('success') }}", 'Success', {
                                timeOut: 3000,
                                closeButton: true,
                                progressBar: true
                            });
                        </script>
                    @endif

                    @if (session('error'))
                        <script>
                            toastr.error("{{ session('error') }}", 'Error', {
                                timeOut: 5000,
                                closeButton: true,
                                progressBar: true
                            });
                        </script>
                    @endif



                    <div class="body table-responsive">
                        <table class="table table-positioned table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cost Field Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($field_of_costs as $key => $field_of_cost)
                                    <tr id="field_of_costRow-{{ $field_of_cost->id }}">
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $field_of_cost->field_name }}</td>
                                        <td>
                                            <button data-id="{{ $field_of_cost->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $field_of_cost->is_active ? 'btn-success' : 'btn-danger' }}">
                                                {{ $field_of_cost->is_active ? 'Active' : 'DeActive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm editFieldOfCost"
                                                data-id="{{ $field_of_cost->id }}"
                                                data-name="{{ $field_of_cost->field_name }}"
                                                data-status="{{ $field_of_cost->is_active }}">
                                                <i class="material-icons text-white">edit</i>
                                            </a>

                                            <!-- Delete button -->
                                            {{-- <form class="d-inline-block"
                                                action="{{ route('field-of-cost.destroy', $field_of_cost->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-raised bg-danger btn-sm waves-effect show_confirm text-white">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form> --}}

                                            <form class="d-inline-block delete-field-of-cost-form"
                                                data-id="{{ $field_of_cost->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm delete-field-of-cost-btn">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>


                                        </td>
                                    </tr>



                                @empty
                                    <tr>
                                        <td colspan="6">Field of cost not found! :) Please Add field of cost. Thank you
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    @include('admin.layouts.pages.cost.field-of-cost.create')

                    @include('admin.layouts.pages.cost.field-of-cost.edit')
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Horizontal Layout -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>


    <script>
        $(document).ready(function() {
            $(".delete-field-of-cost-btn").click(function(e) {
                e.preventDefault();

                const button = $(this);
                const form = button.closest(".delete-field-of-cost-form");
                const fieldOfCostId = form.data("id");
                const deleteUrl = "{{ route('field-of-cost.destroy', ':id') }}".replace(':id',
                    fieldOfCostId);
                const csrfToken = form.find('input[name="_token"]').val();

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will delete the field of cost permanently.",
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
                                    $("#field_of_costRow-" + fieldOfCostId).remove();
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

        const fieldOfCostStatusChangeRoute = "{{ route('field-of-cost.status') }}";
        const fieldOfCostUpdateRoute = "{{ route('field-of-cost.update', ':id') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/field_of_cost.js"></script>
@endpush
