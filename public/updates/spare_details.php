<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin Pro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>

<!-- New Imports -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel@1.0.3"></script>

    </head>

    <style>
        .page-header {
            background: #0a420e;
            background: linear-gradient(90deg, rgba(10, 66, 14, 1) 0%, rgba(65, 97, 19, 1) 100%);
        }
        
       img {
            display:flex;
            float:left; 
            width: 200px;
            height: 200px;    
       }
        ul li::marker {
            color:#75ff00;
        }
       .vl{
            border-left: 1px solid black;
            height:50px;
            color:#c98915;
       }
    </style>

    <body class="nav-fixed">
        <?php
            require_once("components/header.php");
        ?>
        
        <div id="layoutSidenav">
        <?php
            require_once("components/sidenav.php");
        ?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header page-header-dark">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <!-- <div class="page-header-icon"><i data-feather="list"></i></div> -->
                                    <span>SPARE DETAILS</span> &nbsp;
                                </h1>
                                <!-- <div class="page-header-subtitle">An extended version of the DataTables library, customized for SB Admin Pro</div> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid mt-n5">

                        <div class="row ">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header text-monospace font-weight-900 mt-2" style="color:black">
                                        <i data-feather="key"></i>
                                        <h4>&nbsp;Spare ID: 0091</h4>
                                    </div>


                                    <div class="row" style="padding:20px;">
                                        <img src="assets/img/hard.png" alt="" style="margin-left:2%"> &nbsp; &nbsp;
                                            <div class="col">
                                                <h1 style="display:flex; justify-content:space-between;">HARD DISK DRIVE
                                                </h1>
                                                    <span>600GB 1.5-inch SFF</span> 
                                                    <h3>Manufactured by: HPE</h3>
                                                    <h5 class="mt-5">Quantity: 1</h5>
                                                    <span class="badge badge-danger">Pull-out</span>
                                            </div>
                                    </div>
                                </div>

                                    <div class="card mt-4">
                                        <div class="card-header text-black">
                                            Spare Details
                                        </div>
                                        <div class="card-body row g-4">

                                            <div class="col-md-4">
                                                <span>Part No. 1:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700">47H9JF6</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span>Part No.2:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700">E066657-21</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span>Part No.3:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700"></span>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <span>Audit Date:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700">January 28, 2025</span>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <span>Platforms:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700"></span>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <span>Warehouse:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700">Tektite</span>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <span>Serial No.:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700">IJF343W-001</span>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <span>Site:&nbsp;&nbsp;&nbsp;</span>
                                                <span class="font-weight-700">Globe</span>
                                            </div>


                                        </div>
                                    </div>
                            </div>

                            <div class="col-lg-3">
                                    <div class="card px-3">
                                        <p>
                                            <h3>Casuality:</h3>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Spare had been pull out due to disk failure.
                                        </p>
                                        <span class="badge badge-danger col-md-3">Defective</span>
                                        <hr>
                                        <h5>
                                            Spares Tracker
                                        </h5>   
                                        
                                        <p class="mt-3" style=""></p>
                                        <ul>
                                            <li>January 28, 2025</li>
                                            <div class="vl">&nbsp;&nbsp;HDD Received by Sir Abe</div>
                                            <li>February 2, 2025</li>
                                            <div class="vl">&nbsp;&nbsp;Delivered at Tektite Warehouse</div>
                                            <li>February 12, 2025</li>
                                            <div class="vl" style="border:0px;">&nbsp;&nbsp;Pulled out by Sir Rouel</div>
                                        </ul>
                                    </div>
                            </div>
                            
                        </div>

                    </div>
                </main>
                <?php
                    require_once("components/footer.php");
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    </body>
</html>
