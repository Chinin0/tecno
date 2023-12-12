<!DOCTYPE html>
<html lang="en">
<head>
    @section('head')
        @section('meta')
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <link rel="icon" href="{{ asset('static/images/favicon.ico') }}" type="image/ico" />
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" type="text/css" href="{{ asset('static/build/css/plans.css') }}">
        @show

        <title>Gentelella Alela! | @yield('title')</title>

        @section('stylesheets')
            <!-- Bootstrap -->
            <link href="{{ asset('static/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="{{ asset('static/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
            <!-- NProgress -->
            <link href="{{ asset('static/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
            <!-- bootstrap-daterangepicker -->
            <link href="{{ asset('static/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
            <!-- iCheck -->
            <link href="{{ asset('static/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
            <!-- bootstrap-progressbar -->
            <link href="{{ asset('static/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
            <!-- JQVMap -->
            <link href="{{ asset('static/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        @show

        <!-- Custom Theme Style -->
        <link href="{{ asset('static/build/css/custom.css') }}" rel="stylesheet">
    @show
</head>

<body class="@yield('body_class') nav-md" style="overflow-y: hidden;">

    @section('body')
        <div class="container body">
            <div class="main_container">

                @section('sidebar')
                    <div class="col-md-3 left_col @yield('sidebar_class')">
                        @include("base.sidebar")
                    </div>
                @show

                @section('top_navigation')
                    <div class="top_nav">
                        @include("base.top_navigation")
                    </div>
                @show

                @section('content')
                    <!-- Contenido específico aquí -->
                @show

                @section('footer')
                    <footer>
                        @include("base.footer")
                    </footer>
                @show
            </div>
        </div>

        @section('javascripts')
            <!-- jQuery -->
            <script src="{{ asset('static/vendors/jquery/dist/jquery.min.js') }}"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('static/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
            <!-- FastClick -->
            <script src="{{ asset('static/vendors/fastclick/lib/fastclick.js') }}"></script>
            <!-- NProgress -->
            <script src="{{ asset('static/vendors/nprogress/nprogress.js') }}"></script>
            <!-- bootstrap-progressbar -->
            <script src="{{ asset('static/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
            <!-- iCheck -->
            <script src="{{ asset('static/vendors/iCheck/icheck.min.js') }}"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="{{ asset('static/vendors/moment/min/moment.min.js') }}"></script>
            <script src="{{ asset('static/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
            <!-- bootstrap-wysiwyg -->
            <script src="{{ asset('static/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
            <script src="{{ asset('static/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
            <script src="{{ asset('static/vendors/google-code-prettify/src/prettify.js') }}"></script>
            <!-- jQuery Tags Input -->
            <script src="{{ asset('static/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
            <!-- Switchery -->
            <script src="{{ asset('static/vendors/switchery/dist/switchery.min.js') }}"></script>
            <!-- Select2 -->
            <script src="{{ asset('static/vendors/select2/dist/js/select2.full.min.js') }}"></script>
            <!-- Autosize -->
            <script src="{{ asset('static/vendors/autosize/dist/autosize.min.js') }}"></script>
            <!-- jQuery autocomplete -->
            <script src="{{ asset('static/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
            <!-- starrr -->
            <script src="{{ asset('static/vendors/starrr/dist/starrr.js') }}"></script>
        @show

        <!-- Custom Theme Scripts -->
        <script src="{{ asset('static/build/js/custom.js') }}"></script>
    @show
</body>
</html>
