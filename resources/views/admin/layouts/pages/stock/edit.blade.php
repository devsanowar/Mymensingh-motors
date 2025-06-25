@extends('admin.layouts.app')
@section('title', 'Edit Stock')
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
                        <h4 class="text-uppercase"> Update Stock for: {{ $product->name }}</h2>

                    </div>
                    <div class="body">

                        <form action="{{ route('admin.stock.update', $product->id) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Current Stock: </label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" class="form-control"
                                            value="{{ $product->stock->quantity ?? 0 }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Change Type</label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <select name="change_type" class="form-control show-tick">
                                            <option value="in">Add Stock</option>
                                            <option value="out">Reduce Stock</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Quantity</label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="number" name="quantity" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Note (optional)</label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea name="note" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">UPDATE STOCK</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- #END# Horizontal Layout -->
    </div>
@endsection
