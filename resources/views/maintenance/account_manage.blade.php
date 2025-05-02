@extends('components.layout')
@section('headscript')
<link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
<link href="{{ asset('cdns/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
<script data-search-pseudo-elements defer src="{{ asset('cdns/all.min.js.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/feather.min.js.js') }}" crossorigin="anonymous"></script>
@endsection
@section('styles')
<style>
    /* .partnumber, .serialnumber{
        maxlength: 20;

    } */

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
@endsection

@section('main')
<main>
    <div class="card mt-5">
      <div class="card-title h1 m-2 p-0">Account Masterlist</div>
        <div class="card-body">
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
            <span class="text-container">
              <span class="text">Create Account</span>
            </span>
        </button>
          <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @php
                $num=1
              @endphp
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $account->username }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->role }}</td>
                        <td>{{ $account->is_active ? '✔' : '❌' }}</td>
                        <td><button class="btn btn-sm btn-primary edit-btn" 
                          data-id="{{ $account->id }}" 
                          data-status="{{ $account->is_active ? '1' : '0' }}" 
                          data-toggle="modal" 
                          data-target="#toggleStatusModal">
                      {{ $account->is_active ? 'Deactivate' : 'Activate' }}
                  </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
    </div>
    <!-- Display Success/Error messages -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('otp') || isset($otp))
    <div style="color: red;">
        <strong>OTP (For Testing Only):</strong> {{ $otp ?? 'No OTP generated yet' }}
        <br>
        <strong>Sent To:</strong> {{ $email ?? 'No email provided' }}
    </div>
@endif

<!--EXAMPLE MODAL-->
<div class="modal fade" id="toggleStatusModal" tabindex="-1" role="dialog" aria-labelledby="toggleStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="toggleStatusModalLabel">Change Account Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p id="account-email"></p>
              <label for="statusToggle">Activate / Deactivate:</label>
              <input type="checkbox" id="statusToggle" data-toggle="toggle" data-on="Active" data-off="Inactive">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveStatusChange">Save changes</button>
          </div>
      </div>
  </div>
</div>
<!-- -->


    <!--MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('send.otp') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="role">Account Role</label><br>
                        <select name="role" id="role">
                            <option value="1">High-Ranking</option>
                            <option value="2">Average-Employee</option>
                            <option value="3">Giga-Chad Devs</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
    <!-- -->
</main>
@endsection

@section('scripts')
<script src="{{ asset('cdns/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/Chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('bootstrap/assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('cdns/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js')}}"></script>
<script src="{{ asset('cdns/dtables.js') }}"></script>
<link href="{{ asset('bootstrap/css/select2.min.css') }}" rel="stylesheet" />
<!-- select 2  -->
<link href="{{ asset('cdns/dtables.css') }}" rel="stylesheet" />
<script src="{{ asset('bootstrap/js/select2.min.js') }}"></script>
<!--DATA TABLES-->
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
    })
})
</script>

<script>
  $(document).ready(function() {
    // When an edit button is clicked, trigger the modal
    $('body').on('click', '.edit-btn', function() {
        var editID = $(this).data('id');  // Get the account ID
        var currentStatus = $(this).data('status');  // Get the current status (1 or 0)

        // Set the modal content
        $('#toggleStatusModal #account-email').text('Account: ' + $(this).closest('tr').find('td:nth-child(3)').text()); // Show email
        $('#statusToggle').prop('checked', currentStatus == '1'); // Set the checkbox based on current status

        // When the "Save changes" button is clicked
        $('#saveStatusChange').click(function() {
            var newStatus = $('#statusToggle').prop('checked') ? 1 : 0; // Get new status (1 for active, 0 for inactive)
            
            // AJAX request to update status
            $.ajax({
                url: '/account/' + editID + '/toggle', // URL for toggling status
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    status: newStatus // New status to be updated
                },
                success: function(response) {
                    // Close the modal
                    $('#toggleStatusModal').modal('hide');
                    
                    // Optionally, update the button text and status without reloading the page
                    if (newStatus == 1) {
                        $('button[data-id="'+editID+'"]').text('Deactivate');
                    } else {
                        $('button[data-id="'+editID+'"]').text('Activate');
                    }

                    // Show a success message
                    alert('Account status updated successfully.');
                },
                error: function(error) {
                    console.error('Error toggling status:', error);
                    alert('Error occurred while updating status.');
                    break;
                }
            });
        });
    });
});
</script>

<!-- select 2  -->
<script>
$(document).ready(function() {
    $('.boxtypes').select2({
        placeholder: "Select Box Type",
        allowClear: true,
        width: 'resolve'
    });
    $('.platforms').select2({
        placeholder: "Select platforms",
        allowClear: true,
        width: 'resolve'
    });
    $('.compatible').select2({
        placeholder: "Select Compatible",
        allowClear: true,
        width: 'resolve'
    });
    $('.auditor').select2({
        placeholder: "Select Auditor",
        allowClear: true,
        width: 'resolve'
    });
    $('#role').select2({
        placeholder: "Select Role",
        allowClear: true,
        width: 'resolve'
    });
    
});
</script>
@endsection