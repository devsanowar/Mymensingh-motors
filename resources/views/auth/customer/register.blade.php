@extends('website.layouts.app')
@section('title', 'Checkout Page')
@section('website_content')
    <!--Breadcrumb section-->
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
                        <h2>Customer Registration</h2>
                    </div>
                    <div class="login_form form_register ">
                        <form action="#">
                            <div class="login_input">
                                <label>Name <span>*</span></label>
                                <input type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <p style="color:red; margin-top:5px;">{{ $message }}</p>
                            @enderror
                            <div class="login_input">
                                <label>Phone <span>*</span></label>
                                <input type="text" name="phone" placeholder="017XXXXXXXX" value="{{ old('phone') }}">
                            </div>
                            @error('phone')
                                <p style="color:red; margin-top:5px;">{{ $message }}</p>
                            @enderror

                            <div class="login_input">
                                <label>Password <span>*</span></label>
                                <input type="password" id="password" name="password" placeholder="Enter password">
                                <span class="toggle-password" onclick="togglePassword('password', this)"
                                    style="position:absolute; cursor:pointer;">👁️</span>
                            </div>
                            @error('password')
                                <p style="color:red; margin-top:5px;">{{ $message }}</p>
                            @enderror

                            <div class="login_input">
                                <label>Confirm Password <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm password">
                                <span class="toggle-password" onclick="togglePassword('password_confirmation', this)"
                                    style="position:absolute; cursor:pointer;">👁️</span>
                            </div>

                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- accont area end -->
@endsection

@push('scripts')
    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            el.textContent = isPassword ? '🙈' : '👁️';
        }
    </script>
@endpush
