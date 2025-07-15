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
                                <div class="col-md-5">
                                    <label for="system_admin" class="form-label">Role</label>
                                    <select id="system_admin" name="system_admin"
                                        class="form-select show-tick custom-input-field">
                                        <option value="">Select Role</option>
                                        <option value="Super_admin">Super Admin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Editor">Editor</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>

                                <div class="col-md-5">
                                    <label for="user_id" class="form-label">User</label>
                                    <select id="user_id" name="user_id" class="form-select show-tick custom-input-field">
                                        <option value="">Select User</option>
                                    </select>
                                </div>

                            </div>


                            <table class="table table-bordered table-hover permission-table">
                                <thead style="background: #e6e6e6; border-color: #ccc;">
                                    <tr>
                                        <th style="width: 250px; font-size:20px">Menu Group</th>
                                        <th style="font-size:20px">Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="dashboard" id="perm-dashboard-parent" data-id="dashboard">
                                                <label class="form-check-label"
                                                    for="perm-dashboard-parent">Dashboard</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="dashboard" data-id="dashboard"
                                                    id="perm-dashboard">
                                                <label class="form-check-label" for="perm-dashboard">Access
                                                    Dashboard</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="home" id="perm-home-parent" data-id="home">
                                                <label class="form-check-label" for="perm-home-parent">Home Page
                                                </label>
                                            </div>
                                        </td>
                                        <td>

                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input child-checkbox permission-checkbox"
                                                    data-group="home" id="perm-home-banner" data-id="home.slider">
                                                <label class="form-check-label" for="perm-home-banner">Slider</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-promobanner"
                                                    data-id="home.promobanner">
                                                <label class="form-check-label" for="perm-home-promobanner">Promo
                                                    Banner</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-about"
                                                    data-id="home.about">
                                                <label class="form-check-label" for="perm-home-about">About</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-why"
                                                    data-id="home.whychoseus">
                                                <label class="form-check-label" for="perm-home-why">Why Choose Us</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-cta" data-id="home.cta">
                                                <label class="form-check-label" for="perm-home-cta">CTA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-achievement"
                                                    data-id="home.achievement">
                                                <label class="form-check-label"
                                                    for="perm-home-achievement">Achievement</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-review"
                                                    data-id="home.review">
                                                <label class="form-check-label" for="perm-home-review">Review</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="home" id="perm-home-faq"
                                                    data-id="home.faq">
                                                <label class="form-check-label" for="perm-home-faq">FAQ</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <!-- Parent checkbox: About -->
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input parent-checkbox"
                                                    data-group="about_page" id="perm-about-parent">
                                                <label class="form-check-label" for="perm-about-parent">
                                                    About
                                                </label>
                                            </div>
                                        </td>

                                        <!-- Child checkboxes under About -->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox" type="checkbox"
                                                    data-group="about_page" id="perm-about-page" data-id="aboutPage">
                                                <label class="form-check-label" for="perm-about-page">
                                                    About Page
                                                </label>
                                            </div>
                                            {{-- <div class="form-check">
                                                <input class="form-check-input child-checkbox" type="checkbox"
                                                    data-group="about_page" id="perm-about-mission" data-id="about_page">
                                                <label class="form-check-label" for="perm-about-mission">
                                                    About Mission
                                                </label>
                                            </div> --}}

                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input parent-checkbox"
                                                    data-group="product" id="perm-product-parent" data-id="product">
                                                <label class="form-check-label" for="perm-product-parent">Product</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input child-checkbox"
                                                    data-group="product" id="perm-product-create"
                                                    data-id="product.create">
                                                <label class="form-check-label" for="perm-product-create">Add
                                                    Product</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input child-checkbox"
                                                    data-group="product" id="perm-product-index" data-id="product.index">
                                                <label class="form-check-label" for="perm-product-index">All
                                                    Product</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input child-checkbox"
                                                    data-group="product" id="perm-category-index"
                                                    data-id="product.category">
                                                <label class="form-check-label" for="perm-category-index">Category</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input child-checkbox"
                                                    data-group="product" id="perm-brand-index" data-id="product.brand">
                                                <label class="form-check-label" for="perm-brand-index">Brand</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input child-checkbox"
                                                    data-group="product" id="perm-product-unit" data-id="product.unit">
                                                <label class="form-check-label" for="perm-product-unit">Product
                                                    Unit</label>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="stock" id="perm-stock-parent" data-id="stock">
                                                <label class="form-check-label" for="perm-stock-parent"> Stock </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input child-checkbox"
                                                    data-group="stock" id="perm-stock-management"
                                                    data-id="stock.management">
                                                <label class="form-check-label" for="perm-stock-management">
                                                    Stock Management</label>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="shipping" id="perm-shipping-parent" data-id="shipping">
                                                <label class="form-check-label" for="perm-shipping-parent"> Shipping
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="shipping" data-id="shipping.index"
                                                    id="perm-shipping-index">
                                                <label class="form-check-label" for="perm-shipping-index">Shipping</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="district_upazila" id="perm-district-upazila-parent"
                                                    data-id="district_upazila">
                                                <label class="form-check-label" for="perm-district-upazila-parent">
                                                    District & Upazila
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="district_upazila"
                                                    data-id="district.index" id="perm-district-index">
                                                <label class="form-check-label" for="perm-district-index">District</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="district_upazila" data-id="upazila.index"
                                                    id="perm-upazila-index">
                                                <label class="form-check-label" for="perm-upazila-index">Upazila</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="orders" id="perm-orders-parent" data-id="orders">
                                                <label class="form-check-label" for="perm-orders-parent">Orders</label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="orders" data-id="order.index"
                                                    id="perm-order-index">
                                                <label class="form-check-label" for="perm-order-index">Orders</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="payment_method" id="perm-payment-method-parent"
                                                    data-id="payment_method">
                                                <label class="form-check-label" for="perm-payment-method-parent">Payment
                                                    Method</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="payment_method"
                                                    data-id="payment_method.index" id="perm-payment-method">
                                                <label class="form-check-label" for="perm-payment-method">Payment
                                                    Method</label>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="post" id="perm-post-parent" data-id="post">
                                                <label class="form-check-label" for="perm-post-parent">Post</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post_category.index"
                                                    id="perm-post-cat">
                                                <label class="form-check-label" for="perm-post-cat">Post Category</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post.create"
                                                    id="perm-post-create">
                                                <label class="form-check-label" for="perm-post-create">Add Post</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post.index"
                                                    id="perm-post-index">
                                                <label class="form-check-label" for="perm-post-index">All Post</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="users" id="perm-users-parent" data-id="users">
                                                <label class="form-check-label" for="perm-users-parent">Users</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="users" data-id="user.create"
                                                    id="perm-user-create">
                                                <label class="form-check-label" for="perm-user-create">Users</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="sms" id="perm-sms-parent" data-id="sms">
                                                <label class="form-check-label" for="perm-sms-parent">SMS</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.send"
                                                    id="perm-sms-send">
                                                <label class="form-check-label" for="perm-sms-send">Send SMS</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.custom"
                                                    id="perm-sms-custom">
                                                <label class="form-check-label" for="perm-sms-custom">Custom SMS</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.report"
                                                    id="perm-sms-report">
                                                <label class="form-check-label" for="perm-sms-report">SMS Report</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="subscribers" id="perm-subscribers-parent"
                                                    data-id="subscribers">
                                                <label class="form-check-label"
                                                    for="perm-subscribers-parent">Subscribers</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="subscribers" data-id="newslatter"
                                                    id="perm-newslatter">
                                                <label class="form-check-label" for="perm-newslatter">Subscriber</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="messages" id="perm-messages-parent" data-id="messages">
                                                <label class="form-check-label"
                                                    for="perm-messages-parent">Messages</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="messages" data-id="contact_form.message"
                                                    id="perm-messages">
                                                <label class="form-check-label" for="perm-messages">Messages</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="blocklist" id="perm-blocklist-parent"
                                                    data-id="blocklist">
                                                <label class="form-check-label" for="perm-blocklist-parent">Account Block
                                                    Lists</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="blocklist" data-id="block.list"
                                                    id="perm-block-list">
                                                <label class="form-check-label" for="perm-block-list">Block List</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="pages" id="perm-pages-parent" data-id="pages">
                                                <label class="form-check-label" for="perm-pages-parent">Pages</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="pages" data-id="privacy_policy"
                                                    id="perm-privacy">
                                                <label class="form-check-label" for="perm-privacy">Privacy Policy</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="pages" data-id="terms_and_condtion"
                                                    id="perm-terms">
                                                <label class="form-check-label" for="perm-terms">Terms &
                                                    Conditions</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="pages" data-id="return_refund"
                                                    id="perm-refund">
                                                <label class="form-check-label" for="perm-refund">Return & Refund</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="settings" id="perm-settings-parent" data-id="settings">
                                                <label class="form-check-label"
                                                    for="perm-settings-parent">Settings</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="settings" data-id="sms-settings.edit"
                                                    id="perm-sms-setting">
                                                <label class="form-check-label" for="perm-sms-setting">SMS API
                                                    Settings</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="settings" data-id="website_setting"
                                                    id="perm-website-setting">
                                                <label class="form-check-label" for="perm-website-setting">Website
                                                    Setting</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="accessinfo" id="perm-accessinfo-parent"
                                                    data-id="accessinfo">
                                                <label class="form-check-label" for="perm-accessinfo-parent">Access
                                                    Info</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="accessinfo" data-id="visit.log.index"
                                                    id="perm-access-info">
                                                <label class="form-check-label" for="perm-access-info">Access Info</label>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <button type="submit">SAVE</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Re-bind menu-toggle manually to fix sidebar dropdowns
            $('.menu-toggle').off('click').on('click', function(e) {
                e.preventDefault();

                var $parent = $(this).parent('li');
                var $submenu = $(this).next('.ml-menu');

                if ($parent.hasClass('open')) {
                    $submenu.slideUp(300);
                    $parent.removeClass('open');
                } else {
                    // Close other open menus
                    $('.ml-menu').slideUp(300);
                    $('.menu-toggle').parent('li').removeClass('open');

                    // Open current
                    $submenu.slideDown(300);
                    $parent.addClass('open');
                }
            });
        });
    </script>


    <script>
        // System Admin select করলে User list আসবে
        $('#system_admin').change(function() {
            let role = $(this).val();
            if (role) {
                $.ajax({
                    url: '/admin/get-users-by-role/' + encodeURIComponent(role),
                    type: 'GET',
                    success: function(data) {
                        $('#user_id').empty();
                        $('#user_id').append('<option value="">Select User</option>');
                        if (Array.isArray(data) && data.length > 0) {
                            $.each(data, function(index, user) {
                                $('#user_id').append('<option value="' + user.id + '">' + user
                                    .name + '</option>');
                            });
                        } else {
                            $('#user_id').append('<option value="">No Users Found</option>');
                        }
                    }
                });
            } else {
                $('#user_id').empty().append('<option value="">Select User</option>');
            }
        });

        // User select করলে তার permissions লোড হবে
        $('#user_id').change(function() {
            let user_id = $(this).val();
            if (user_id) {
                $.ajax({
                    url: '/admin/get-user-permissions/' + user_id,
                    type: 'GET',
                    success: function(data) {
                        console.log('Existing permissions:', data);
                        $('.permission-checkbox').prop('checked', false);
                        $.each(data, function(index, key) {
                            $('.permission-checkbox[data-id="' + key + '"]').prop('checked',
                                true);
                        });
                    }
                });
            } else {
                $('.permission-checkbox').prop('checked', false);
            }
        });

        // Permission save
        $('#privilege-form').submit(function(e) {
            e.preventDefault();
            let user_id = $('#user_id').val();
            let permissions = [];
            $('.permission-checkbox:checked').each(function() {
                permissions.push($(this).data('id'));
            });

            $.ajax({
                url: '/admin/save-user-permissions',
                type: 'POST',
                data: {
                    user_id: user_id,
                    permissions: permissions,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right"
                    };
                    toastr.success('Permissions updated!');
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Parent -> Children
            document.querySelectorAll('.parent-checkbox').forEach(function(parentCheckbox) {
                parentCheckbox.addEventListener('change', function() {
                    const group = this.getAttribute('data-group');
                    const children = document.querySelectorAll('.child-checkbox[data-group="' +
                        group + '"]');
                    children.forEach(function(child) {
                        child.checked = parentCheckbox.checked;
                    });
                });
            });

            // Children -> Parent (auto-check ON, auto-uncheck ON)
            document.querySelectorAll('.child-checkbox').forEach(function(childCheckbox) {
                childCheckbox.addEventListener('change', function() {
                    const group = this.getAttribute('data-group');
                    const parent = document.querySelector('.parent-checkbox[data-group="' + group +
                        '"]');
                    const children = document.querySelectorAll('.child-checkbox[data-group="' +
                        group + '"]');

                    const allChecked = Array.from(children).every(cb => cb.checked);
                    const allUnchecked = Array.from(children).every(cb => !cb.checked);

                    if (allChecked) {
                        parent.checked = true;
                    } else if (allUnchecked) {
                        parent.checked = false;
                    }
                    // না হলে parent এর স্টেট আগের মতোই থাকবে
                });
            });
        });
    </script>
@endpush
