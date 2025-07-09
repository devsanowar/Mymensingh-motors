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
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>{{ $pageTitle }}</li>
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
                            <p>{!! $website_setting->footer_content !!}</p>
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
                                        <p>{!! $website_setting->address !!}</p>
                                    </div>
                                </div>
                                <div class="single-contact-list">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-phone"></i>
                                    </div>
                                    @php
                                        $ArrayNumbers = array_map('trim', explode(",", $website_setting->phone));
                                    @endphp
                                    <div class="conatct-desc">
                                        @foreach ($ArrayNumbers as $number)
                                        <p>{{ $number }} <br></p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="single-contact-list">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    
                                    <div class="conatct-desc">
                                        <p>{{ $website_setting->email }} <br/> </p>
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
                                src="{{ $website_setting->google_map }}"
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