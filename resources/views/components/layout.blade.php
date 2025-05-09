
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
    <body class="nav-fixed">

        <!-- Top Nav -->

        @php
            $CurrentUser = Session::get('user');
            $users = $CurrentUser->username;
            $emails = $CurrentUser->email;
        @endphp

        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i class="bi bi-list"></i></button><a class="navbar-brand d-none d-sm-block" href="#">Spare Management</a>
            
                <ul class="navbar-nav align-items-center ml-auto">
                    <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-fluid" src="{{ asset('bootstrap/assets/img/kashinero.jpg') }}"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                            <h6 class="dropdown-header d-flex align-items-center">
                                <img class="dropdown-user-img" src="{{ asset('bootstrap/assets/img/kashinero.jpg') }}" />
                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-details-name"><b>@php echo $users; @endphp </b></div>
                                    <div class="dropdown-user-details-email">@php echo $emails; @endphp </div>
                                </div>
                            </h6>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!">
                                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                                    Account
                                </a>
                                <a class="dropdown-item" href="{{ route('logins.logout') }}">
                                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                Logout
                                </a>
                        </div>
                    </li>
                </ul>
        </nav>


        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            
                            <div class="sidenav-menu-heading">Primary</div>
                            
                            <a class="nav-link" href="{{ route('primary.index') }}">
                                <div class="nav-link-icon"><i class="bi bi-grid-fill"></i></div>
                                <strong style="opacity: 40%;">Dashboard</strong>
                            </a>

                            <div class="sidenav-menu-heading">Spare Management</div>

                            <a class="nav-link" href="{{ route('spares.sparesReceived') }}" >
                                <div class="nav-link-icon"><i class="bi bi-cloud-plus-fill"></i></div>
                                <strong style="opacity: 40%;">Add Spares Received</strong>
                            </a>

                            <a class="nav-link" href="{{ route('spares.sparesPending') }}">
                                <div class="nav-link-icon"><i class="bi bi-clock-fill"></i></div>
                                <strong style="opacity: 40%;">Spares Approval</strong>
                            </a>

                            <a class="nav-link" href="{{ route('spares.sparesTable') }}">
                                <div class="nav-link-icon"><i class="bi bi-floppy-fill"></i></div>
                                <strong style="opacity: 40%;">Spares Inventory</strong>
                            </a>

                            <a class="nav-link" href="{{ route('spares.sparesPullout') }}">
                                <div class="nav-link-icon"><i class="bi bi-truck"></i></div>
                                <strong style="opacity: 40%;">Spares Pullout</strong>
                            </a>

                            <a class="nav-link" href="{{ route('spares.sparesEOSL') }}">
                                <div class="nav-link-icon"><i class="bi bi-hdd-stack-fill"></i></div>
                                <strong style="opacity: 40%;">Product Lifecycle</strong>
                            </a>

                            <a class="nav-link" href="{{ route('spares.sparesDefect') }}">
                                <div class="nav-link-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
                                <strong style="opacity: 40%;">Spares Defective</strong>
                            </a>

                            <a class="nav-link" href="{{ route('logins.login') }}">
                                <div class="nav-link-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
                                <strong style="opacity: 40%;">User Management</strong>
                            </a>

                            

                            <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Tables
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="">Spares Inventory</a>
                                    <a class="nav-link" href="">Spares Pull Out</a>
                                    <a class="nav-link" href="">Spares for Approval</a>
                                    <a class="nav-link" href=""></a>
                                    
                                </nav>
                            </div> -->

                            <!-- <div class="sidenav-menu-heading">Hardware Management</div> -->

                            
                            
                            <!-- <a class="nav-link" href="">
                                <div class="nav-link-icon"><i data-feather="calendar"></i></div>
                                Spares Pull Out
                            </a> -->

                            <!-- <a class="nav-link" href="">
                                <div class="nav-link-icon"><i data-feather="calendar"></i></div>
                                Spares for Approval
                            </a>

                            <a class="nav-link" href="">
                                <div class="nav-link-icon"><i data-feather="calendar"></i></div>
                                Spares Defective
                            </a>


                            <div class="sidenav-menu-heading">Spares Ticket</div>
                            
                            <a class="nav-link" href="">
                                <div class="nav-link-icon"><i data-feather="calendar"></i></div>
                                Add Spares Ticket
                            </a>

                            <a class="nav-link" href="">
                                <div class="nav-link-icon"><i data-feather="calendar"></i></div>
                                Spares Ticket 
                            </a> -->

                                
                            <div class="sidenav-menu-heading">System Management</div>

                            <a class="nav-link" href="#">
                                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                                Import & Export 
                            </a>
                            
                            

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                @yield('main')

                <!-- Footer Area -->

                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>


                    </div>
                </footer>
            </div>
        </div>
        @yield('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
