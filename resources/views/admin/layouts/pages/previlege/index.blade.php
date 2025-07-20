@extends('admin.layouts.app')
@section('title', 'Privilege')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <style>
        table.permission-table td,
        table.permission-table th {
            vertical-align: top;
            padding: 0.75rem;
            text-align: left;
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

        .btn:not(.btn-link):not(.btn-circle) {
            box-shadow: unset;
        }

        .btn:not(.btn-link):not(.btn-circle) {
            font-size: 16px;
        }

        .btn:not(.btn-link):not(.btn-circle) i {
            font-size: 14px;
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
                                <tbody class="previlege-table">
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="dashboard" id="perm-dashboard-parent" data-id="dashboard">
                                                <label class="form-check-label"
                                                    for="perm-dashboard-parent"><strong>Dashboard</strong></label>
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

                                    <tr class="previlege-menu-item">
                                        
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="home" id="perm-home-parent" data-id="home">
                                                <label class="form-check-label" for="perm-home-parent"><strong>Home
                                                        Page</strong>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Slider Section -->
                                            <div class="d-flex flex-wrap">
                                                <div class="mr-3 mb-2">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="sliderDropdownBtn">
                                                            <span>Slider</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="sliderDropdownBtn">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-index" data-id="home.slider.index"
                                                                    name="permissions[]" value="home.slider.index">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-index">View</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-create"
                                                                    data-id="home.slider.create" name="permissions[]"
                                                                    value="home.slider.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-create">Create</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-edit" data-id="home.slider.edit"
                                                                    name="permissions[]" value="home.slider.edit">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-edit">edit</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-delete"
                                                                    data-id="home.slider.delete" name="permissions[]"
                                                                    value="home.slider.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-delete">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Start Promo banner home menu-->
                                                <div class="mr-3 mb-2">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="promobannerDropdownBtn">
                                                            <span>Promo Banner</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="promobannerDropdownBtn">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-promobanner-index"
                                                                    data-id="home.promobanner.index" name="permissions[]"
                                                                    value="home.promobanner.index">
                                                                <label class="form-check-label"
                                                                    for="perm-home-promobanner-index">
                                                                    View
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-promobanner-create"
                                                                    data-id="home.promobanner.create" name="permissions[]"
                                                                    value="home.promobanner.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-promobanner-create">
                                                                    Create
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-promobanner-edit"
                                                                    data-id="home.promobanner.edit" name="permissions[]"
                                                                    value="home.promobanner.edit">
                                                                <label class="form-check-label"
                                                                    for="perm-home-promobanner-edit">
                                                                    Edit
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End promo banner menu-->

                                                <!-- About Dropdown -->
                                                <div class="mr-3 mb-2 d-inline-block">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="aboutDropdownBtn">
                                                            <span>About</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="aboutDropdownBtn">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-about-index" data-id="home.about.index"
                                                                    name="permissions[]" value="home.about.index">
                                                                <label class="form-check-label"
                                                                    for="perm-home-about-index">View</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-about-edit" data-id="home.about.edit"
                                                                    name="permissions[]" value="home.about.edit">
                                                                <label class="form-check-label"
                                                                    for="perm-home-about-edit">edit</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Why Choose Us Dropdown -->
                                                <div class="mr-3 mb-2 d-inline-block">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="whyDropdownBtn">
                                                            <span>Why Choose Us</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="whyDropdownBtn">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-index"
                                                                    data-id="home.why_chose_us.index" name="permissions[]"
                                                                    value="home.why_chose_us.index">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-index">View</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-create"
                                                                    data-id="home.why_chose_us.create"
                                                                    name="permissions[]" value="home.why_chose_us.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-create">Create</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-edit"
                                                                    data-id="home.why_chose_us.edit" name="permissions[]"
                                                                    value="home.why_chose_us.edit">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-edit">Edit</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-delete"
                                                                    data-id="home.why_chose_us.delete"
                                                                    name="permissions[]" value="home.why_chose_us.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-delete">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- CTA Dropdown -->
                                                <div class="mr-3 mb-2 d-inline-block">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="ctaDropdownBtn">
                                                            <span>CTA</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="ctaDropdownBtn">

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-cta-index" data-id="home.cta.index"
                                                                    name="permissions[]" value="home.cta.index">
                                                                <label class="form-check-label" for="perm-home-cta-index">
                                                                    View
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-cta-create" data-id="home.cta.create"
                                                                    name="permissions[]" value="home.cta.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-cta-create">
                                                                    Create
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-cta-edit" data-id="home.cta.edit"
                                                                    name="permissions[]" value="home.cta.edit">
                                                                <label class="form-check-label" for="perm-home-cta-edit">
                                                                    Edit
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-cta-delete" data-id="home.cta.delete"
                                                                    name="permissions[]" value="home.cta.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-cta-delete">
                                                                    Delete
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Achievement Dropdown -->
                                                <div class="mr-3 mb-2 d-inline-block">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="achievementDropdownBtn">
                                                            <span>Achievement</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="achievementDropdownBtn">

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-achievement-index"
                                                                    data-id="home.achievement.index" name="permissions[]"
                                                                    value="home.achievement.index">
                                                                <label class="form-check-label"
                                                                    for="perm-home-achievement-index">
                                                                    View
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-achievement-create"
                                                                    data-id="home.achievement.create" name="permissions[]"
                                                                    value="home.achievement.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-achievement-create">
                                                                    Create
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-achievement-edit"
                                                                    data-id="home.achievement.edit" name="permissions[]"
                                                                    value="home.achievement.edit">
                                                                <label class="form-check-label"
                                                                    for="perm-home-achievement-edit">
                                                                    Edit
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-achievement-delete"
                                                                    data-id="home.achievement.delete" name="permissions[]"
                                                                    value="home.achievement.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-achievement-delete">
                                                                    Delete
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- End Achievement home page menu -->

                                                <!-- Review Dropdown -->
                                                <div class="mr-3 mb-2 d-inline-block">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="reviewDropdownBtn">
                                                            <span>Review</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="reviewDropdownBtn">

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-review-index"
                                                                    data-id="home.review.index" name="permissions[]"
                                                                    value="home.review.index">
                                                                <label class="form-check-label"
                                                                    for="perm-home-review-index">
                                                                    View
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-review-create"
                                                                    data-id="home.review.create" name="permissions[]"
                                                                    value="home.review.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-review-create">
                                                                    Create
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-review-edit" data-id="home.review.edit"
                                                                    name="permissions[]" value="home.review.edit">
                                                                <label class="form-check-label"
                                                                    for="perm-home-review-edit">
                                                                    Edit
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-review-delete"
                                                                    data-id="home.review.delete" name="permissions[]"
                                                                    value="home.review.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-review-delete">
                                                                    Delete
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- FAQ Dropdown -->
                                                <div class="mr-3 mb-2 d-inline-block">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="faqDropdownBtn">
                                                            <span>FAQ</span>
                                                            <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                        </button>
                                                        <div class="dropdown-menu p-3 shadow"
                                                            aria-labelledby="faqDropdownBtn">

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-faq-index" data-id="home.faq.index"
                                                                    name="permissions[]" value="home.faq.index">
                                                                <label class="form-check-label" for="perm-home-faq-index">
                                                                    View
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-faq-create" data-id="home.faq.create"
                                                                    name="permissions[]" value="home.faq.create">
                                                                <label class="form-check-label"
                                                                    for="perm-home-faq-create">
                                                                    Create
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-faq-edit" data-id="home.faq.edit"
                                                                    name="permissions[]" value="home.faq.edit">
                                                                <label class="form-check-label" for="perm-home-faq-edit">
                                                                    edit
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-faq-delete" data-id="home.faq.delete"
                                                                    name="permissions[]" value="home.faq.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-faq-delete">
                                                                    Delete
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End FAQ home page menu -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Parent checkbox: About -->
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="about_page" id="perm-about-parent" data-id="about"
                                                    value="about" name="permissions[]">
                                                <label class="form-check-label" for="perm-about-parent">
                                                    <strong>About Page</strong>
                                                </label>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Chairman Info Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="chairmanInfoDropdownBtn">
                                                        <span>Chairman Info Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="chairmanInfoDropdownBtn">

                                                        <!-- Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="about_page"
                                                                data-id="about.chairman.info.edit"
                                                                value="about.chairman.info.edit"
                                                                id="perm-about-chairman-info-edit" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-about-chairman-info-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Mission & Vision Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="missionVisionDropdownBtn">
                                                        <span>Mission & Vision Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="missionVisionDropdownBtn">

                                                        <!-- Mission Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="about_page"
                                                                data-id="mission.page.edit" value="mission.page.edit"
                                                                id="perm-mission-page-edit" name="permissions[]">
                                                            <label class="form-check-label" for="perm-mission-page-edit">
                                                                Mission Edit
                                                            </label>
                                                        </div>

                                                        <!-- Vision Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="about_page"
                                                                data-id="vission.page.edit" value="vission.page.edit"
                                                                id="perm-vission-page-edit" name="permissions[]">
                                                            <label class="form-check-label" for="perm-vission-page-edit">
                                                                Vision Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </td>


                                    </tr>



                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="product" id="perm-product-parent" data-id="product">
                                                <label class="form-check-label" for="perm-product-parent">
                                                    <strong>Product</strong>
                                                </label>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Product Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="productDropdownBtn">
                                                        <span>Product</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="productDropdownBtn">

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-index"
                                                                data-id="product.index" name="permissions[]"
                                                                value="product.index">
                                                            <label class="form-check-label" for="perm-product-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-create"
                                                                data-id="product.create" name="permissions[]"
                                                                value="product.create">
                                                            <label class="form-check-label" for="perm-product-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-edit"
                                                                data-id="product.edit" name="permissions[]"
                                                                value="product.edit">
                                                            <label class="form-check-label" for="perm-product-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-delete"
                                                                data-id="product.delete" name="permissions[]"
                                                                value="product.delete">
                                                            <label class="form-check-label" for="perm-product-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Product Category Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="productCategoryDropdownBtn">
                                                        <span>Product Category</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="productCategoryDropdownBtn">

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-category-index"
                                                                data-id="product.category.index" name="permissions[]"
                                                                value="product.category.index">
                                                            <label class="form-check-label" for="perm-category-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-category-create"
                                                                data-id="product.category.create" name="permissions[]"
                                                                value="product.category.create">
                                                            <label class="form-check-label" for="perm-category-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-category-edit"
                                                                data-id="product.category.edit" name="permissions[]"
                                                                value="product.category.edit">
                                                            <label class="form-check-label" for="perm-category-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-category-delete"
                                                                data-id="product.category.delete" name="permissions[]"
                                                                value="product.category.delete">
                                                            <label class="form-check-label" for="perm-category-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Brand Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="brandDropdownBtn">
                                                        <span>Brand</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="brandDropdownBtn">

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-brand-index"
                                                                data-id="product.brand.index" name="permissions[]"
                                                                value="product.brand.index">
                                                            <label class="form-check-label" for="perm-brand-index">
                                                                Brand
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-brand-create"
                                                                data-id="product.brand.create" name="permissions[]"
                                                                value="product.brand.create">
                                                            <label class="form-check-label" for="perm-brand-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-brand-edit"
                                                                data-id="product.brand.edit" name="permissions[]"
                                                                value="product.brand.edit">
                                                            <label class="form-check-label" for="perm-brand-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-brand-delete"
                                                                data-id="product.brand.delete" name="permissions[]"
                                                                value="product.brand.delete">
                                                            <label class="form-check-label" for="perm-brand-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Product Unit Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="productUnitDropdownBtn">
                                                        <span>Product Unit</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="productUnitDropdownBtn">

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-unit-index"
                                                                data-id="product.unit.index" name="permissions[]"
                                                                value="product.unit.index">
                                                            <label class="form-check-label" for="perm-product-unit-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-unit-create"
                                                                data-id="product.unit.create" name="permissions[]"
                                                                value="product.unit.create">
                                                            <label class="form-check-label"
                                                                for="perm-product-unit-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-unit-edit"
                                                                data-id="product.unit.edit" name="permissions[]"
                                                                value="product.unit.edit">
                                                            <label class="form-check-label" for="perm-product-unit-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="product" id="perm-product-unit-delete"
                                                                data-id="product.unit.delete" name="permissions[]"
                                                                value="product.unit.delete">
                                                            <label class="form-check-label"
                                                                for="perm-product-unit-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>



                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="stock" id="perm-stock-parent" data-id="stock">
                                                <label class="form-check-label" for="perm-stock-parent">
                                                    <strong>Stock</strong>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input child-checkbox permission-checkbox"
                                                    data-group="stock" id="perm-stock-management"
                                                    data-id="stock.management" name="permissions[]"
                                                    value="stock.management">
                                                <label class="form-check-label" for="perm-stock-management">
                                                    Manage
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input child-checkbox permission-checkbox"
                                                    data-group="stock" id="perm-stock-edit" data-id="stock.edit"
                                                    name="permissions[]" value="stock.edit">
                                                <label class="form-check-label" for="perm-stock-edit">
                                                    edit
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input child-checkbox permission-checkbox"
                                                    data-group="stock" id="perm-stock-logs" data-id="stock.logs"
                                                    name="permissions[]" value="stock.logs">
                                                <label class="form-check-label" for="perm-stock-logs">
                                                    logs
                                                </label>
                                            </div>

                                            
                                        </td>
                                    </tr>


                                    <tr>
                                        <!-- Parent: Cost -->
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="cost" id="perm-cost-parent" data-id="cost">
                                                <label class="form-check-label" for="perm-cost-parent">
                                                    <strong>Cost</strong>
                                                </label>
                                            </div>
                                        </td>

                                        <!-- Child: Cost Category -->
                                        <td>

                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="costCategoryDropdownBtn">
                                                        <span>Cost Category</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="costCategoryDropdownBtn">

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-category-index"
                                                                data-id="cost.cost_category.index" name="permissions[]"
                                                                value="cost.cost_category.index">
                                                            <label class="form-check-label" for="perm-cost-category-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-category-create"
                                                                data-id="cost.cost_category.create" name="permissions[]"
                                                                value="cost.cost_category.create">
                                                            <label class="form-check-label"
                                                                for="perm-cost-category-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-category-edit"
                                                                data-id="cost.cost_category.edit" name="permissions[]"
                                                                value="cost.cost_category.edit">
                                                            <label class="form-check-label" for="perm-cost-category-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-category-delete"
                                                                data-id="cost.cost_category.delete" name="permissions[]"
                                                                value="cost.cost_category.delete">
                                                            <label class="form-check-label"
                                                                for="perm-cost-category-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>





                                            <!-- Field Of Cost Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="fieldOfCostDropdownBtn">
                                                        <span>Field Of Cost</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="fieldOfCostDropdownBtn">

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-field-of-cost"
                                                                data-id="cost.field_of_cost.index" name="permissions[]"
                                                                value="cost.field_of_cost.index">
                                                            <label class="form-check-label" for="perm-field-of-cost">
                                                                View
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-field-of-cost-create"
                                                                data-id="cost.field_of_cost.create" name="permissions[]"
                                                                value="cost.field_of_cost.create">
                                                            <label class="form-check-label"
                                                                for="perm-field-of-cost-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-field-of-cost-edit"
                                                                data-id="cost.field_of_cost.edit" name="permissions[]"
                                                                value="cost.field_of_cost.edit">
                                                            <label class="form-check-label" for="perm-field-of-cost-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-field-of-cost-delete"
                                                                data-id="cost.field_of_cost.delete" name="permissions[]"
                                                                value="cost.field_of_cost.delete">
                                                            <label class="form-check-label"
                                                                for="perm-field-of-cost-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>




                                            <!-- Child: Add Cost -->

                                            <!-- Cost Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="costDropdownBtn">
                                                        <span>Cost</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="costDropdownBtn">

                                                        <!-- All Cost -->
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-add-cost-index"
                                                                data-id="cost.all_cost.index" name="permissions[]"
                                                                value="cost.all_cost.index">
                                                            <label class="form-check-label" for="perm-add-cost-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Cost Create -->
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-index"
                                                                data-id="cost.create" name="permissions[]"
                                                                value="cost.create">
                                                            <label class="form-check-label" for="perm-cost-index">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <!-- Edit Cost -->
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-edit" data-id="cost.edit"
                                                                name="permissions[]" value="cost.edit">
                                                            <label class="form-check-label" for="perm-cost-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <!-- Delete Cost -->
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                data-group="cost" id="perm-cost-delete"
                                                                data-id="cost.delete" name="permissions[]"
                                                                value="cost.delete">
                                                            <label class="form-check-label" for="perm-cost-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>



                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="shipping" id="perm-shipping-parent" data-id="shipping">
                                                <label class="form-check-label" for="perm-shipping-parent">
                                                    <strong>Shipping</strong>
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.index"
                                                        id="perm-shipping-index" name="permissions[]"
                                                        value="shipping.index">
                                                    <label class="form-check-label" for="perm-shipping-index">
                                                        View</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.create"
                                                        id="perm-shipping-create" name="permissions[]"
                                                        value="shipping.create">
                                                    <label class="form-check-label" for="perm-shipping-create">
                                                        Create</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.edit"
                                                        id="perm-shipping-edit" name="permissions[]"
                                                        value="shipping.edit">
                                                    <label class="form-check-label" for="perm-shipping-edit">
                                                        Edit</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.delete"
                                                        id="perm-shipping-delete" name="permissions[]"
                                                        value="shipping.delete">
                                                    <label class="form-check-label" for="perm-shipping-delete">
                                                        Delete</label>
                                                </div>
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
                                                    <strong>District & Upazila</strong>
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <!-- District Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="districtDropdownBtn">
                                                        <span>District</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="districtDropdownBtn">

                                                        <!-- District Index -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="district.index" id="perm-district-index"
                                                                name="permissions[]">
                                                            <label class="form-check-label" for="perm-district-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Create District -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="district.create" id="perm-district-create"
                                                                name="permissions[]" value="district.create">
                                                            <label class="form-check-label" for="perm-district-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <!-- Edit District -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="district.edit" id="perm-district-edit"
                                                                name="permissions[]" value="district.edit">
                                                            <label class="form-check-label" for="perm-district-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <!-- Delete District -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="district.delete" id="perm-district-delete"
                                                                name="permissions[]" value="district.delete">
                                                            <label class="form-check-label" for="perm-district-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Upazila Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="upazilaDropdownBtn">
                                                        <span>Upazila</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="upazilaDropdownBtn">

                                                        <!-- Upazila Index -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="upazila.index" id="perm-upazila-index"
                                                                name="permissions[]">
                                                            <label class="form-check-label" for="perm-upazila-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Create Upazila -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="upazila.create" id="perm-upazila-create"
                                                                name="permissions[]" value="upazila.create">
                                                            <label class="form-check-label" for="perm-upazila-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <!-- Edit Upazila -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="upazila.edit" id="perm-upazila-edit"
                                                                name="permissions[]" value="upazila.edit">
                                                            <label class="form-check-label" for="perm-upazila-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <!-- Delete Upazila -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="district_upazila"
                                                                data-id="upazila.delete" id="perm-upazila-delete"
                                                                name="permissions[]" value="upazila.delete">
                                                            <label class="form-check-label" for="perm-upazila-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="orders" id="perm-orders-parent" data-id="orders">
                                                <label class="form-check-label"
                                                    for="perm-orders-parent"><strong>Orders</strong></label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="orders" data-id="order.index"
                                                    id="perm-order-index"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-order-index">View</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="orders" data-id="order.show"
                                                    id="perm-order-show"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-order-show">Show</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="orders" data-id="order.status"
                                                    id="perm-order-status"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-order-status">Status</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="orders" data-id="order.delete"
                                                    id="perm-order-delete"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-order-delete">Delete</label>
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
                                                <label class="form-check-label"
                                                    for="perm-payment-method-parent"><strong>Payment
                                                        Method</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="payment_method"
                                                    data-id="payment_method.index" value="payment_method.index"
                                                    id="perm-payment-method"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-payment-method"> View </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="payment_method"
                                                    data-id="payment_method.create" value="payment_method.create"
                                                    id="perm-payment-method-create"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-payment-method-create">Create</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="payment_method"
                                                    data-id="payment_method.edit" value="payment_method.edit"
                                                    id="perm-payment-method-edit"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-payment-method-edit">Edit</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="payment_method"
                                                    data-id="payment_method.delete" value="payment_method.delete"
                                                    id="perm-payment-method-delete"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-payment-method-delete">Delete</label>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="post" id="perm-post-parent" data-id="post">
                                                <label class="form-check-label"
                                                    for="perm-post-parent"><strong>Post</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Post Category Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="postCategoryDropdownBtn">
                                                        <span>Category</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="postCategoryDropdownBtn">

                                                        <!-- Index -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post"
                                                                data-id="post_category.index" id="perm-post-cat-index"
                                                                name="permissions[]" value="post_category.index">
                                                            <label class="form-check-label" for="perm-post-cat-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Create -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post"
                                                                data-id="post_category.create" id="perm-post-cat-create"
                                                                name="permissions[]" value="post_category.create">
                                                            <label class="form-check-label" for="perm-post-cat-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <!-- Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post"
                                                                data-id="post_category.edit" id="perm-post-cat-edit"
                                                                name="permissions[]" value="post_category.edit">
                                                            <label class="form-check-label" for="perm-post-cat-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <!-- Delete -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post"
                                                                data-id="post_category.delete" id="perm-post-cat-delete"
                                                                name="permissions[]" value="post_category.delete">
                                                            <label class="form-check-label" for="perm-post-cat-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Post Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="postDropdownBtn">
                                                        <span>Post</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="postDropdownBtn">

                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post"
                                                                data-id="post.create" value="post.create"
                                                                id="perm-post-create" name="permissions[]">
                                                            <label class="form-check-label" for="perm-post-create">
                                                                Create
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post" data-id="post.edit"
                                                                value="post.edit" id="perm-post-edit"
                                                                name="permissions[]">
                                                            <label class="form-check-label" for="perm-post-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post"
                                                                data-id="post.delete" value="post.delete"
                                                                id="perm-post-delete" name="permissions[]">
                                                            <label class="form-check-label" for="perm-post-delete">
                                                                Delete
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="post" data-id="post.index"
                                                                value="post.index" id="perm-post-index"
                                                                name="permissions[]">
                                                            <label class="form-check-label" for="perm-post-index">
                                                                View
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <!--Start user menu-->

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="users" id="perm-users-parent" data-id="users">
                                                <label class="form-check-label"
                                                    for="perm-users-parent"><strong>Users</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="users" data-id="user.create"
                                                        id="perm-user-create" name="permissions[]"
                                                        value="user.create">
                                                    <label class="form-check-label" for="perm-user-create">
                                                        Create</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="users" data-id="user.edit"
                                                        id="perm-user-edit" name="permissions[]" value="user.edit">
                                                    <label class="form-check-label" for="perm-user-edit">Users
                                                        Edit</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="users" data-id="user.delete"
                                                        id="perm-user-delete" name="permissions[]"
                                                        value="user.delete">
                                                    <label class="form-check-label" for="perm-user-delete">Users
                                                        Delete</label>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <!--End User Menu-->

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="sms" id="perm-sms-parent" data-id="sms">
                                                <label class="form-check-label"
                                                    for="perm-sms-parent"><strong>SMS</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.send"
                                                    id="perm-sms-send"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-sms-send">Send SMS</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.custom"
                                                    id="perm-sms-custom"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-sms-custom">Custom SMS</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.report"
                                                    id="perm-sms-report"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-sms-report">SMS Report</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="sms" data-id="sms.report.delete"
                                                    value="sms.report.delete" id="perm-sms-report-delete"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-sms-report-delete">SMS Delete</label>
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
                                                    for="perm-subscribers-parent"><strong>Subscribers</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="subscribers" data-id="newslatter.index"
                                                    id="perm-newslatter" name="permissions[]" value="newslatter.index">
                                                <label class="form-check-label" for="perm-newslatter">View</label>
                                            </div>


                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="subscribers"
                                                    data-id="newslatter.delete" id="perm-newslatter-delete"
                                                    name="permissions[]" value="newslatter.delete">
                                                <label class="form-check-label" for="perm-newslatter-delete">
                                                    Delete</label>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="messages" id="perm-messages-parent"
                                                    data-id="messages">
                                                <label class="form-check-label"
                                                    for="perm-messages-parent"><strong>Messages</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="messages"
                                                        data-id="contact_form.message.index" id="perm-messages-index"
                                                        name="permissions[]" value="contact_form.message.index">
                                                    <label class="form-check-label" for="perm-messages-index"> View </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="messages"
                                                        data-id="contact_form.message.delete" id="perm-messages-delete"
                                                        name="permissions[]" value="contact_form.message.delete">
                                                    <label class="form-check-label" for="perm-messages-delete"> Delete </label>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <!--Start Block List menu-->

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="blocklist" id="perm-blocklist-parent"
                                                    data-id="blocklist">
                                                <label class="form-check-label"
                                                    for="perm-blocklist-parent"><strong>Block
                                                        Lists</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="blocklist" data-id="block.list"
                                                        id="perm-block-list" name="permissions[]" value="block.list">
                                                    <label class="form-check-label" for="perm-block-list">Block
                                                        List</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="blocklist" data-id="block.unblock"
                                                        id="perm-block-unblock" name="permissions[]"
                                                        value="block.unblock">
                                                    <label class="form-check-label"
                                                        for="perm-block-unblock">Unblock</label>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <!--End Block List menu-->

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="pages" id="perm-pages-parent" data-id="pages">
                                                <label class="form-check-label"
                                                    for="perm-pages-parent"><strong>Pages</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="pages" data-id="privacy_policy"
                                                    id="perm-privacy"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-privacy">Privacy Policy</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="pages" data-id="terms_and_condtion"
                                                    id="perm-terms"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-terms">Terms &
                                                Conditions</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="pages" data-id="return_refund"
                                                    id="perm-refund"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-refund">Return & Refund</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="settings" id="perm-settings-parent"
                                                    data-id="settings">
                                                <label class="form-check-label"
                                                    for="perm-settings-parent"><strong>Settings</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- SMS API Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="smsSettingsDropdownBtn">
                                                        <span>SMS API Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="smsSettingsDropdownBtn">

                                                        <!-- Index -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="sms-settings.index" value="sms-settings.index"
                                                                id="perm-sms-setting-index" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-sms-setting-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="sms-settings.edit" value="sms-settings.edit"
                                                                id="perm-sms-setting-edit" name="permissions[]">
                                                            <label class="form-check-label" for="perm-sms-setting-edit">
                                                               Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Website Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="websiteSettingsDropdownBtn">
                                                        <span>Website Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="websiteSettingsDropdownBtn">

                                                        <!-- View (Index) -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="website_setting.index"
                                                                value="website_setting.index"
                                                                id="perm-website-setting-index" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-website-setting-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- edit (Edit) -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="website_setting.edit"
                                                                value="website_setting.edit"
                                                                id="perm-website-setting-edit" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-website-setting-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Admin Panel Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="adminSettingsDropdownBtn">
                                                        <span>Admin Panel Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="adminSettingsDropdownBtn">

                                                        <!-- View (Index) -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="admin_panel_settings.index"
                                                                value="admin_panel_settings.index"
                                                                id="perm-admin-settings-index" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-admin-settings-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="admin_panel_settings.edit"
                                                                value="admin_panel_settings.edit"
                                                                id="perm-admin-settings-edit" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-admin-settings-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Color Theme Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="colorThemeDropdownBtn">
                                                        <span>Color Theme Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="colorThemeDropdownBtn">

                                                        <!-- View (Index) -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="color_theme_settings.index"
                                                                value="color_theme_settings.index"
                                                                id="perm-color-theme-index" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-color-theme-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="color_theme_settings.edit"
                                                                value="color_theme_settings.edit"
                                                                id="perm-color-theme-edit" name="permissions[]">
                                                            <label class="form-check-label" for="perm-color-theme-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Social Icon Settings Dropdown -->
                                            <div class="mr-3 mb-2 d-inline-block">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-between"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="socialIconDropdownBtn">
                                                        <span>Social Icon Settings</span>
                                                        <i class="fas fa-chevron-down ml-2 dropdown-icon"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-3 shadow"
                                                        aria-labelledby="socialIconDropdownBtn">

                                                        <!-- View (Index) -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="social_icon_settings.index"
                                                                value="social_icon_settings.index"
                                                                id="perm-social-icon-index" name="permissions[]">
                                                            <label class="form-check-label"
                                                                for="perm-social-icon-index">
                                                                View
                                                            </label>
                                                        </div>

                                                        <!-- Edit -->
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input child-checkbox permission-checkbox"
                                                                type="checkbox" data-group="settings"
                                                                data-id="social_icon_settings.edit"
                                                                value="social_icon_settings.edit"
                                                                id="perm-social-icon-edit" name="permissions[]">
                                                            <label class="form-check-label" for="perm-social-icon-edit">
                                                                Edit
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
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
                                                <label class="form-check-label"
                                                    for="perm-accessinfo-parent"><strong>Access
                                                        Info</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="accessinfo" data-id="visit.log.index"
                                                    id="perm-access-info"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-access-info">Access Info</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <!-- Parent: Privilege -->
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input parent-checkbox permission-checkbox"
                                                    data-group="privilege" id="perm-privilege-parent"
                                                    data-id="privilege">
                                                <label class="form-check-label" for="perm-privilege-parent">
                                                    <strong>Privilege</strong>
                                                </label>
                                            </div>
                                        </td>

                                        <!-- Child: Privilege Index -->
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input child-checkbox permission-checkbox"
                                                    data-group="privilege" id="perm-privilege-index"
                                                    data-id="privilege.index" name="permissions[]"
                                                    value="privilege.index">
                                                <label class="form-check-label" for="perm-privilege-index">
                                                    Privilege Manage
                                                </label>
                                            </div>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">SAVE</button>
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
                    toastr.success('Permissions editd!');
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

    <script>
        $(document).ready(function() {
            $('.parent-checkbox').change(function() {
                var target = $(this).data('target');
                if ($(this).is(':checked')) {
                    $(target).collapse('show');
                } else {
                    $(target).collapse('hide');
                    $(target).find('input[type="checkbox"]').prop('checked',
                        false); // Optional: child uncheck
                }
            });
        });
    </script>
@endpush
