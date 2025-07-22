@extends('admin.layouts.app')
@section('title', 'Field of income')
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
                            All Field Of Income
                            <span>
                                <!-- Trigger button -->
                                <button type="button" class="btn btn-primary right" data-toggle="modal"
                                    data-target="#addFieldOfIncomeModal">
                                    Add Field Of Income
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
                                    <th>Income Field Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($field_of_incomes as $key => $field_of_income)
                                    <tr id="field_of_incomeRow-{{ $field_of_income->id }}">
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $field_of_income->field_name }}</td>
                                        <td>
                                            <button data-id="{{ $field_of_income->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $field_of_income->is_active ? 'btn-success' : 'btn-danger' }}">
                                                {{ $field_of_income->is_active ? 'Active' : 'DeActive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm editFieldOfIncome"
                                                data-id="{{ $field_of_income->id }}"
                                                data-name="{{ $field_of_income->field_name }}"
                                                data-status="{{ $field_of_income->is_active }}">
                                                <i class="material-icons text-white">edit</i>
                                            </a>

                                            <form class="d-inline-block delete-field-of-income-form"
                                                data-id="{{ $field_of_income->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm delete-field-of-income-btn">
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

                    @include('admin.layouts.pages.income.income-field.create')

                    @include('admin.layouts.pages.income.income-field.edit')
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
        
        const fieldOfIncometDestroy = "{{ route('field_of_income.destroy', ':id') }}";
        const fieldOfIncomeStatusChangeRoute = "{{ route('field_of_income_status.update') }}";
        const fieldOfIncomeUpdateRoute = "{{ route('field_of_income.update', ':id') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/field_of_income.js"></script>
@endpush
