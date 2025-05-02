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

        .inputs, .actions {
            display:flex;
            justify-content:center;
        }
        hr {
            margin-bottom:5%;
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
                                <div class="page-header-content py-5">
                                    <h1 class="page-header-title">
                                        <span>Alter Categories Selection</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid mt-4">
                            <div class="card shadow">
                                    
                                <div class="card">
                                    <div class="card-header">Categories Modification</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <ul class="nav nav-pills flex-column" id="cardPillVertical" role="tablist">
                                                    <li class="nav-item"><a class="nav-link active text-center" id="overview-pill-vertical" href="#hardwarePillVertical" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Hardware Type</a></li>
                                                    <li class="nav-item"><a class="nav-link text-center" id="example-pill-vertical" href="#warehousePillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Warehouse</a></li>
                                                    <li class="nav-item"><a class="nav-link text-center" id="example-pill-vertical" href="#classifyPillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Classification</a></li>
                                                    <li class="nav-item"><a class="nav-link text-center" id="example-pill-vertical" href="#manuPillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Manufacturer</a></li>
                                                    <li class="nav-item"><a class="nav-link text-center" id="example-pill-vertical" href="#platformPillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Platform</a></li>
                                                    <li class="nav-item"><a class="nav-link text-center" id="example-pill-vertical" href="#compPillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Compatibility</a></li>
                                                    <li class="nav-item"><a class="nav-link text-center" id="example-pill-vertical" href="#boxPillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Box</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="tab-content" id="cardPillContentVertical">
                                                    <div class="tab-pane fade show active" id="hardwarewPillVertical" role="tabpanel" aria-labelledby="overview-pill-vertical">
                                                        <h5 class="card-title">Add Hardware</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Hardware Category">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="warehousePillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                        <h5 class="card-title">Add Warehouse Location</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Warehouse Location">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="classifyPillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                        <h5 class="card-title">Add Classification</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Classification">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="manuPillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                        <h5 class="card-title">Add Manufacturer</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Manufacturer">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="platformPillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                        <h5 class="card-title">Add Platform</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Platform">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="compPillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                        <h5 class="card-title">Add Compatibility</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Compatibility">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="boxPillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                        <h5 class="card-title">Add Box</h5><hr>
                                                            <div class="inputs">
                                                                <input type="text" class="form-control mb-4 col-md-4" placeholder="Box">
                                                            </div>
                                                            <div class="actions">
                                                                <input type="button" value="Save" class="btn btn-success col-md-2 text-end" id="addCateg">
                                                                <input type="button" value="Cancel" class="btn btn-light col-md-2 text-end">
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
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
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

        <script>
            const submitBtn = document.getElementById('addCateg');
            submitBtn.addEventListener("click", function () {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                    title: "Are you sure you want to add this category?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: false
                    }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                        title: "Added Successfuly!",
                        icon: "success"
                        }).then(function(){
                            window.location.href = "landing.php";
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Category has been rejected",
                        icon: "error"
                        });
                    }
                    });
            });
        </script>

    </body>
</html>
