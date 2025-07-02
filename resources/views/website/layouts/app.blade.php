<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') | {{ $website_setting->website_title ?? config('app.name') }}
        @else
            {{ $website_setting->website_title ?? config('app.name') }}
        @endif
    </title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/img/logo/logo.jpeg">

    @include('website.layouts.inc.style')

</head>


<body>


    <!-- Add your site or application content here -->

    <div class="mymensingh_wrapper">


        
            @include('website.layouts.inc.header')



        @yield('website_content')




        @include('website.layouts.inc.footer')



    </div>




    <!-- all js here -->

    @include('website.layouts.inc.script')

</body>

</html>
