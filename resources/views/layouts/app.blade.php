<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Config::get('app.name') }}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">
<style>
.table th{
    font-weight: bold !important;
}
</style>
@yield('style')
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>

<body class="menubar-hoverable header-fixed ">
@if(!Auth::guest())
    @include('layouts.header')
@endif
@if(!Auth::guest())
    @include('layouts.sidebar')
@endif
@if(!Auth::guest())
    @yield('content')
@endif
@yield('login')
        <!-- BEGIN JAVASCRIPT -->
        {{-- <script src="{{ asset('js/materialize.js') }}"></script> --}}
        <script src="{{ asset('assetAdmin/assets/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/spin.js/spin.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/autosize/jquery.autosize.min.js') }}"></script>

        <script src="{{ asset('assetAdmin/assets/js/libs/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/multi-select/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/typeahead/typeahead.bundle.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/moment/moment.min.js') }}"></script>

        <script src="{{ asset('assetAdmin/assets/js/libs/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/flot/jquery.flot.time.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/flot/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/flot/curvedLines.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/d3/d3.min.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/d3/d3.v3.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/libs/rickshaw/rickshaw.min.js') }}"></script>

        <script src="{{ asset('assetAdmin/assets/js/core/source/App.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/source/AppNavigation.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/source/AppOffcanvas.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/source/AppCard.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/source/AppForm.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/source/AppNavSearch.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/source/AppVendor.js') }}"></script>

        <script src="{{ asset('assetAdmin/assets/js/core/demo/Demo.js') }}"></script>
        <script src="{{ asset('assetAdmin/assets/js/core/demo/DemoDashboard.js') }}"></script>
        <!-- END JAVASCRIPT -->
        @yield('script')

    </body>
</html>
