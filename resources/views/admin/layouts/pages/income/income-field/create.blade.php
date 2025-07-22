<!-- Modal -->
<div class="modal fade" id="addFieldOfIncomeModal" tabindex="-1" role="dialog" aria-labelledby="addFieldOfIncomeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('field_of_income.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addFieldOfIncomeModalLabel">Add Field</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="field_name">Income Field Name *</label>
                        <div class="input-line" style="border: 1px solid #ddd">
                            <input type="text" name="field_name" id="field_name" class="form-control"
                            placeholder="Enter Field name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_active">Status</label>
                        <div class="input-line">
                            <select name="is_active" id="is_active" class="form-control show-tick">
                                <option value="1">Active</option>
                                <option value="0">DeActive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
