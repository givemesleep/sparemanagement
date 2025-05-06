@extends('components.layout')
@section('headscript')
<link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
<link href="{{ asset('cdns/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
<script data-search-pseudo-elements defer src="{{ asset('cdns/all.min.js.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/feather.min.js.js') }}" crossorigin="anonymous"></script>
@endsection

@section('main')

@php date_default_timezone_set('Asia/Manila'); @endphp
<main>
    <div class="container-fluid mt-5">
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard</h1>
                <div class="small"><span class="font-weight-500 text-primary">@php echo date('l'); @endphp </span> &middot; @php echo date('F j, Y'); @endphp &middot; @php echo date(' h:i:s A'); @endphp </div>
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
                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">{{ $Approved }}</div>  
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
                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">{{ $PullOut }}</div>
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
                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">{{ $Defect }}</div>
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
                                <div class="h2 font-weight-bold mt-3" style="font-size:30px;">{{ $Archive }}</div>
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
                        <img class="float-left" src="{{ asset('bootstrap/assets/img/drawkit/color/drawkit-developer-woman-flush.svg') }}" style="width: 8rem; margin-left: -2.5rem; margin-bottom: -5.5rem;" />
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
                            <thead>
                                <tr>
                                    <th>Primary Part No.</th>
                                    <th>Serial No.</th>
                                    <th>Hardware</th>
                                    <th>Location</th>
                                    <th>Date Added</th>
                                    <th>Added By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Recent as $Recents)
                                    <tr>
                                        <td>{{ $Recents->part_model1 }}</td>
                                        <td>{{ $Recents->serial_model }}</td>
                                        <td>{{ $Recents->hardware_type }}</td>
                                        <td>{{ $Recents->warehouse_loc }}</td>
                                        <td></td>
                                        <td>{{ $Recents->received_by }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
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
@endsection

@section('scripts')
<script src="{{ asset('cdns/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js')}}"></script>
<script src="{{ asset('cdns/Chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('bootstrap/assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('cdns/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/assets/demo/datatables-demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
setTimeout(function() {  
    var alertDiv = document.getElementById("myAlert");
        if (alertDiv) {
            alertDiv.style.display = "none";
        }
            }, 5000);

// const config = {
//   type: 'doughnut',
//   data: data,
// };

// const data = {
//   labels: [
//     'Red',
//     'Blue',
//     'Yellow'
//   ],
//   datasets: [{
//     label: 'My First Dataset',
//     data: [300, 50, 100],
//     backgroundColor: [
//       'rgb(255, 99, 132)',
//       'rgb(54, 162, 235)',
//       'rgb(255, 205, 86)'
//     ],
//     hoverOffset: 4
//   }]
// };

</script>
@endsection