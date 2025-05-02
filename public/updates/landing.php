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

    </head>

    <style>
        .page-header {
            background: #0a420e;
            background: linear-gradient(90deg, rgba(10, 66, 14, 1) 0%, rgba(65, 97, 19, 1) 100%);
        }

        .container {
        width: 300px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        }

        .loader {
        width: 20px;
        height: 40px;
        border-radius: 10px 50px;
        box-shadow: 0px 0px 5px black;
        animation: dominos 1s ease infinite;
        }

        .loader:nth-child(1) {
        --left: 80px;
        animation-delay: 0.325s;
        background-color: #5d9960;
        }

        .loader:nth-child(2) {
        --left: 70px;
        animation-delay: 0.5s;
        background-color: #82a587;
        }

        .loader:nth-child(3) {
        left: 60px;
        animation-delay: 0.625s;
        background-color: #8bac74;
        }

        .loader:nth-child(4) {
        animation-delay: 0.74s;
        left: 50px;
        background-color: #b9bf90;
        }

        .loader:nth-child(5) {
        animation-delay: 0.865s;
        left: 40px;
        background-color: #e7d2ab;
        }

        @keyframes dominos {
        50% {
            opacity: 0.7;
        }

        75% {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        80% {
            opacity: 1;
        }
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
                                    <div class="container">
                                        <div class="loader"></div>
                                        <div class="loader"></div>
                                        <div class="loader"></div>
                                        <div class="loader"></div>
                                        <div class="loader"></div>
                                    </div>
                                </h1>
                                <!-- <div class="page-header-subtitle">An extended version of the DataTables library, customized for SB Admin Pro</div> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid mt-n5">
                        <div class="card shadow" style="padding:20px;">
                            <h1 class="text-center"><i data-feather="box" style="width: 30px; height: 30px;"></i>SEARCH FOR SPARE DETAILS</h1>
                            <p class="text-center text-monospace font-weight-700 mt-4" style="font-size:50px;">Spare Management Inventory <br> for SMS Global Technologies</p>
                            <p class="text-center mt-4 text-black text-yellow" style="font-size:20px;"> "Where problems become possibilities." </p>

                            <form action="">
                                <div class="form-group row mt-2" style="display:flex; width:110%; justify-content:center;">
                                    <div class="col-md-4"><input class="form-control" id="exampleFormControlInput1" type="email" placeholder="Search for Spares"></div>
                                    <div class="col-md-2"><button type="button" class="btn btn-secondary">Search</button></div>
                                </div>
                            </form>

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

        <script>
            let table = new DataTable('#myTable');
        </script>
        
        <script>
            const button = document.getElementById('slidebutton');
            const box = document.getElementById('slidediv');
            const tables = document.getElementById('table-slide');
            const icon = button.querySelector('i');

            button.addEventListener('click', () => {
                box.classList.toggle('slide-right'); // Add or remove the class t= '60%'; // Increase width
                tables.classList.toggle('table-right'); // Add or remove the class
            });

            document.getElementById('slidebutton').addEventListener('click', function() {
                const icons = document.getElementById('icon');
                icon.classList.toggle('fa-filter');
                icon.classList.toggle('fa-xmark');
            });

            // document.getElementById('containerIcon').addEventListener('click', function() {
            //     const iconSide = document.getElementById('icon-side');
            //     iconSide.classList.toggle('fa-square-plus');
            //     iconSide.classList.toggle('fa-square-minus');
            // });

            document.getElementById('icon-table').addEventListener('click', function() {
                const iconSide = document.getElementById('iconSide');
                iconSide.classList.toggle('bi-plus-square');
                iconSide.classList.toggle('bi-x-square');
            });

        </script>


    </body>
</html>
