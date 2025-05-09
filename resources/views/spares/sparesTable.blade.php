@extends('components.layout')
@section('headscript')
<link href="{{ asset('bootstrap/css/styles.css')  }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
<script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('styles')
<style>
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
    .dt-length label {
    padding: 5px; /* Debugging aid */
    }
</style>
@endsection

@section('main')
<main>
    <div class="page-header pb-10 page-header-dark">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <strong>Spares Inventory</strong>
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card">

        <div class="card-body">

            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 5%;">Manufactor</th>
                            <th style="width: 10%;">Hardware Type</th>
                            <th style="width: 25%;">Description</th>
                            <th style="width: 5%;">Warehouse</th>
                            <th style="width: 5%;">Client</th>
                            <th style="width: 5%;">Status</th>
                            <th class="text-center" style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php  
                            $CountMe = 1;
                        @endphp
                        @foreach ($spares as $spare)
                            @if ($spare->is_active == 1)
                                @php $spare->is_active = 'Active'; @endphp
                            @else
                                @php $spare->is_active = 'Inactive'; @endphp
                            @endif
                            <tr>
                                <td>{{ $CountMe++ }}</td>
                                <td>{{ $spare->manufacturer }}</td>
                                <td>{{ $spare->hardware_type }}</td>
                                <td>{{ $spare->descriptions }}</td>
                                <td>{{ $spare->warehouse_loc }}</td>
                                <td>{{ $spare->hardware_site }}</td>
                                <td><h5><span class="badge badge-success">{{ $spare->is_active }}</span></h5></td>
                                <td class="text-center">
                                    <a href="{{ route('spares.showDetails', [$spare->sparesID]) }}" class="btn btn-dark btn-icon btn-sm" title="Viewing"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('spares.PullOutSpares', [$spare->sparesID]) }}" class="btn btn-success btn-icon btn-sm"><i class="bi bi-box-seam-fill"></i></a>
                                    <a href="{{ route('spares.SpareArchive', [ $spare->sparesID ]) }}" class="btn btn-danger btn-icon btn-sm"><i class="bi bi-archive-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
         
        </div>
    </div>
</main>


@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let table = new DataTable('#myTable');
    Object.assign(DataTable.defaults, {
    searching: false,
    ordering: false
});
 
new DataTable('#myTable');
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const barcodeScanner = document.getElementById('barcodeScanner');

    barcodeScanner.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission or default behavior
            const barcode = barcodeScanner.value.trim(); // Get the value from the input field
            console.log('Scanned barcode:', barcode); // Log the scanned barcode for debugging
            if (barcode) {
                // Redirect to the viewSpares route with the scanned barcode
                window.location.href = `/spares/barcodeScanned/${barcode}`;
            }
        }
    });

    // Automatically focus the scanner input
    barcodeScanner.focus();
});
</script>
@endsection