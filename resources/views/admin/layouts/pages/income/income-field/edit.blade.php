<div class="modal fade" id="editFielOfIncomeModal" tabindex="-1" aria-labelledby="editFielOfIncomeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editFielOfIncomeModalLabel">Edit Cost Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="editFieldOfIncomeForm" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="edit_field_of_income_id" name="id">

                    <div class="form-group mb-4">
                        <label><b>Field of cost name</b></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">pin_drop</i></span>
                            <div class="form-line case-input">
                                <input type="text" id="edit_field_name" class="form-control" name="field_name">
                            </div>
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
