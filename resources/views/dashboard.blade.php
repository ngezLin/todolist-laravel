@extends('layouts.layoutDashboard')

@section('title', 'DataTable Page')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable Example</h3>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Task Title</th>
                    <th>Priority level</th>
                    <th>Assigned to</th>
                    <th>due date</th>
                    <th>task description</th>
                    <th>materies(url, pdf)</th>
                    <th>complete(%)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td>4</td>
                    <td>X</td>
                    <td>X</td>
                    <td>X</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.7</td>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Other</td>
                    <td>All Others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection
