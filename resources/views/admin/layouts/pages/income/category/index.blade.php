@extends('admin.layouts.app')
@section('title', 'Income Category')
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
                            All Categories
                            <span>
                                <!-- Trigger button -->
                                <button type="button" class="btn btn-primary right" data-toggle="modal"
                                    data-target="#addCategoryModal">
                                    Add Category
                                </button>
                            </span>
                        </h4>
                    </div>

                    @if (session('error'))
                        <div style="width: 60%; margin:20px auto" class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif



                    <div class="body table-responsive">
                        <table class="table table-positioned table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $key => $category)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <button data-id="{{ $category->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $category->is_active ? 'btn-success' : 'btn-danger' }}">
                                                {{ $category->is_active ? 'Active' : 'DeActive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm editcategory"
                                                data-id="{{ $category->id }}" data-name="{{ $category->category_name }}"
                                                data-status="{{ $category->is_active }}">
                                                <i class="material-icons text-white">edit</i>
                                            </a>

                                            <!-- Delete button -->
                                            <form class="d-inline-block"
                                                action="{{ route('income_category.destroy', $category->id) }}"
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
                                        <td colspan="6">Category Not Found! :) Please Add Category. Thank you</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    @include('admin.layouts.pages.income.category.create')

                    @include('admin.layouts.pages.income.category.edit')
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
            setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 5000);
        });
    </script>


    <script>
        const categoryStatusRoute = "{{ route('income_category_status.update') }}";
        const categoryUpdateRoute = "{{ route('income_category.update', ':id') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/income_category.js"></script>
@endpush
