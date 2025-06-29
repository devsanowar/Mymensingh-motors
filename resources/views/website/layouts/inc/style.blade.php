 <!-- all css here -->
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/all.min.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugin.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bundle.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom.css">
 <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>


 @php
     use App\Models\WebsiteColor;
     $websiteColor = WebsiteColor::first();
 @endphp

 <style>
     :root {
         --primary: {{ $websiteColor->primary_color }};
         --secondary: {{ $websiteColor->secondary_color }};
         --base: {{ $websiteColor->base_color }};
         --secondary-text: {{ $websiteColor->secondary_text }};
         --btn-primary: {{ $websiteColor->btn_primary }};
         --hover-button: {{ $websiteColor->btn_hover }};
         --black: {{ $websiteColor->black }};
         --white: {{ $websiteColor->white }};
         --basebg: {{ $websiteColor->base_bg_color }};
         --heading-font: "Nunito", sans-serif;
         --title-font: "Pacifico", cursive;
         --body-font: "Roboto", sans-serif;
         --heading-three: 27px;
     }
 </style>


 @stack('styles')
