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

                                            <!-- Start Slider home page menu -->
                                            {{-- <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#slider-permissions"
                                                    aria-expanded="false" aria-controls="slider-permissions">
                                                    Slider
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="slider-permissions">
                                                <div class="card card-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="home" id="perm-home-slider-index"
                                                            data-id="home.slider.index" name="permissions[]"
                                                            value="home.slider.index">
                                                        <label class="form-check-label" for="perm-home-slider-index">
                                                            Slider View
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="home" id="perm-home-slider-store"
                                                            data-id="home.slider.store" name="permissions[]"
                                                            value="home.slider.store">
                                                        <label class="form-check-label" for="perm-home-slider-store">
                                                            Slider Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="home" id="perm-home-slider-update"
                                                            data-id="home.slider.update" name="permissions[]"
                                                            value="home.slider.update">
                                                        <label class="form-check-label" for="perm-home-slider-update">
                                                            Slider Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="home" id="perm-home-slider-delete"
                                                            data-id="home.slider.delete" name="permissions[]"
                                                            value="home.slider.delete">
                                                        <label class="form-check-label" for="perm-home-slider-delete">
                                                            Slider Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!-- End slider home page menu -->

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
                                                                    for="perm-home-slider-index">Slider View</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-store" data-id="home.slider.store"
                                                                    name="permissions[]" value="home.slider.store">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-store">Slider Create</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-update"
                                                                    data-id="home.slider.update" name="permissions[]"
                                                                    value="home.slider.update">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-update">Slider Update</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-slider-delete"
                                                                    data-id="home.slider.delete" name="permissions[]"
                                                                    value="home.slider.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-slider-delete">Slider Delete</label>
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
                                                                    Promo Banner
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-promobanner-store"
                                                                    data-id="home.promobanner.store" name="permissions[]"
                                                                    value="home.promobanner.store">
                                                                <label class="form-check-label"
                                                                    for="perm-home-promobanner-store">
                                                                    Promo Banner Store
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-promobanner-update"
                                                                    data-id="home.promobanner.update" name="permissions[]"
                                                                    value="home.promobanner.update">
                                                                <label class="form-check-label"
                                                                    for="perm-home-promobanner-update">
                                                                    Promo Banner Update
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
                                                                    for="perm-home-about-index">About</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-about-update"
                                                                    data-id="home.about.update" name="permissions[]"
                                                                    value="home.about.update">
                                                                <label class="form-check-label"
                                                                    for="perm-home-about-update">About Update</label>
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
                                                                    for="perm-home-why-index">Why Choose Us View</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-store"
                                                                    data-id="home.why_chose_us.store" name="permissions[]"
                                                                    value="home.why_chose_us.store">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-store">Why Choose Us Create</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-update"
                                                                    data-id="home.why_chose_us.update"
                                                                    name="permissions[]" value="home.why_chose_us.update">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-update">Why Choose Us Update</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input child-checkbox permission-checkbox"
                                                                    type="checkbox" data-group="home"
                                                                    id="perm-home-why-delete"
                                                                    data-id="home.why_chose_us.delete"
                                                                    name="permissions[]" value="home.why_chose_us.delete">
                                                                <label class="form-check-label"
                                                                    for="perm-home-why-delete">Why Choose Us Delete</label>
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
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-cta-index" data-id="home.cta.index"
                    name="permissions[]" value="home.cta.index">
                <label class="form-check-label" for="perm-home-cta-index">
                    CTA View
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-cta-store" data-id="home.cta.store"
                    name="permissions[]" value="home.cta.store">
                <label class="form-check-label" for="perm-home-cta-store">
                    CTA Create
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-cta-update" data-id="home.cta.update"
                    name="permissions[]" value="home.cta.update">
                <label class="form-check-label" for="perm-home-cta-update">
                    CTA Update
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-cta-delete" data-id="home.cta.delete"
                    name="permissions[]" value="home.cta.delete">
                <label class="form-check-label" for="perm-home-cta-delete">
                    CTA Delete
                </label>
            </div>

        </div>
    </div>
</div>


                                                <!-- Achievement Dropdown -->
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
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-achievement-index" data-id="home.achievement.index"
                    name="permissions[]" value="home.achievement.index">
                <label class="form-check-label" for="perm-home-achievement-index">
                    Achievement View
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-achievement-store" data-id="home.achievement.store"
                    name="permissions[]" value="home.achievement.store">
                <label class="form-check-label" for="perm-home-achievement-store">
                    Achievement Create
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-achievement-update" data-id="home.achievement.update"
                    name="permissions[]" value="home.achievement.update">
                <label class="form-check-label" for="perm-home-achievement-update">
                    Achievement Update
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-achievement-delete" data-id="home.achievement.delete"
                    name="permissions[]" value="home.achievement.delete">
                <label class="form-check-label" for="perm-home-achievement-delete">
                    Achievement Delete
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
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-review-index" data-id="home.review.index"
                    name="permissions[]" value="home.review.index">
                <label class="form-check-label" for="perm-home-review-index">
                    Review View
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-review-store" data-id="home.review.store"
                    name="permissions[]" value="home.review.store">
                <label class="form-check-label" for="perm-home-review-store">
                    Review Create
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-review-update" data-id="home.review.update"
                    name="permissions[]" value="home.review.update">
                <label class="form-check-label" for="perm-home-review-update">
                    Review Update
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-review-delete" data-id="home.review.delete"
                    name="permissions[]" value="home.review.delete">
                <label class="form-check-label" for="perm-home-review-delete">
                    Review Delete
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
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-faq-index" data-id="home.faq.index"
                    name="permissions[]" value="home.faq.index">
                <label class="form-check-label" for="perm-home-faq-index">
                    FAQ View
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-faq-store" data-id="home.faq.store"
                    name="permissions[]" value="home.faq.store">
                <label class="form-check-label" for="perm-home-faq-store">
                    FAQ Create
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-faq-update" data-id="home.faq.update"
                    name="permissions[]" value="home.faq.update">
                <label class="form-check-label" for="perm-home-faq-update">
                    FAQ Update
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input child-checkbox permission-checkbox"
                    type="checkbox" data-group="home"
                    id="perm-home-faq-delete" data-id="home.faq.delete"
                    name="permissions[]" value="home.faq.delete">
                <label class="form-check-label" for="perm-home-faq-delete">
                    FAQ Delete
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

                                        <!-- Child checkboxes under About -->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="about_page" id="perm-about-page"
                                                    data-id="about.page" name="permissions[]" value="about.page">
                                                <label class="form-check-label" for="perm-about-page">
                                                    About Page
                                                </label>
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

                                            <!-- Start Product menu accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#product-permissions"
                                                    aria-expanded="false" aria-controls="product-permissions">
                                                    Product
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="product-permissions">
                                                <div class="card card-body">

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-index"
                                                            data-id="product.index" name="permissions[]"
                                                            value="product.index">
                                                        <label class="form-check-label" for="perm-product-index">All
                                                            Products</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-create"
                                                            data-id="product.create" name="permissions[]"
                                                            value="product.create">
                                                        <label class="form-check-label" for="perm-product-create">Add
                                                            Product</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-edit"
                                                            data-id="product.edit" name="permissions[]"
                                                            value="product.edit">
                                                        <label class="form-check-label" for="perm-product-edit">Edit
                                                            Product</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-delete"
                                                            data-id="product.delete" name="permissions[]"
                                                            value="product.delete">
                                                        <label class="form-check-label" for="perm-product-delete">Delete
                                                            Product</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Product menu accordion -->


                                            <!-- Start Product Category accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#product-category-permissions"
                                                    aria-expanded="false" aria-controls="product-category-permissions">
                                                    Product Category
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="product-category-permissions">
                                                <div class="card card-body">

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-category-index"
                                                            data-id="product.category" name="permissions[]"
                                                            value="product.category">
                                                        <label class="form-check-label"
                                                            for="perm-category-index">Category</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-category-create"
                                                            data-id="product.category.create" name="permissions[]"
                                                            value="product.category.create">
                                                        <label class="form-check-label" for="perm-category-create">Add
                                                            Category</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-category-edit"
                                                            data-id="product.category.edit" name="permissions[]"
                                                            value="product.category.edit">
                                                        <label class="form-check-label" for="perm-category-edit">Edit
                                                            Category</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-category-delete"
                                                            data-id="product.category.delete" name="permissions[]"
                                                            value="product.category.delete">
                                                        <label class="form-check-label" for="perm-category-delete">Delete
                                                            Category</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Product Category accordion -->


                                            <!-- Start Product Brand accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#product-brand-permissions"
                                                    aria-expanded="false" aria-controls="product-brand-permissions">
                                                    Brand
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="product-brand-permissions">
                                                <div class="card card-body">

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-brand-index"
                                                            data-id="product.brand" name="permissions[]"
                                                            value="product.brand">
                                                        <label class="form-check-label"
                                                            for="perm-brand-index">Brand</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-brand-create"
                                                            data-id="product.brand.create" name="permissions[]"
                                                            value="product.brand.create">
                                                        <label class="form-check-label" for="perm-brand-create">Add
                                                            Brand</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-brand-edit"
                                                            data-id="product.brand.edit" name="permissions[]"
                                                            value="product.brand.edit">
                                                        <label class="form-check-label" for="perm-brand-edit">Edit
                                                            Brand</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-brand-delete"
                                                            data-id="product.brand.delete" name="permissions[]"
                                                            value="product.brand.delete">
                                                        <label class="form-check-label" for="perm-brand-delete">Delete
                                                            Brand</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Product Brand accordion -->


                                            <!-- Start Product Unit accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#product-unit-permissions"
                                                    aria-expanded="false" aria-controls="product-unit-permissions">
                                                    Product Unit
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="product-unit-permissions">
                                                <div class="card card-body">

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-unit"
                                                            data-id="product.unit" name="permissions[]"
                                                            value="product.unit">
                                                        <label class="form-check-label" for="perm-product-unit">Product
                                                            Unit</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-unit-create"
                                                            data-id="product.unit.create" name="permissions[]"
                                                            value="product.unit.create">
                                                        <label class="form-check-label" for="perm-product-unit-create">Add
                                                            Product Unit</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-unit-edit"
                                                            data-id="product.unit.edit" name="permissions[]"
                                                            value="product.unit.edit">
                                                        <label class="form-check-label" for="perm-product-unit-edit">Edit
                                                            Product Unit</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="product" id="perm-product-unit-delete"
                                                            data-id="product.unit.delete" name="permissions[]"
                                                            value="product.unit.delete">
                                                        <label class="form-check-label"
                                                            for="perm-product-unit-delete">Delete Product Unit</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Product Unit accordion -->

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
                                                    Stock Manage
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
                                            <!-- Start Cost Category accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#cost-category-permissions"
                                                    aria-expanded="false" aria-controls="cost-category-permissions">
                                                    Cost Category
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="cost-category-permissions">
                                                <div class="card card-body">

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-category"
                                                            data-id="cost.cost_category" name="permissions[]"
                                                            value="cost.cost_category">
                                                        <label class="form-check-label" for="perm-cost-category">
                                                            Cost Category
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-category-create"
                                                            data-id="cost.cost_category.create" name="permissions[]"
                                                            value="cost.cost_category.create">
                                                        <label class="form-check-label" for="perm-cost-category-create">
                                                            Add Cost Category
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-category-edit"
                                                            data-id="cost.cost_category.edit" name="permissions[]"
                                                            value="cost.cost_category.edit">
                                                        <label class="form-check-label" for="perm-cost-category-edit">
                                                            Edit Cost Category
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-category-delete"
                                                            data-id="cost.cost_category.delete" name="permissions[]"
                                                            value="cost.cost_category.delete">
                                                        <label class="form-check-label" for="perm-cost-category-delete">
                                                            Delete Cost Category
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Cost Category accordion -->




                                            <!-- Start Field Of Cost accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#field-of-cost-permissions"
                                                    aria-expanded="false" aria-controls="field-of-cost-permissions">
                                                    Field Of Cost
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="field-of-cost-permissions">
                                                <div class="card card-body">

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-field-of-cost"
                                                            data-id="cost.field_of_cost" name="permissions[]"
                                                            value="cost.field_of_cost">
                                                        <label class="form-check-label" for="perm-field-of-cost">
                                                            Field Of Cost
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-field-of-cost-create"
                                                            data-id="cost.field_of_cost.create" name="permissions[]"
                                                            value="cost.field_of_cost.create">
                                                        <label class="form-check-label" for="perm-field-of-cost-create">
                                                            Add Field Of Cost
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-field-of-cost-edit"
                                                            data-id="cost.field_of_cost.edit" name="permissions[]"
                                                            value="cost.field_of_cost.edit">
                                                        <label class="form-check-label" for="perm-field-of-cost-edit">
                                                            Edit Field Of Cost
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-field-of-cost-delete"
                                                            data-id="cost.field_of_cost.delete" name="permissions[]"
                                                            value="cost.field_of_cost.delete">
                                                        <label class="form-check-label" for="perm-field-of-cost-delete">
                                                            Delete Field Of Cost
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Field Of Cost accordion -->



                                            <!-- Child: Add Cost -->

                                            <!-- Start Cost accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#cost-permissions"
                                                    aria-expanded="false" aria-controls="cost-permissions">
                                                    Cost
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="cost-permissions">
                                                <div class="card card-body">

                                                    <!-- Original Add Cost (unchanged) -->
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-add-cost" data-id="cost.all_cost"
                                                            name="permissions[]" value="cost.all_cost">
                                                        <label class="form-check-label" for="perm-add-cost">
                                                            All Cost
                                                        </label>
                                                    </div>

                                                    <!-- Cost Index -->
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-index" data-id="cost.create"
                                                            name="permissions[]" value="cost.create">
                                                        <label class="form-check-label" for="perm-cost-index">
                                                            Cost Create
                                                        </label>
                                                    </div>

                                                    <!-- Cost Edit -->
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-edit" data-id="cost.edit"
                                                            name="permissions[]" value="cost.edit">
                                                        <label class="form-check-label" for="perm-cost-edit">
                                                            Edit Cost
                                                        </label>
                                                    </div>

                                                    <!-- Cost Delete -->
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input child-checkbox permission-checkbox"
                                                            data-group="cost" id="perm-cost-delete" data-id="cost.delete"
                                                            name="permissions[]" value="cost.delete">
                                                        <label class="form-check-label" for="perm-cost-delete">
                                                            Delete Cost
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Cost accordion -->

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
                                                    <label class="form-check-label" for="perm-shipping-index">Shipping
                                                        View</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.create"
                                                        id="perm-shipping-create" name="permissions[]"
                                                        value="shipping.create">
                                                    <label class="form-check-label" for="perm-shipping-create">Shipping
                                                        Create</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.edit"
                                                        id="perm-shipping-edit" name="permissions[]"
                                                        value="shipping.edit">
                                                    <label class="form-check-label" for="perm-shipping-edit">Shipping
                                                        Edit</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="shipping" data-id="shipping.delete"
                                                        id="perm-shipping-delete" name="permissions[]"
                                                        value="shipping.delete">
                                                    <label class="form-check-label" for="perm-shipping-delete">Shipping
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
                                            <!-- Start District accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#district-permissions"
                                                    aria-expanded="false" aria-controls="district-permissions">
                                                    District
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="district-permissions">
                                                <div class="card card-body">

                                                    <!-- Original District Index -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="district.index" id="perm-district-index"
                                                            name="permissions[]">
                                                        <label class="form-check-label"
                                                            for="perm-district-index">District</label>
                                                    </div>

                                                    <!-- Create District -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="district.create" id="perm-district-create"
                                                            name="permissions[]" value="district.create">
                                                        <label class="form-check-label" for="perm-district-create">Create
                                                            District</label>
                                                    </div>

                                                    <!-- Edit District -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="district.edit" id="perm-district-edit"
                                                            name="permissions[]" value="district.edit">
                                                        <label class="form-check-label" for="perm-district-edit">Edit
                                                            District</label>
                                                    </div>

                                                    <!-- Delete District -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="district.delete" id="perm-district-delete"
                                                            name="permissions[]" value="district.delete">
                                                        <label class="form-check-label" for="perm-district-delete">Delete
                                                            District</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End District accordion -->


                                            <!-- Start Upazila accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#upazila-permissions"
                                                    aria-expanded="false" aria-controls="upazila-permissions">
                                                    Upazila
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="upazila-permissions">
                                                <div class="card card-body">

                                                    <!-- Original Upazila Index -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="upazila.index" id="perm-upazila-index"
                                                            name="permissions[]">
                                                        <label class="form-check-label"
                                                            for="perm-upazila-index">Upazila</label>
                                                    </div>

                                                    <!-- Create Upazila -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="upazila.create" id="perm-upazila-create"
                                                            name="permissions[]" value="upazila.create">
                                                        <label class="form-check-label" for="perm-upazila-create">Create
                                                            Upazila</label>
                                                    </div>

                                                    <!-- Edit Upazila -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="upazila.edit" id="perm-upazila-edit"
                                                            name="permissions[]" value="upazila.edit">
                                                        <label class="form-check-label" for="perm-upazila-edit">Edit
                                                            Upazila</label>
                                                    </div>

                                                    <!-- Delete Upazila -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="district_upazila"
                                                            data-id="upazila.delete" id="perm-upazila-delete"
                                                            name="permissions[]" value="upazila.delete">
                                                        <label class="form-check-label" for="perm-upazila-delete">Delete
                                                            Upazila</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Upazila accordion -->

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
                                                    for="perm-order-index">Orders</label>
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
                                                    data-id="payment_method.index" id="perm-payment-method"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-payment-method">Payment
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
                                                <label class="form-check-label"
                                                    for="perm-post-parent"><strong>Post</strong></label>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Start Post Category accordion -->
                                            <div class="form-check">
                                                <label class="form-check-label" data-toggle="collapse"
                                                    style="cursor: pointer;" data-target="#post-category-permissions"
                                                    aria-expanded="false" aria-controls="post-category-permissions">
                                                    Post Category
                                                    <i class="fas fa-chevron-down ml-1"></i>
                                                </label>
                                            </div>
                                            <div class="collapse ml-4" id="post-category-permissions">
                                                <div class="card card-body">

                                                    <!-- Index -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="post"
                                                            data-id="post_category.index" id="perm-post-cat-index"
                                                            name="permissions[]" value="post_category.index">
                                                        <label class="form-check-label" for="perm-post-cat-index">Post
                                                            Category</label>
                                                    </div>

                                                    <!-- Create -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="post"
                                                            data-id="post_category.create" id="perm-post-cat-create"
                                                            name="permissions[]" value="post_category.create">
                                                        <label class="form-check-label"
                                                            for="perm-post-cat-create">Create Post Category</label>
                                                    </div>

                                                    <!-- Edit -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="post"
                                                            data-id="post_category.edit" id="perm-post-cat-edit"
                                                            name="permissions[]" value="post_category.edit">
                                                        <label class="form-check-label" for="perm-post-cat-edit">Edit
                                                            Post Category</label>
                                                    </div>

                                                    <!-- Delete -->
                                                    <div class="form-check">
                                                        <input class="form-check-input child-checkbox permission-checkbox"
                                                            type="checkbox" data-group="post"
                                                            data-id="post_category.delete" id="perm-post-cat-delete"
                                                            name="permissions[]" value="post_category.delete">
                                                        <label class="form-check-label"
                                                            for="perm-post-cat-delete">Delete Post Category</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Post Category accordion -->


                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post.create"
                                                    value="post.create" id="perm-post-create"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-post-create">Add Post</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post.edit"
                                                    value="post.edit" id="perm-post-edit"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-post-edit">Edit Post</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post.delete"
                                                    value="post.delete" id="perm-post-delete"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-post-delete">Delete Post</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="post" data-id="post.index"
                                                    value="post.index" id="perm-post-index"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-post-index">All Post</label>
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
                                                    <label class="form-check-label" for="perm-user-create">Users
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
                                                    type="checkbox" data-group="subscribers" data-id="newslatter"
                                                    id="perm-newslatter" name="permissions[]" value="newslatter">
                                                <label class="form-check-label" for="perm-newslatter">Subscriber</label>
                                            </div>


                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="subscribers"
                                                    data-id="newslatter.delete" id="perm-newslatter-delete"
                                                    name="permissions[]" value="newslatter.delete">
                                                <label class="form-check-label" for="perm-newslatter-delete">Subscriber
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
                                                        data-id="contact_form.message.view" id="perm-messages-view"
                                                        name="permissions[]" value="contact_form.message.view">
                                                    <label class="form-check-label" for="perm-messages-view">View
                                                        message</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input child-checkbox permission-checkbox"
                                                        type="checkbox" data-group="messages"
                                                        data-id="contact_form.message.delete" id="perm-messages-delete"
                                                        name="permissions[]" value="contact_form.message.delete">
                                                    <label class="form-check-label" for="perm-messages-delete">Delete
                                                        message</label>
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
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="settings" data-id="sms-settings.edit"
                                                    id="perm-sms-setting"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-sms-setting">SMS API
                                                Settings</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input child-checkbox permission-checkbox"
                                                    type="checkbox" data-group="settings" data-id="website_setting"
                                                    id="perm-website-setting"
                                                    name="permissions[]>
                                                <label class="form-check-label"
                                                    for="perm-website-setting">Website
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
