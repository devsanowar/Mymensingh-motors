@extends('admin.layouts.app')
@section('title', 'Deleted Income')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush
@section('admin_content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class=""> Deleted Income (<span id="deletedIncomeCount">{{ $incomes->count() }}</span>) <span> <a
                                    href="{{ route('income.index') }}"
                                    class="btn btn-primary text-white text-bold text-uppercase right">
                                    All Income
                                </a></span> </h4>
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
                                    <th>Field of cost</th>
                                    <th style="width: 500px">Description</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
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

                                            <form class="d-inline-block restore-income-form" data-id="{{ $income->id }}">
                                                @csrf
                                                <button type="button" class="btn btn-primary btn-sm restore-income-btn">
                                                    Restore
                                                </button>
                                            </form>

                                            <form class="d-inline-block permanent-delete-income-form" data-id="{{ $income->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm permanent-delete-income-btn">
                                                    Permanently Delete
                                                </button>
                                            </form>
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
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>



    <script>

        const deleteTrashedData = "{{ route('income.forceDelete', ':id') }}";
        const restoreIncomeData = "{{ route('income.restore', ':id') }}";

    </script>

    <script src="{{ asset('backend') }}/assets/js/income.js"></script>
@endpush
