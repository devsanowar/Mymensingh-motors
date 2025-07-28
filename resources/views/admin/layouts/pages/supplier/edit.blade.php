@extends('admin.layouts.app')
@section('title', 'Edit Supplier')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <style>
        input.form-control,
        select.form-control,
        textarea.form-control {
            border: 1px solid #ddd !important;
        }
    </style>
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Edit Supplier <span><a href="{{ route('supplier.index') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> All Supplier
                                </a></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('supplier.update', $supplier->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Company Name -->
                            <div class="form-group">
                                <label for="supplier_name">Company Name <strong style="color: red">*</strong></label>
                                <input type="text" name="supplier_name" id="supplier_name"
                                    class="form-control @error('supplier_name') is-invalid @enderror"
                                    placeholder="Enter company name"
                                    value="{{ old('supplier_name', $supplier->supplier_name) }}">
                                @error('supplier_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Contact Person -->
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" name="contact_person" id="contact_person"
                                    class="form-control @error('contact_person') is-invalid @enderror"
                                    placeholder="Enter contact person"
                                    value="{{ old('contact_person', $supplier->contact_person) }}">
                                @error('contact_person')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Enter phone number" value="{{ old('phone', $supplier->phone) }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter email"
                                    value="{{ old('email', $supplier->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Enter address">{{ old('address', $supplier->address) }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Opening Balance -->
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="opening_balance">Opening Balance</label>
                                        <input type="number" step="0.01" name="opening_balance" id="opening_balance"
                                            class="form-control @error('opening_balance') is-invalid @enderror" placeholder="0.00"
                                            value="{{ old('opening_balance', $supplier->opening_balance) }}">
                                        @error('opening_balance')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="balance_type">Balance Type</label>
                                        <select name="balance_type" id="balance_type" class="form-control show-tick">
                                            <option value="payable" @selected($supplier->balance_type == 'payable')>Payable</option>
                                            <option value="receivable" @selected($supplier->balance_type == 'receivable')>Receivable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <select name="is_active" id="is_active"
                                    class="form-control show-tick @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('is_active', $supplier->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"
                                        {{ old('is_active', $supplier->is_active) == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary right" id="submitBtn">
                                        <span id="submitBtnText">Update Supplier</span>
                                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const supplierStoreRoute = "{{ route('supplier.store') }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/supplier.js"></script>
@endpush
