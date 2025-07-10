@extends('admin.layouts.app')
@section('title', 'All Cost')

@push('styles')

<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">

@endpush


@section('admin_content')

@php
    $countDeletedData = App\Models\Product::onlyTrashed()->get();
@endphp

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4> All cost <span><a href="{{ route('product.trash') }}" class="btn btn-primary text-uppercase" >Recycle Bin ( {{ $countDeletedData->count() }} )</a></span> <span><a href="{{ route('cost.create') }}" class="btn btn-primary text-white text-uppercase text-bold right">
                        + Add Cost
                   </a></span></h4>
                </div>
                <div class="body">
                    <table id="productDataTable" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                            @foreach ($costs as $key=>$cost)
                            <tr>
                                <td>{{$key+1 }}</td>
                                <td>{{ $cost->date }}</td>
								<td>{{ $cost->spend_by ?? 'N/A' }}</td>
								<td>{{ $cost->category->category_name ?? 'N/A' }}</td>
								<td>{{ $cost->field->field_name ?? 'N/A' }}</td>
								<td>{!! $cost->description ?? 'N/A' !!}</td>
								<td>{{ $cost->amount }}</td>
                                <td>

                                    <a href="{{ route('cost.edit', $cost->id) }}" class="btn btn-warning btn-sm"> <i class="material-icons text-white">edit</i></a>

                                    <form class="d-inline-block" action="{{ route('cost.destroy', $cost->id) }}" method="POST">
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
    const productStatusRoute = "{{ route('product.status') }}";
    const csrfToken = "{{ csrf_token() }}";
</script>
<script src="{{ asset('backend') }}/assets/js/product.js"></script>

@endpush
