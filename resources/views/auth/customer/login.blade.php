@extends('website.layouts.app')
@section('title', 'Customer login page')
@section('website_content')
    <div class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->
    <!-- accont area start -->
    <div class="account_area ptb-70">
        <div class="container">
            <div class="row">
                <!--register area start-->
                <div class="col-lg-6 col-md-12 register-form">
                    <div class="login_title">
                        <h2>Customer Login</h2>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>
                    <div class="login_form form_register ">
                        <form action="{{ route('customer.login') }}" method="POST">
                            @csrf

                            <div class="login_input">
                                <label>Username (phone) <span>*</span></label>
                                <input type="text" name="phone" placeholder="017XXXXXXXX" value="{{ old('phone') }}">
                            </div>

                            <div class="login_input">
                                <label>Password <span>*</span></label>
                                <input type="password" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div class="login_submit">
                                <button type="submit">Login</button>
                            </div>
                            <div class="login-link mt-3 text-center">
                                You have no an account? <a href="{{ route('customer.register.page') }}">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
@endsection
