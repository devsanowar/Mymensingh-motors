@extends('admin.layouts.app')
@section('title', 'Privilege')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <style>
        table.permission-table td,
        table.permission-table th {
            vertical-align: top;
            padding: 0.75rem;
        }

        .form-check {
            margin-bottom: 0.5rem;
            float: left;
            margin-left: 5px;
            margin-right: 5px;
        }

        .form-line.case-input {
            border: 1px solid #b8b8b8;
        }
    </style>
@endpush

@section('admin_content')


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Privilege
                        </h4>
                    </div>
                    <div class="body">

                        <form id="privilege-form">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" name="role_id" class="form-select">
                                        <option value="">Select Role</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="user" class="form-label">User</label>
                                    <select id="user" name="user_id" class="form-select">
                                        <option value="">Select User</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table table-bordered permission-table">
                                <thead>
                                    <tr>
                                        <th style="width: 250px;">Menu Group</th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Dashboard</strong></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="dashboard" id="perm-dashboard">
                                                <label class="form-check-label" for="perm-dashboard">Access Dashboard</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Home Page</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.banner" id="perm-home-banner"><label
                                                    class="form-check-label" for="perm-home-banner">Banner</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.promobanner"
                                                    id="perm-home-promobanner"><label class="form-check-label"
                                                    for="perm-home-promobanner">Promo Banner</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.about" id="perm-home-about"><label
                                                    class="form-check-label" for="perm-home-about">About</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.why_choose_us" id="perm-home-why"><label
                                                    class="form-check-label" for="perm-home-why">Why Choose Us</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.cta" id="perm-home-cta"><label
                                                    class="form-check-label" for="perm-home-cta">CTA</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.achievement"
                                                    id="perm-home-achievement"><label class="form-check-label"
                                                    for="perm-home-achievement">Achievement</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.review" id="perm-home-review"><label
                                                    class="form-check-label" for="perm-home-review">Review</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="home.faq" id="perm-home-faq"><label
                                                    class="form-check-label" for="perm-home-faq">FAQ</label></div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>About Page</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="about.page" id="perm-about-page"><label
                                                    class="form-check-label" for="perm-about-page">Access About
                                                    Page</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Product</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="product.create"
                                                    id="perm-product-create"><label class="form-check-label"
                                                    for="perm-product-create">Add Product</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="product.index"
                                                    id="perm-product-index"><label class="form-check-label"
                                                    for="perm-product-index">All Product</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="category.index"
                                                    id="perm-category-index"><label class="form-check-label"
                                                    for="perm-category-index">Category</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="brand.index" id="perm-brand-index"><label
                                                    class="form-check-label" for="perm-brand-index">Brand</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="product_unit.index"
                                                    id="perm-product-unit"><label class="form-check-label"
                                                    for="perm-product-unit">Product Unit</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Stock</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="stock.index" id="perm-stock-index"><label
                                                    class="form-check-label" for="perm-stock-index">Stock
                                                    Management</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Shipping</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="shipping.index"
                                                    id="perm-shipping-index"><label class="form-check-label"
                                                    for="perm-shipping-index">Shipping</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>District & Upazila</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="district.index"
                                                    id="perm-district-index"><label class="form-check-label"
                                                    for="perm-district-index">District</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="upazila.index"
                                                    id="perm-upazila-index"><label class="form-check-label"
                                                    for="perm-upazila-index">Upazila</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Orders</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="order.index" id="perm-order-index"><label
                                                    class="form-check-label" for="perm-order-index">Orders</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Method</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="payment_method.index"
                                                    id="perm-payment-method"><label class="form-check-label"
                                                    for="perm-payment-method">Payment Method</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Post</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="post_category.index"
                                                    id="perm-post-cat"><label class="form-check-label"
                                                    for="perm-post-cat">Post Category</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="post.create" id="perm-post-create"><label
                                                    class="form-check-label" for="perm-post-create">Add Post</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="post.index" id="perm-post-index"><label
                                                    class="form-check-label" for="perm-post-index">All Post</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Users</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="user.create" id="perm-user-create"><label
                                                    class="form-check-label" for="perm-user-create">Users</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>SMS</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="sms.send" id="perm-sms-send"><label
                                                    class="form-check-label" for="perm-sms-send">Send SMS</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="sms.custom" id="perm-sms-custom"><label
                                                    class="form-check-label" for="perm-sms-custom">Custom SMS</label>
                                            </div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="sms.report" id="perm-sms-report"><label
                                                    class="form-check-label" for="perm-sms-report">SMS Report</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Subscribers</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="newslatter" id="perm-newslatter"><label
                                                    class="form-check-label" for="perm-newslatter">Subscriber</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Messages</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="contact_form.message"
                                                    id="perm-messages"><label class="form-check-label"
                                                    for="perm-messages">Messages</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Account Block Lists</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="block.list" id="perm-block-list"><label
                                                    class="form-check-label" for="perm-block-list">Block List</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pages</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="privacy_policy" id="perm-privacy"><label
                                                    class="form-check-label" for="perm-privacy">Privacy Policy</label>
                                            </div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="terms_and_condtion" id="perm-terms"><label
                                                    class="form-check-label" for="perm-terms">Terms & Conditions</label>
                                            </div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="return_refund" id="perm-refund"><label
                                                    class="form-check-label" for="perm-refund">Return & Refund</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Settings</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="sms-settings.edit"
                                                    id="perm-sms-setting"><label class="form-check-label"
                                                    for="perm-sms-setting">SMS API Settings</label></div>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="website_setting"
                                                    id="perm-website-setting"><label class="form-check-label"
                                                    for="perm-website-setting">Website Setting</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Access Info</strong></td>
                                        <td>
                                            <div class="form-check"><input class="form-check-input permission-checkbox"
                                                    type="checkbox" data-id="visit.log.index"
                                                    id="perm-access-info"><label class="form-check-label"
                                                    for="perm-access-info">Access Info</label></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.get('/api/roles', function(roles) {
                roles.forEach(role => {
                    $('#role').append(`<option value="${role.id}">${role.name}</option>`);
                });
            });

            $('#role').on('change', function() {
                const roleId = $(this).val();
                $('#user').empty().append(`<option value="">Select User</option>`);
                if (roleId) {
                    $.get(`/api/roles/${roleId}/users`, function(users) {
                        users.forEach(user => {
                            $('#user').append(
                                `<option value="${user.id}">${user.name}</option>`);
                        });
                    });
                }
            });

            $('#user').on('change', function() {
                const userId = $(this).val();
                if (userId) {
                    loadPermissions(userId);
                }
            });

            function loadPermissions(userId) {
                $.get(`/api/users/${userId}/permissions`, function(permissions) {
                    $('.permission-checkbox').prop('checked', false);
                    permissions.forEach(id => {
                        $(`.permission-checkbox[data-id="${id}"]`).prop('checked', true);
                    });
                });
            }

            $('.permission-checkbox').on('change', function() {
                const userId = $('#user').val();
                const permission = $(this).data('id');
                const action = $(this).is(':checked') ? 'attach' : 'detach';

                if (!userId) {
                    alert("Please select a user first");
                    $(this).prop('checked', !$(this).is(':checked'));
                    return;
                }

                $.ajax({
                    url: '/api/user-permissions',
                    type: 'POST',
                    data: {
                        user_id: userId,
                        permission: permission,
                        action: action,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        console.log("Permission updated successfully");
                    },
                    error: function() {
                        alert("Something went wrong!");
                    }
                });
            });
        });
    </script>
@endpush
