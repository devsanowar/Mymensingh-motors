

<!-- All vendor scripts -->
<script src="{{ asset('backend') }}/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('backend') }}/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('backend') }}/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('backend') }}/assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="{{ asset('backend') }}/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('backend') }}/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->

<!-- Main and custom scripts -->
<script src="{{ asset('backend') }}/assets/bundles/mainscripts.bundle.js"></script>
<script src="{{ asset('backend') }}/assets/js/toastr.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/pages/index.js"></script>
<script src="{{ asset('backend') }}/assets/js/pages/charts/jquery-knob.min.js"></script>

<!-- Toastr Messages -->
{!! Toastr::message() !!}

@if ($errors->any())
    <script>
        toastr.error("{{ $errors->first() }}");
    </script>
@endif

<!-- Stack for additional page-specific scripts -->
@stack('scripts')

