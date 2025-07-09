<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('cost-category.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="category_name">Category Name *</label>
                        <div class="input-line" style="border: 1px solid #ddd">
                            <input type="text" name="category_name" id="category_name" class="form-control"
                            placeholder="Enter category name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_name">Status</label>
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
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
