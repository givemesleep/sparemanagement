@extends('components.layout')
@section('headscript')
<link href="{{ asset('bootstrap/css/styles.css')  }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">
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
                    
                    <strong><span>Spares Approval</span></strong>
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card">
                
                <div class="card-body" >

                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 10%">Manufacturer</th>
                                    <th style="width: 10%">Hardware Type</th>
                                    <th style="width: 20%">Description</th>
                                    <th style="width: 7%">Warehouse</th>
                                    <th style="width: 8%">Receiver</th>
                                    <th style="width: 10%">Received Date</th>
                                    <th class="text-center" width="7%">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $CountMe = 1;
                                @endphp
                                @foreach ($item as $items )
                                    <tr>
                                        <td>{{ $CountMe++ }}</td>
                                        <td>{{ $items->manufacturer }}</td>
                                        <td>{{ $items->hardware_type }}</td>
                                        <td>{{ $items->descriptions }}</td>
                                        <td>{{ $items->warehouse_loc }}</td>
                                        <td>{{ $items->received_by }}</td>
                                        <td>{{ date('F d, Y', strtotime($items->created_at)) }}</td>
                                        <td class="text-center"> 
                                            
                                            <a class="btn btn-dark btn-icon btn-sm" type="button" value="View" title="View" href="{{ route('spares.showDetails', [$items->sparesID]) }}"><i class="bi bi-eye-fill"></i></a>
                                            <a class="btn btn-success btn-icon btn-sm" type="button" value="Approve" title="Approve" href="{{ route('spares.AppSpares', [$items->sparesID]) }}"><i class="bi bi-check-lg"></i></a>
                                            <a class="btn btn-danger btn-icon btn-sm" type="button" value="Reject" title="Reject" href="{{ route('spares.RejSpares', [$items->sparesID]) }}"><i class="bi bi-x-lg"></i></a>
                                           
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
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endif

<script>
new DataTable('#myTable');
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
@endsection