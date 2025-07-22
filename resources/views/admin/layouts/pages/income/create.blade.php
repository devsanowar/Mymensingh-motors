@extends('admin.layouts.app')
@section('title', 'Create Income')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Create Income <span><a href="{{ route('income.index') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> All Income </a></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="incomeForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="date">Date <strong style="color: red">*</strong></label>
                                <div class="input-line" style="border: 1px solid #ddd">
                                    <input type="date" name="date"  class="form-control @error('date')invalid @enderror" value="{{ old('date') }}">

                                </div>
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id"><b>Category <strong style="color: red">*</strong></b></label>
                                <div class="form-group">
                                    <select name="category_id" class="form-control show-tick @error('category_id')invalid @enderror">
                                        <option disabled selected>Select Category ....</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="field_id"><b>Field Name <strong style="color: red">*</strong></b></label>
                                <div class="form-group">
                                    <select name="field_id" class="form-control show-tick @error('field_id')invalid @enderror">
                                        <option disabled selected>Select Field ....</option>
                                        @foreach ($field_of_incomes as $field_of_income)
                                            <option value="{{ $field_of_income->id }}">{{ $field_of_income->field_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('field_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description <strong style="color: red">*</strong></label>
                                <div class="input-line">
                                    <textarea name="description" id="description" rows="10" style="border: 1px solid #ddd" class="form-control @error('description')invalid @enderror" placeholder="Expense notes ...">{!! old('description') !!}</textarea>
                                </div>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount <strong style="color: red">*</strong></label>
                                <div class="input-line" style="border: 1px solid #ddd">
                                    <input type="text" name="amount" id="amount" class="form-control @error('amount')invalid @enderror"
                                        placeholder="Enter amount" value="{{ old('amount') }}">
                                </div>
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="income_by">Income By <strong style="color: red">*</strong></label>
                                <div class="input-line" style="border: 1px solid #ddd">
                                    <input type="text" name="income_by" id="income_by" class="form-control @error('income_by')invalid @enderror"
                                        placeholder="Enter name" value="{{ old('income_by') }}">
                                </div>
                                @error('income_by')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary right" id="submitBtn">
                                        <span id="submitBtnText">SAVE INCOME</span></span>
                                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
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
    const incomeStoreRoute = "{{ route('income.store') }}";
</script>
<script src="{{ asset('backend') }}/assets/js/income.js"></script>
@endpush
