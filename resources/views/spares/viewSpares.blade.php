@extends('components.layout')

@section('headscript')
<link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
<link href="{{ asset('cdns/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
<script data-search-pseudo-elements defer src="{{ asset('cdns/all.min.js.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/feather.min.js.js') }}" crossorigin="anonymous"></script>

<!-- New Imports -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel@1.0.3"></script>
@endsection

@section('styles')
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
@endsection

@section('main')

<!-- <h1>Spare ID: </h1> -->

@php
$part1 = $sparesID->part_model1;
$part2 = $sparesID->part_model2;
$part3 = $sparesID->part_model3;

$partnumber = array($part1, $part2, $part3);
$comanumber = implode(", ", array_filter($partnumber));


$Status = $sparesID->hardware_category;

if($Status == 'Non-Critical'){
    $Stats = '<span class="badge bg-success"><b>Non-Critical</b></span>';
}elseif($Status == 'Critical'){
    $Stats = '<span class="badge bg-danger"><b>Critical</b></span>';
}else{
    $Stats = '<span class="badge bg-dark"><b>No Status</b></span>';
}


$isApp = $sparesID->is_approved;
if($isApp == 1){
    $isApproved = '';
}else{
    $isApproved = '<span class="badge bg-primary"><b>Need Approval</b></span>';
}


@endphp

<main>
    <div class="page-header page-header-dark">
        <div class="container-fluid">
            <div class="page-header-content mb-4">
                <h1 class="page-header-title">
                    <strong><span>Spare Viewing</span></strong>
                </h1>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt-n5">

        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-key-fill"></i><strong>&nbsp;Spare ID : {{ $sparesID->sparesID }}</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row" style="display:flex; flex-wrap:wrap;">

                            <div class="col-md-3">
                                <img src="" alt="">
                            </div>

                            <div class="col-md-9" style="margin-left: -5%;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1><b>{{ $sparesID->hardware_type }}</b> @php echo $Stats; echo '&nbsp'; echo $isApproved; @endphp </h1>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <h5>{{ $sparesID->descriptions }}</h5>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <h1>{!! $barcodeHTML !!}</h1>
                                    </div>
                                    <div class="col-md-12">
                                    
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-3" style="border: 1px solid black; margin-left:4%;">
                                Barcode
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-hourglass-split"></i><strong>&nbsp;Spare Timeline</strong></h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-lg-9 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-list"></i><strong>&nbsp;Spare Details</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 mb-3">
                            
                            <div class="col-md-9 mb-3">
                                <h5>Part Number : <b>@php echo $comanumber; @endphp </b></h5>
                            </div>
                            <div class="col-md-3 mb-3">
                                <h5>Serial : <b>{{ $sparesID->serial_model }}</b></h5>
                            </div>

                            <div class="col-md-4 mb-3">
                                <h5>Manufacturer : <b>{{ $sparesID->manufacturer }}</b></h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5>Location : <b>{{ $sparesID->warehouse_loc }}</b></h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5>Client : <b>{{ $sparesID->hardware_site }}</b></h5>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h5>Platform : <b>{{ $sparesID->platform_type }}</b></h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header text-monospace font-weight-900 mt-2" style="color:black">
                        <i data-feather="key"></i>
                        <h4>&nbsp;Spare ID: 0091</h4>
                    </div>


                    <div class="row" style="padding:20px;">
                        <img src="assets/img/hard.png" alt="" style="margin-left:2%"> 
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
                        
                        <p class="mt-3"></p>
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
            
        </div> -->

    </div>
</main>


@endsection

@section('scripts')
<script src="{{ asset('cdns/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/Chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js')}}"></script>


@endsection