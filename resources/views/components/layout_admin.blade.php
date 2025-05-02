<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CSO | SIMS</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('bootstrap/assets/img/SIMS_Logo.png') }}" />
        <link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('cdns/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
        <script data-search-pseudo-elements defer src="{{ asset('cdns/all.min.js.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('cdns/feather.min.js.js') }}" crossorigin="anonymous"></script>
        @yield('headscript')
    </head>
    @yield('styles')
    <body class="nav-fixed">

    @yield('scripts')
    </body>
</html>