@extends('layouts.layoutDashboard')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ auth()->user()->name }} Task List</h3>
    </div>
    <div class="card-body">
        @if($tasks->isEmpty())
            <p>No tasks found.</p>
        @else
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Task Title</th>
                        <th>Priority Level</th>
                        <th>Assigned to</th>
                        <th>Due Date</th>
                        <th>Task Description</th>
                        <th>Materials</th>
                        <th>Completion (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $index => $task)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->customer->name ?? 'N/A' }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if($task->materials)
                                <a href="{{ $task->materials }}" target="_blank">View</a>
                            @else
                                No materials
                            @endif
                        </td>
                        <td>{{ $task->completion_percentage }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
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
