<!-- Modal -->
<div class="modal fade" id="accountEditModal" tabindex="-1" aria-labelledby="accountEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('customer_account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title">Edit Account Details</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">

          <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
          </div>

          <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
          </div>

          <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
          </div>

          <div class="form-group mb-3">
            <label>Profile Image</label><br>
            @if(auth()->user()->image)
              <img src="{{ asset('uploads/users/' . auth()->user()->image) }}" alt="Profile" width="80">
            @endif
            <input type="file" name="image" class="form-control mt-2">
          </div>

          <div class="form-group mb-3">
            <label>New Password</label>
            <input type="password" class="form-control" name="password" placeholder="Leave blank if unchanged">
          </div>

          <div class="form-group mb-3">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Update Account</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>