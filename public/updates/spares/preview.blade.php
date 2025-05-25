
<div class="container">
    <h2>Preview Excel Upload</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    

    <form action="{{ route('spares.confirm') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success">Confirm Upload</button>
    </form>

    <form action="{{ route('spares.discard') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Discard</button>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Manufacturer</th>
                <th>Hardware Type</th>
                <th>Hardware Category</th>
                <th>Descriptions</th>
                <th>Part Model 1</th>
                <th>Part Model 2</th>
                <th>Part Model 3</th>
                <th>Serial Model</th>
                <th>Warehouse Loc</th>
                <th>Hardware Site</th>
                <th>Platform Type</th>
                <th>Received By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row['manufacturer'] ?? '' }}</td>
                    <td>{{ $row['hardwaretype'] ?? '' }}</td>
                    <td>{{ $row['hardwarecategory'] ?? '' }}</td>
                    <td>{{ $row['descriptions'] ?? '' }}</td>
                    <td>{{ $row['partmodel1'] ?? '' }}</td>
                    <td>{{ $row['partmodel2'] ?? '' }}</td>
                    <td>{{ $row['partmodel3'] ?? '' }}</td>
                    <td>{{ $row['serialmodel'] ?? '' }}</td>
                    <td>{{ $row['warehouselocation'] ?? '' }}</td>
                    <td>{{ $row['hardwaresite'] ?? '' }}</td>
                    <td>{{ $row['platformtype'] ?? '' }}</td>
                    <td>{{ $row['receivedby'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
