@extends('admin.layouts.app')
@section('title', 'Trashed Data - Purchase')
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">

                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h4>Recycle Bin (<span id="deletedPurchaseCount">{{ $purchases->count() }}</span>)</h4>

                        <div>
                            <a href="{{ route('purchase.index') }}" class="btn btn-primary">All Purchase</a>
                        </div>
                    </div>
                    <div class="body">
                        
                        <!-- Table -->
                        <table id="purchaseDataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Voucher No</th>
                                    <th>Supplier Name</th>
                                    <th>Total (TK)</th>
                                    <th>Paid (Tk)</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $key => $purchase)
                                    <tr id="purchaseRow-{{ $purchase->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>{{ $purchase->voucher_number }}</td>
                                        <td>{{ $purchase->supplier->supplier_name }}</td>
                                        <td>{{ $purchase->grand_total }}</td>
                                        <td>{{ $purchase->paid_amount }}</td>
                                        <td>{{ $purchase->current_balance }}</td>
                                        <td>
                                            <form class="d-inline-block restore-purchase-form" data-id="{{ $purchase->id }}">
                                                @csrf
                                                <button type="button" class="btn btn-primary btn-sm restore-purchase-btn">
                                                    Restore
                                                </button>
                                            </form>

                                            <form class="d-inline-block permanent-delete-purchase-form" data-id="{{ $purchase->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm permanent-delete-purchase-btn">
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
    <script>
        const deleteTrashedData = "{{ route('purchase.forceDelete', ':id') }}";
        const restorePurchaseData = "{{ route('purchase.restore', ':id') }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/purchase.js"></script>
@endpush