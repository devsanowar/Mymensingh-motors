@extends('website.layouts.app')
@section('title', 'Contact us')
@section('website_content')

    <!--Breadcrumb section-->
    <div class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->

    <!--Contact us start-->
    <div class="contact-us pt-80">
        <div class="container">


            <!--Conatct form start-->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-form-inner">

                        <div class="contat_form_inner">
                            <div class="contact-form-titile">
                                <h3 class="section-title">Send Us a Message</h3>
                            </div>
                            <form id="contact-form"
                                action="https://preview.hasthemes.com/exporso-preview/exporso/assets/mail.php"
                                method="POST">
                                <div class="single-contact-form d-flex">
                                    <div class="contact-box">
                                        <input type="text" placeholder="Your Name *" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="contact-box">
                                        <input type="text" placeholder="Phone *" name="phone"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box subject">
                                        <input type="email" placeholder="Email*" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" placeholder="Message*">{!! old('message') !!}</textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="submit_btn">Send Message</button>
                                </div>

                                <p class="form-messege"></p>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="contact-us-desc">
                        <div class="get-in-touch">
                            <h3>get in touch</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sedoo eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim aid minim veniam, quihhs
                                nostrud exercitation.</p>
                        </div>
                        <div class="contact-social">
                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            <a href="#"><i class="zmdi zmdi-linkedin"></i></a>
                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>

                        </div>
                        <div class="contact-address">
                            <h3>address</h3>
                            <div class="contact-list">
                                <div class="single-contact-list">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-pin"></i>
                                    </div>
                                    <div class="conatct-desc">
                                        <p>Your address goes here.</p>
                                    </div>
                                </div>
                                <div class="single-contact-list">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-phone"></i>
                                    </div>
                                    <div class="conatct-desc">
                                        <p>+660 256444 24857 <br> +660 256 24857</p>
                                    </div>
                                </div>
                                <div class="single-contact-list">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    <div class="conatct-desc">
                                        <p>info@example.com <br> info@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Conatct form end-->
        </div>


        <div class="container-fluid">
            <div class="row mt-80">
                <div class="col-lg-12 col-md-12 col-12 pl-0 pr-0">
                    <div class="map-area">
                        <div id="googleMap">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.975820934318!2d90.41251877535628!3d23.78559828712632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70b03e3b0bb%3A0x7d1c1b2a0a1a75c5!2sDhaka!5e0!3m2!1sen!2sbd!4v1717641216118!5m2!1sen!2sbd"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Contact us end-->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.submit_btn', function(e) {
                e.preventDefault();

                var formData = $('#contact-form').serialize(); // ✅ ফর্মের ডাটা সংগ্রহ করো

                $.ajax({
                    url: '/contact/submit',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('বার্তাটি সফলভাবে পাঠানো হয়েছে');
                        $('#contact-form')[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('ত্রুটি হয়েছে, আবার চেষ্টা করুন');
                        }
                    }
                });
            });
        });
    </script>
@endpush