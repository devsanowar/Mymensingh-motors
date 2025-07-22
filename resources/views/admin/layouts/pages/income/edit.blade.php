@extends('admin.layouts.app')
@section('title', 'Edit Income')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Edit Income <span><a href="{{ route('income.index') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> All Income </a></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('income.update', $income->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="date">Date <strong style="color: red">*</strong></label>
                                <div class="input-line" style="border: 1px solid #ddd">
                                    <input type="date" name="date"  class="form-control @error('date')invalid @enderror" value="{{ $income->date }}">
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
                                            <option value="{{ $category->id }}" {{ $category->id === $income->category_id ? 'selected' : '' }}  >{{ $category->category_name }}</option>
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
                                            <option value="{{ $field_of_income->id }}" {{ $field_of_income->id === $income->field_id ? 'selected' : '' }}>{{ $field_of_income->field_name }}</option>
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
                                    <textarea name="description" id="description" rows="10" style="border: 1px solid #ddd" class="form-control @error('description')invalid @enderror" placeholder="Expense notes ...">{!! $income->description !!}</textarea>
                                </div>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount <strong style="color: red">*</strong></label>
                                <div class="input-line" style="border: 1px solid #ddd">
                                    <input type="text" name="amount" id="amount" class="form-control @error('amount')invalid @enderror"
                                        value="{{ $income->amount }}">
                                </div>
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="income_by">Spend By <strong style="color: red">*</strong></label>
                                <div class="input-line" style="border: 1px solid #ddd">
                                    <input type="text" name="income_by" id="income_by" class="form-control @error('income_by')invalid @enderror"
                                        value="{{ $income->income_by }}">
                                </div>
                                @error('income_by')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary right" id="submitBtn">
                                        <span id="submitBtnText">UPDATE INCOME</span>
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

@endpush
