<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CSO | SIMS</title>
        <link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('bootstrap/assets/img/SIMS_Logo.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        @yield('headscript')
    </head>
    @yield('styles')
    <style>
        .container{
            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);
            
            background-image: url("{{ asset('images/SMS.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .bg-text{
            color: white;
            font-weight: bold;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }
    </style>
    <body class="nav-fixed">
        <div class="container" style="max-width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5);"></div>
       
        <div class="row bg-text">
            <div class="col-lg-4"></div>

            <div class="col-lg-4 mt-5">
                @yield('main')
            </div>

            <div class="col-lg-4"></div>

        </div>

        @yield('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
