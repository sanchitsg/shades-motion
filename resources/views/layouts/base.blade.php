<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Shades And Motion - The Creative Hub</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>

        <!-- Custom CSS for this webpage -->
        @yield('styles')
        <link href="{{ url('assets/css/layouts/layout.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/layouts/header.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/layouts/footer.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid layout-main">
            <!-- Header -->
            @include('layouts.headers')
            <!-- Header Ends -->

            <!-- Main Content -->
            @yield('content')
            <!-- Main Content -->

            <!-- Footer -->
            @include('layouts.footers')
            <!-- Footer Ends -->
        </div>

        <!-- Modals -->
        @include('layouts.modals')
        <!-- Modals Ends -->

        <!-- JQuery Min Javascript -->
        <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap Bundle Min JavaScript -->
        <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Plugin JavaScript -->
        <script src="{{ url('assets/plugins/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom CSS for this webpage -->
        @yield('scripts')
        <script src="{{ url('assets/js/app.js') }}"></script>
        
    </body>
</html>