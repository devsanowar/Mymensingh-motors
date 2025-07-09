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
                                    <tr>
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
                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm editcategory"
                                                data-id="{{ $field_of_cost->id }}" data-name="{{ $field_of_cost->field_name }}"
                                                data-status="{{ $field_of_cost->is_active }}">
                                                <i class="material-icons text-white">edit</i>
                                            </a>

                                            <!-- Delete button -->
                                            <form class="d-inline-block"
                                                action="{{ route('field-of-cost.destroy', $field_of_cost->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-raised bg-danger btn-sm waves-effect show_confirm text-white">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>



                                @empty
                                    <tr>
                                        <td colspan="6">Field of cost not found! :) Please Add field of cost. Thank you</td>
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
        const categoryStatusRoute = "{{ route('cost-category.status') }}";
        const categoryUpdateRoute = "{{ route('cost-category.update', ':id') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/cost_category.js"></script>
@endpush
