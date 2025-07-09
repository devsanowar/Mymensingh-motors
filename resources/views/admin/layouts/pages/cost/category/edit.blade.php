<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Cost Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')

                    <input type="hidden" id="edit_category_id" name="id">

                    <div class="form-group mb-4">
                        <label><b>District</b></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">pin_drop</i></span>
                            <div class="form-line case-input">
                                <input type="text" id="edit_category_name" class="form-control" name="category_name"
                                    required>
                            </div>
                            <div class="text-danger font-weight-bold mt-2" id="districtError"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control show-tick" id="edit_is_active" name="is_active">
                            <option value="1">Active</option>
                            <option value="0">DeActive</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
