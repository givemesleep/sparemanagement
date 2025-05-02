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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                    <span>List of Pull Out Spares</span>
                                </h1>
                                <!-- <div class="page-header-subtitle">An extended version of the DataTables library, customized for SB Admin Pro</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n5">
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Hardware Type</th>
                                                <th>Part Number 1</th>
                                                <th>Quantity</th>
                                                <th>Warehouse Location</th>
                                                <th>Manufacturer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Hardware Type</th>
                                                <th>Part Number 1</th>
                                                <th>Quantity</th>
                                                <th>Warehouse Location</th>
                                                <th>Manufacturer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>HDD</td>
                                                <td>HHTJ34</td>
                                                <td>1</td>
                                                <td>Tektite</td>
                                                <td>HPE</td>
                                                <td style="display:flex; justify-content:center; gap:5px;">
                                                    <button class="btn btn-primary btn-icon btn-sm" title="View" type="button" value="view">
                                                        <i data-feather="eye"></i>
                                                    </button>
                                                    <button class="btn btn-warning btn-icon btn-sm" title="Ticket" type="button" id="ticket">
                                                        <i class="bi bi-ticket-detailed-fill"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-icon btn-sm" title="Archive" type="button" id="Reject">
                                                        <i data-feather="archive"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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

        <script>
            const rejectBtn = document.getElementById('Reject');
            rejectBtn.addEventListener("click", function () {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                    title: "Are you sure you want to delete this hardware?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: false
                    }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        icon: "success"
                        }).then(function(){
                            window.location.href = "landing.php";
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                        title: "Your hardware is safe",
                        icon: "error"
                        });
                    }
                    });
            });
        </script>

    </body>
</html>
