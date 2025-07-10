@extends('admin.layouts.app')
@section('title', 'Deleted Cost')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush
@section('admin_content')



    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class=""> Deleted Cost ( {{ $costs->count() }} ) <span> <a
                                    href="{{ route('cost.index') }}"
                                    class="btn btn-primary text-white text-bold text-uppercase right">
                                    All Cost
                                </a></span> </h4>
                    </div>
                    <div class="body">
                        <table id="productDataTable"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Spend By</th>
                                    <th>Category</th>
                                    <th>Field of cost</th>
                                    <th style="width: 500px">Description</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($costs as $key => $cost)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cost->date }}</td>
                                        <td>{{ $cost->spend_by ?? 'N/A' }}</td>
                                        <td>{{ $cost->category->category_name ?? 'N/A' }}</td>
                                        <td>{{ $cost->field->field_name ?? 'N/A' }}</td>
                                        <td>{!! $cost->description ?? 'N/A' !!}</td>
                                        <td>{{ $cost->amount }}</td>
                                        <td>
                                            <a href="{{ route('cost.restore', $cost->id) }}"
                                                class="btn btn-primary btn-sm"> Restore </a>

                                            <form class="d-inline-block"
                                                action="{{ route('cost.forceDelete', $cost->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm show_confirm">Permanently delete</button>
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
        $('.show_confirm').click(function(event) {
            let form = $(this).closest('form');
            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Permanently delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });

        });
    </script>
@endpush
