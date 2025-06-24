<div class="modal fade" id="addProductUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product_unit.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label><b>Full Name</b></label>
                        <div class="form-line case-input">
                            <input type="text" name="fullname" id="fullname"
                                class="form-control" placeholder="e.g. Kilogram"
                                value="{{ old('fullname') }}" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label><b>Short Name</b></label>
                        <div class="form-line case-input">
                            <input type="text" name="short_name" id="short_name"
                                class="form-control"
                                placeholder="e.g. kg, pcs, box" value="{{ old('short_name') }}" required>
                        </div>
                       
                    </div>

                    <div class="form-group mb-4">
                        <label><b>Description (Optional)</b></label>
                        <div class="form-line case-input">
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description here...">{{ old('description') }}</textarea>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label><b>Status</b></label>
                        <select class="form-control show-tick"
                            name="is_active">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-white text-uppercase"
                            data-dismiss="modal">Hide</button>
                        <button type="submit" class="btn btn-info text-white text-uppercase">Save Unit</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>


@push('scripts')
   

@endpush
