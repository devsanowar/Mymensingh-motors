    <!-- all js here -->
    <script src="{{ asset('frontend') }}/assets/js/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/popper.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/all.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/slider.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}




    @stack('scripts')



    
