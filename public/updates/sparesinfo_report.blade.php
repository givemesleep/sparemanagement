<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LALABEL ELEVEN IMPORT ME AND EXPORT ME CSV FILE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css
">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @session('success')
                <div class="alert alert-success" role="alert"> 
                    {{ $value }}
                </div>
    @endsession

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="container">
        <h1 class="mt-5">IMPORT EXPORT</h1>

        <form action="{{ route('spares.preview') }}" method="POST" enctype="multipart/form-data" target="_blank">
            @csrf
        
        <!--FILE UPLOADERS ME-->
            <input type="file" name="file" class="form-control" required>
            
            <br>
        <!--IMPORT BUTTON MY FRIEND-->
            <button type="submit" class="btn btn-success">
                <i class="fa fa-eye"></i> Preview Spares Data
            </button>
        <!--EXPORT BUTTON MY FRIEND-->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                Export Spares Data
            </button>
        </form>        

            <!-- -->
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        @php
                            $manu="Manufacturer";
                            $hardt="Hardware Type";
                            $hardc="Hardware Category";
                            $desc="Description";
                            $part1="Part Model 1";
                            $part2="Part Model 2";
                            $part3="Part Model 3";
                            $serial="Serial Model";
                            $warehouse="Warehouse Location";
                            $hardsite="Hardware Site";
                            $plat="Platform Type";
                            $receive="Received By";
                        @endphp
                        <th>ID</th>
                        <th>{{ $manu }}</th>
                        <th>{{ $hardt }}</th>
                        <th>{{ $hardc }}</th>
                        <th>{{ $desc }}</th>
                        <th>{{ $part1 }}</th>
                        <th>{{ $part2 }}</th>
                        <th>{{ $part3 }}</th>
                        <th>{{ $serial }}</th>
                        <th>{{ $warehouse }}</th>
                        <th>{{ $hardsite }}</th>
                        <th>{{ $plat }}</th>
                        <th>{{ $receive }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($spares as $spare)
                <tr>
                    <td>{{ $spare->sparesID }}</td>
                    <td>{{ $spare->manufacturer }}</td>
                    <td>{{ $spare->hardware_type }}</td>
                    <td>{{ $spare->hardware_category }}</td>
                    <td>{{ $spare->descriptions }}</td>
                    <td>{{ $spare->part_model1 }}</td>
                    <td>{{ $spare->part_model2 }}</td>
                    <td>{{ $spare->part_model3 }}</td>
                    <td>{{ $spare->serial_model }}</td>
                    <td>{{ $spare->warehouse_loc }}</td>
                    <td>{{ $spare->hardware_site }}</td>
                    <td>{{ $spare->platform_type }}</td>
                    <td>{{ $spare->received_by }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{ $manu }}</th>
                        <th>{{ $hardt }}</th>
                        <th>{{ $hardc }}</th>
                        <th>{{ $desc }}</th>
                        <th>{{ $part1 }}</th>
                        <th>{{ $part2 }}</th>
                        <th>{{ $part3 }}</th>
                        <th>{{ $serial }}</th>
                        <th>{{ $warehouse }}</th>
                        <th>{{ $hardsite }}</th>
                        <th>{{ $plat }}</th>
                        <th>{{ $receive }}</th>
                    </tr>
                </tfoot>
            </table>
            <!-- -->
    </div>



    <!--MODAL PARA SA EXPORT OPTIONS-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{ route('spares.export') }}" id="exporter" method="GET">
                    <h5>Select fields to export:</h5>
                    <div class="row">
                        @php
                            $fields = [
                                'manufacturer' => 'Manufacturer',
                                'hardware_type' => 'Hardware Type',
                                'hardware_category' => 'Hardware Category',
                                'descriptions' => 'Description',
                                'part_model1' => 'Part Model 1',
                                'part_model2' => 'Part Model 2',
                                'part_model3' => 'Part Model 3',
                                'serial_model' => 'Serial Model',
                                'warehouse_loc' => 'Warehouse Location',
                                'hardware_site' => 'Hardware Site',
                                'platform_type' => 'Platform Type',
                                'received_by' => 'Received By',
                            ];
                        @endphp
                
                        @foreach($fields as $key => $label)
                            <div class="col-md-3">
                                <label>
                                    <input type="checkbox" name="fields[]" value="{{ $key }}"> {{ $label }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <p>Note: If selected none. All fields will be exported</p>
                    
                </form>        
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" form="exporter">
            <i class="fa fa-download"></i> Export Spares Data </button>
        </div>
      </div>
    </div>
  </div>
    <!-- -->

   
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
<script>new DataTable('#example');</script>
</html>