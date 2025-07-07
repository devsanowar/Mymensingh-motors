<!-- Modal -->
<div class="modal fade" id="billingAddressModal" tabindex="-1" role="dialog" aria-labelledby="billingAddressModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('customer.updateAddress') }}" method="POST">
                @csrf

                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Billing Address</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control"
                            value="{{ $order->first_name }}">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control"
                            value="{{ $order->last_name }}">
                    </div>


                    <!-- District -->
                    <div class="form-group">
                        <label>District</label>
                        <select name="district_id" class="form-control" id="districtSelect">
                            <option value="">Select District</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ $order->district_id == $district->id ? 'selected' : '' }}>
                                    {{ $district->district_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Upazila -->
                    <div class="form-group">
                        <label>Upazila</label>
                        <select name="upazila_id" class="form-control" id="upazilaSelect">
                            <option value="">Select Upazila</option>
                            @foreach ($upazilas as $upazila)
                                <option value="{{ $upazila->id }}"
                                    {{ $order->upazila_id == $upazila->id ? 'selected' : '' }}>
                                    {{ $upazila->upazila_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label>Full Address</label>
                        <textarea name="address" class="form-control" rows="2">{{ $order->address }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
