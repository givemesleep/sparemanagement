

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin Pro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <style>
        tbody tr:nth-child(n+7) {
            display: none;
        }
        table {
            border-collapse: collapse;
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
                    <div class="container-fluid mt-5">
                        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                            <div class="mr-4 mb-3 mb-sm-0">
                                <h1 class="mb-0">Dashboard</h1>
                                <div class="small"><span class="font-weight-500 text-primary"><?php echo date('l'); ?></span> &middot; <?php echo date('F j, Y'); ?> &middot; <?php echo date('h:s a'); ?></div>
                            </div>

                            
                        </div>

                       <div class="alert alert-primary alert-icon border-top-lg mb-3" id="myAlert" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="alert-icon-aside"><i class="far fa-bell"></i></div>
                                    <div class="alert-icon-content">
                                        <h6 class="alert-heading">Welcome Back!</h6>
                                         Good Day $User! Stay Hydrated and Drink you coffee! ^_^
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-green h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="h4 mb-1 text-green">Spares Received</div>
                                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">4,390</div>  
                                                <!-- <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center"><i class="mr-1" data-feather="trending-up"></i>12%</div> -->
                                            </div>
                                            <div class="ml-2"><i class="fas fa-box-open fa-3x text-gray-200"></i></div>
                                        </div>
                                        <span><small><a class="text-muted" tabindex="0" data-trigger="focus" title="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Total quantity of spare stocks available in the warehouse">Details</a></small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="h4 text-primary mb-1">Spares Pullout</div>
                                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">27</div>
                                                <!-- <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center"><i class="mr-1" data-feather="trending-down"></i>3%</div> -->
                                            </div>
                                            <div class="ml-2"><i class="fas fa-truck fa-3x text-gray-200"></i></div>
                                        </div>
                                        <span><small><a class="text-muted" tabindex="0" data-trigger="focus" title="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Total quantity of spares deployed at the Site">Details</a></small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-warning h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="h4 text-warning mb-1">Spare Defective</div>
                                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">11,291</div>
                                                <!-- <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center"><i class="mr-1" data-feather="trending-up"></i>12%</div> -->
                                            </div>
                                            <div class="ml-2"><i class="fas fa-exclamation-triangle fa-3x text-gray-200"></i></div>
                                        </div>
                                        <span><small><a class="text-muted" tabindex="0" data-trigger="focus" title="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Total quantity of spare pulled out due to casualities">Details</a></small></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-danger h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="h4 text-danger mb-1">Spare Archived</div>
                                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">345</div>
                                                <!-- <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center"><i class="mr-1" data-feather="trending-down"></i>1%</div> -->
                                            </div>
                                            <div class="ml-2"><i class="fas fa-archive fa-3x text-gray-200"></i></div>
                                        </div>
                                        <span><small><a class="text-muted" tabindex="0" data-trigger="focus" title="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Total quantity of spare deleted from the Spare Inventory">Details</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-xl-3 mb-4">
                                <div class="card bg-secondary o-visible mb-4">
                                    <div class="card-body">
                                        <h4 class="text-white">Report generation</h4>
                                        <p class="text-white-50">Tired creating report and manual typing? Say less! Just one click, then we'll get it done for ya! >_-</p>
                                        <img class="float-left" src="assets/img/drawkit/color/drawkit-developer-woman-flush.svg" style="width: 8rem; margin-left: -2.5rem; margin-bottom: -5.5rem;" />
                                    </div>
                                    <div class="card-footer bg-transparent pt-0 border-0 text-right"><a class="btn btn-primary" href="#!">Continue</a></div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">Due Platforms EOSL</div>
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Hardware</h5>
                                                <small class="text-muted">Expiry: 3 years from now <i class="fas fa-circle text-danger"></i></small>
                                                </div>
                                                <p class="mb-1">End of Life: May 2, 2028</p>
                                                <p class="mb-1">End of Support Life: May 2, 2026</p>
                                                <!-- <small>And some small print.</small> -->
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Operating System</h5>
                                                <small class="text-muted">Expiry: 3 years from now <i class="fas fa-circle text-danger"></i></small>
                                                </div>
                                                <p class="mb-1">End of Life: May 2, 2028</p>
                                                <p class="mb-1">End of Support Life: May 2, 2026</p>
                                                <!-- <small class="text-muted">And some muted small print.</small> -->
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Software</h5>
                                                <small class="text-muted">Expiry: 3 years from now <i class="fas fa-circle text-danger"></i></small>
                                                </div>
                                                <p class="mb-1">End of Life: May 2, 2028</p>
                                                <p class="mb-1">End of Support Life: May 2, 2026</p>
                                                <!-- <small class="text-muted">And some muted small print.</small> -->
                                            </a>
                                        </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">Stock Tracker</div>
                                    <div class="card-body">
                                        <div class="chart-pie"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    </div>
                                    <div class="card-footer small text-muted"><span><a class="text-muted" tabindex="0" data-trigger="focus" title="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Total quantity of spare deleted from the Spare Inventory">Details of Chart</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9 mb-4">
                                <div class="card mb-4">
                                    <div class="card-header">Recent Spare Received <i class="fas fa-dot-circle text-success ml-2"></i></div>
                                    <div class="card-body" onload="makeTableScroll();">
                                        <table class="table table-striped" id="myTable">
                                            <tr>
                                                <th>Primary Part No.</th>
                                                <th>Serial No.</th>
                                                <th>Hardware</th>
                                                <th>Location</th>
                                                <th>Date Added</th>
                                                <th>Added By</th>
                                            </tr>
                                            <tr>
                                                <td>4540523-231</td>
                                                <td>20MDK-2</td>
                                                <td>Hard Disk Drive</td>
                                                <td>Tektite</td>
                                                <td>May 02, 2025</td>
                                                <td>Sir Abe</td>
                                            </tr>
                                            <tr>
                                                <td>454223-1231</td>
                                                <td>2GFE2-24</td>
                                                <td>Hard Disk Drive</td>
                                                <td>Tektite</td>
                                                <td>May 02, 2025</td>
                                                <td>Sir Abe</td>
                                            </tr>
                                            <tr>
                                                <td>45433-1441</td>
                                                <td>345FE2-24</td>
                                                <td>Server</td>
                                                <td>Tektite</td>
                                                <td>May 02, 2025</td>
                                                <td>Sir Abe</td>
                                            </tr>
                                            <tr>
                                                <td>947373-643</td>
                                                <td>7993EOO-75</td>
                                                <td>Hard Disk Drive</td>
                                                <td>Tektite</td>
                                                <td>May 02, 2025</td>
                                                <td>Sir Abe</td>
                                            </tr>
                                            <tr>
                                                <td>454223-1231</td>
                                                <td>2GFE2-24</td>
                                                <td>Hard Disk Drive</td>
                                                <td>Tektite</td>
                                                <td>May 02, 2025</td>
                                                <td>Sir Abe</td>
                                            </tr>
                                            <tr>
                                                <td>42243-NDSJ1</td>
                                                <td>LOK8U-RR</td>
                                                <td>Hard Disk Drive</td>
                                                <td>Tektite</td>
                                                <td>May 02, 2025</td>
                                                <td>Sir Abe</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">Sales reporting</div>
                                    <div class="card-body">
                                        <div class="chart-area"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                                    </div>
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
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>

    <script>
        setTimeout(function() {  
            var alertDiv = document.getElementById("myAlert");
                if (alertDiv) {
                    alertDiv.style.display = "none";
                }
                    }, 5000);

    </script>
</html>
