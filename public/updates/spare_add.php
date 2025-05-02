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
        
        .toggle-card {
            display: flex;   
        }

        .slidediv {
            display: none;
            background-color: white;
            width: 20%;
            height: 100%;
        }

        .slide-right {
            transform:translateX(-10px);
            transition: transform 0.5s ease-in-out;
            display: block;
        }

        .table-slide {
            width: 100%;
            transition: width 0.5s ease-in-out;
            background: white;
        }

        .table-right {
            width:80%;
        }

        #icon {
            transition: all 0.9s ease;
        }

        #icon-side {
            transition: all 0.9s ease;
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
                                    <span>Spare Data Entry</span>
                                </h1>
                                <!-- <div class="page-header-subtitle">An extended version of the DataTables library, customized for SB Admin Pro</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n5">

                        <div class="card">
                            <div class="card-header">
                                This page is dedicated for purchased spares details entry.
                            </div>

                            <div class="card-body">
                                <form action="controller/spare-process.php?FLAG=1" method="POST">
                                        <div class="form-group row px-4 g-3">

                                            <div class="col-md-3 mb-3">
                                                <label for="manufacturer"><b>Manufacturer</b></label>
                                                    <select class="form-control" id="manufacturer" name="manuID">
                                                        <option >Select Manufacturer</option>
                                                            
                                                    </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="hardwaretypes"><b>Hardware Type</b></label>
                                                    <select class="form-control" id="hardwaretypes" name="hardID">
                                                        <option >Select Hardware</option>
                                                            
                                                    </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="desc"><b>Description</b></label>
                                                <input class="form-control" id="desc" type="text" placeholder="" name="sparedesc" >
                                            </div>
                                            
                                            <div class="col-md-3 mb-3">
                                                <label for="part1"><b>Part Number 1</b></label>
                                                <input class="form-control" id="part1" type="text" placeholder="" required name="partnum1">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="part2"><b>Part Number 2</b></label>
                                                <input class="form-control" id="part2" type="text" placeholder="" name="partnum2">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="part3"><b>Part Number 3</b></label>
                                                <input class="form-control" id="part3" type="text" placeholder="" name="partnum3">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="serialnum"><b>Serial Number</b></label>
                                                <input class="form-control" id="serialnum" type="text" placeholder="" name="serialNum">
                                            </div>
                                            
                                            <div class="col-md-1 mb-3">
                                                <label for="qty"><b>Quantity</b></label>
                                                <input class="form-control" id="qty" type="number" placeholder="" name="itemqty"> 
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="warehouse"><b>Warehouse Location</b></label>
                                                    <select class="form-control" id="warehouse" name="wareID">
                                                        <option >Select Warehouse</option>
                                                            
                                                    </select>
                                            </div>
            

                                            <div class="col-md-3 mb-3">
                                                <label for="categ"><b>Hardware Category</b></label>
                                                    <select class="form-control" id="categ" name="hwcatID">
                                                        <option >Select HW Category</option>
                                                                
                                                    </select>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="boxSelect"><b>Box</b></label>
                                                    <select class="form-control boxtypes" id="boxSelect" name="boxID[]" multiple="multiple" style="width: 100%;">
                                                        
                                                    </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="platforms"><b>Platform</b></label>
                                                    <select class="form-control platforms" multiple="multiple" id="platforms" name="platformID[]" style="width: 100%;">
                                                        <option >Select Platform</option>
                                                            
                                                    </select>
                                            </div>
            
                                            <div class="col-md-3 mb-3">
                                                <label for="classification"><b>Classification</b></label>
                                                    <select class="form-control" id="classification" name="classID">
                                                        <option >Select Classification</option>
                                                            
                                                    </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="globesite"><b>GLOBE Site</b></label>
                                                <input class="form-control" id="globesite" type="text" placeholder="" name="globesite">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="additional"><b>Additional Information</b></label>
                                                    <select class="form-control compatible" id="additional" multiple="multiple" name="compadesc[]" style="width: 100%;">
                                                        <option >Select Classification</option>
                                                            
                                                    </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="auditor"><b>Auditor</b></label>
                                                    <select class="form-control auditor" id="auditor" multiple="multiple" name="auditors[]" style="width: 100%;"    >
                                                        <option >Select Classification</option>
                                                            
                                                    </select>
                                            </div>

                                            <div class="text-end">
                                                <input type="submit" class="btn btn-success rounded-pill" value="Submit" name="submit">
                                            </div>

                                        </div>
                                </form>
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
