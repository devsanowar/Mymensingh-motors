
	@php
        use App\Models\WebsiteSetting;
        use App\Models\WebsiteSocialIcon;
        $website_setting = WebsiteSetting::first();
        $website_social = WebsiteSocialIcon::first();
    @endphp


<!--Newsletter section start -->
        <div class="newsletter_section ptb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5">
                        <div class="newsletter_text">
                            <h2>Get All Updates</h2>
                            <p>Sign up our newsleter today. Also get allert for new product.</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="newsletter_form">
                            <form id="newsletterForm">
                                @csrf
                                <input type="text" name="phone" placeholder="Type your phone number">
                                <button type="submit" class="subscribe-button">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Newsletter section end -->


        <!--Footer start-->
        <footer class="footer_area">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="our_help_services ptb-80">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="help_service d-flex">
                                            <div class="h_ser_icon">
                                                <i class="zmdi zmdi-boat"></i>
                                            </div>
                                            <div class="h_ser_text">
                                                <h3>Free Shipping</h3>
                                                <p>Free Shipping on Chicago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="help_service d-flex justify-content-center">
                                            <div class="h_ser_icon">
                                                <i class="zmdi zmdi-shield-security"></i>
                                            </div>
                                            <div class="h_ser_text">
                                                <h3>Money Guarentee</h3>
                                                <p>Free Shipping on Chicago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="help_service d-flex justify-content-end">
                                            <div class="h_ser_icon">
                                                <i class="zmdi zmdi-phone-setting"></i>
                                            </div>
                                            <div class="h_ser_text">
                                                <h3>Online Support</h3>
                                                <p>Free Shipping on Chicago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom ptb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single_footer widget_description">
                                <p>{!! $website_setting->footer_content ?? 'No footer content found' !!}</p>
                                <div class="addresses_inner">
                                    <div class="single_address">
                                        <p>
                                            <span> Address: </span> <span>{{ $website_setting->address }}</span>
                                        </p>

                                        @php
                                            $ArrayNumbers = array_map('trim', explode(",", $website_setting->phone));
                                        @endphp


                                        <p>
                                            Phone:  
                                            @foreach ($ArrayNumbers as $number)
                                                <span style="margin-right: 10px;">{{ $number }}</span>
                                            @endforeach
                                        </p>

                                        <p>
                                            WhatsApp :  <a class="text-white" href="https://api.whatsapp.com/send?phone=8801711944705" target="_blank">{{ $website_setting->whatsapp_number }}</a>
                                        </p>

                                    </div>
                                </div>
                                <div class="social__icon">
                                    <ul>
                                        <li>
                                            <a class="facebook" href="{!! $website_social->facebook_url ?? '#' !!}" target="_blank" title="Facebook">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="{!! $website_social->googleplus_url ?? '#' !!}" target="_blank" title="Google Plus">
                                                <i class="fa-brands fa-google"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="{!! $website_social->twitter_url ?? '#' !!}" target="_blank" title="Twitter">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="linkedin" href="{!! $website_social->linkedin_url ?? '#' !!}" target="_blank" title="LinkedIn">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_footer footer_widget_menu">
                                <div class="widget_title">
                                    <h3>Services</h3>
                                </div>
                                <ul>
                                    <li><a href="#">free shipping</a></li>
                                    <li><a href="#">Product Delivary</a></li>
                                    <li><a href="#">Product Tracking</a></li>
                                    <li><a href="#">Online Pyament</a></li>
                                    <li><a href="#">Discount</a></li>
                                    <li><a href="#">Online Vendor</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_footer footer_widget_menu">
                                <div class="widget_title">
                                    <h3>Support</h3>
                                </div>
                                <ul>
                                    <li><a href="#">QUeality</a></li>
                                    <li><a href="#">Order Details</a></li>
                                    <li><a href="#">Order Slips</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Store Deal</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_footer footer_widget_menu">
                                <div class="widget_title">
                                    <h3>Account</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account </a></li>
                                    <li><a href="#">order history</a></li>
                                    <li><a href="#">wishslist</a></li>
                                    <li><a href="#">Cart Details</a></li>
                                    <li><a href="#">Compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright_inner text-center">
                                <p>© 2025 Mymensingh Motor's Mede with ❤️ by <a class="text-white"
                                        href="https://www.freelanceit.com.bd/" target="_blank">Freelance IT</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer end-->

        @push('scripts')
            <script>
                $(document).ready(function() {
                    $(document).on('click', '.subscribe-button', function(e) {
                        e.preventDefault();

                        var formData = $('#newsletterForm').serialize(); // ✅ ফর্মের ডাটা সংগ্রহ করো

                        $.ajax({
                            url: '/subscribe-newsletter',
                            method: 'POST',
                            data: formData,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                toastr.success('বার্তাটি সফলভাবে পাঠানো হয়েছে');
                                $('#newsletterForm')[0].reset();
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
