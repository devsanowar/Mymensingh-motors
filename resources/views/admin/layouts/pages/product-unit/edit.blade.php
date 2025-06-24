<!-- Modal -->
<div class="modal fade" id="editProductUnitModal" tabindex="-1" aria-labelledby="editProductUnit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductUnit">Edit Product Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product_unit.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_unit_id" value="{{ old('product_unit_id') }}" id="edit_product_unit_id">

                    <div class="form-group mb-3">
                        <label><b>Full Name</b></label>
                        <div class="form-line case-input">
                        <input type="text" class="form-control" name="fullname" id="edit_district_name" placeholder="Enter Full Name">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Short Name</b></label>
                        <div class="form-line case-input">
                        <input type="text" class="form-control" name="short_name" id="edit_short_name" placeholder="Enter Short Name">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Description</b></label>
                        <div class="form-line case-input">
                        <textarea name="description" id="edit_description" class="form-control" rows="3" placeholder="Description here..."></textarea>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Status</b></label>
                        <select class="form-control show-tick" id="edit_status" name="is_active">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(".editProductUnit").click(function () {
    const unitId = $(this).data("id");
    const districtName = $(this).data("name");
    const shortName = $(this).data("shortname");
    const description = $(this).data("description");
    const status = $(this).data("status");

    // Fill modal form
    $("#edit_product_unit_id").val(unitId);
    $("#edit_district_name").val(districtName);
    $("#edit_short_name").val(shortName);
    $("#edit_description").val(description);
    $("#edit_status").val(status).trigger('change');

    // Show modal
    $("#editProductUnitModal").modal("show");
});

 </script>





@endpush

