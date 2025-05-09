@extends('components.layout')
@section('headscript')
<link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
<link href="{{ asset('cdns/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
<script data-search-pseudo-elements defer src="{{ asset('cdns/all.min.js.js') }}" crossorigin="anonymous"></script>

@endsection

@section('styles')
<style>
    /* .partnumber, .serialnumber{
        maxlength: 20;

    } */

    .page-header {
        background: #047008;
        background: linear-gradient(90deg,rgba(4, 112, 8, 1) 50%, rgba(146, 242, 56, 1) 100%);
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

    .submit-button {
        text-align: justify;
        text-align-last: right;
    }

    .form-select {
        padding: 10px;

    }

    .required {
        color: red;
    }

</style>
@endsection

@section('main')
<main>
    <div class="page-header page-header-dark">
        <div class="container-fluid">
            <div class="page-header-content mb-4">
                <h1 class="page-header-title">
                    <strong><span>Add Spares Received</span></strong>
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n5">

        <div class="card card-header-actions">
            <div class="card-header">
                Add the details of the spares received.
                <i class="bi bi-info-circle fs-5" href="javascript:void(0);" tabindex="0" data-trigger="focus" title="" 
                data-container="body" data-toggle="popover" data-placement="left" data-content="All fields with "></i>
            </div>

            <div class="card-body" style="height: 450px;">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('spares.createTicket.store') }}" method="POST">
                    @csrf
                    @method('POST')
                        <div class="form-group row px-4 g-3">

                            <div class="col-md-2 mb-3">
                                <label for="manufacturer"><b>Manufacturer</b>&nbsp;<span class="required">*</span></label>
                                    <select class="form-control manu" id="manufacturer" name="manufacturer" style="height: 38px;">
                                        <option value="No Manufactorer Specified">Choose Manufacturer</option>
                                        @foreach ($manu as $manufactor)
                                            <option value="{{ $manufactor->manuDesc }}">
                                                {{ $manufactor->manuDesc }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="hardwaretypes"><b>Hardware Type</b>&nbsp;<span class="required">*</span></label>
                                    <select class="form-control types" id="hardwaretypes" name="hardware_type">
                                        <option value="No Hardware Specified">Choose Hardware</option>
                                        @foreach ($hwtype as $hwtypes)
                                            <option value="{{ $hwtypes->hardwareType }}">
                                                {{ $hwtypes->hardwareType }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="stats"><b>Hardware Category</b>&nbsp;<span class="required">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="bi bi-info-circle-fill" href="javascript:void(0);" title="Click to see description" data-bs-toggle="modal" data-bs-target="#CategoryDescript"></i></label>
                                    <select class="form-control stats" id="stats" name="hardware_category">
                                        <option value="No Category Specified">Choose Category</option>
                                        @foreach ($hwcateg as $hwcategs)
                                            <option value="{{ $hwcategs->hwcatDesc }}">
                                                {{ $hwcategs->hwcatDesc }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="desc"><b>Description</b>&nbsp;<span class="required">*</span></label>
                                <input class="form-control" id="desc" type="text" placeholder="" name="descriptions" minlength="15" maxlength="255">
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label for="part1"><b>Part Number 1</b>&nbsp;<span class="required">*</span></label>
                                <input class="form-control partnumber" id="part1" type="text" placeholder="" required name="part_model1" minlength="10" maxlength="25">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="part2"><b>Part Number 2</b></label>
                                <input class="form-control partnumber" id="part2" type="text" placeholder="" name="part_model2" minlength="10" maxlength="25">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="part3"><b>Part Number 3</b></label>
                                <input class="form-control partnumber" id="part3" type="text" placeholder="" name="part_model3" minlength="10" maxlength="25"> 
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="serialnum"><b>Serial Number</b></label>
                                <input class="form-control serialnumber" id="serialnum" type="text" placeholder="" name="serial_model" minlength="10" maxlength="50">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="location"><b>Warehouse Location</b>&nbsp;<span class="required">*</span></label>
                                    <select class="form-control location" id="location" name="warehouse_loc">
                                        <option value="No Location Specified">Choose Location</option>
                                        @foreach ($warehouse as $warehouses)
                                            <option value="{{ $warehouses->warehouseDesc }}">
                                                {{ $warehouses->warehouseDesc }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="warehouse"><b>Client</b></label>
                                    <select class="form-control sites" id="warehouse" name="hardware_site">
                                        <option value="No Sites Specified">Choose Client</option>
                                        @foreach ($sites as $site)
                                            <option value="{{ $site->siteDesc }}">
                                                {{ $site->siteDesc }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="platform"><b>Platform</b></label>
                                    <select class="form-control platform" id="platform" name="platform_type">
                                        <option value="No Platform Specified">Choose Platform</option>
                                        @foreach ($platform as $platforms)
                                            <option value="{{ $platforms->platformDesc }}">
                                                {{ $platforms->platformDesc }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="categ"><b>Received By</b>&nbsp;<span class="required">*</span></label>
                                    <select class="form-control receiver" id="categ" name="received_by">
                                        <option value="No Receiver Specified">Choose Receiver</option>
                                        @foreach ($auditor as $audits)
                                            <option value="{{ $audits->auditorName }}">
                                                {{ $audits->auditorName }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="mt-4 text-end">
                                <input type="reset" class="btn btn-primary" value="Reset" name="submit">
                                <input type="submit" class="btn btn-success" value="Submit" name="submit">
                            </div>

                        </div>
                </form>
            </div>
        </div>

    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="CategoryDescript" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title"><b>Hardware Category</b></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 mt-2 mb-3">
                <p><b>Critical Hardware : </b>Components that are essential for the system to function properly.</p>
                <p>Examples : Power supply, CPU, memory modules, storage drives, system board.</p>
                <p><b>Impact of Failure : </b>A failure in critical hardware typically leads to system downtime, data loss, or severe performance degradation.</p>
                <p><b>Priority : </b>Requires immediate attention or replacement.</p>
            </div>
            <div class="col-md-12">
                <p><b>Non-Critical Hardware : </b>Components that are not essential to basic system operation or can fail without immediately impacting functionality.</p>
                <p>Examples : USB ports, secondary fans, LED indicators, optical drives.</p>
                <p><b>Impact of Failure : </b>May cause minor inconvenience but does not stop the system from running.</p>
                <p><b>Priority : </b>Can usually be scheduled for later maintenance or replacement.</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('cdns/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/Chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js')}}"></script>

<!-- select 2  -->
<link href="{{ asset('bootstrap/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('bootstrap/js/select2.min.js') }}"></script>

<script src="{{ asset('cdns/sweetalert.js') }}"></script>

<script>

$(document).ready(function() {
    $('.manu').select2({
        width: '100%' // Ensures the select2 dropdown matches the width of the parent container
    });
    $('.types').select2({
        width: '100%'
    });
    $('.stats').select2({
        width: '100%'
    });
    $('.location').select2({
        width: '100%'
    });
    $('.sites').select2({
        width: '100%'
    });
    $('.platform').select2({
        width: '100%'
    });
    $('.receiver').select2({
        width: '100%'
    });
});
</script>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Spares successfully added!',
            confirmButtonText: 'OK',
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Unable to add spares!',
            confirmButtonText: 'OK',
        });
    </script>

<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

</script>
@endif



@endsection