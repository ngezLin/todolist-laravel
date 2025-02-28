@extends('layouts.layoutDashboard')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ auth()->user()->name }} Dashboard</h3>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Add Task</a>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $index => $task)
                    <tr class="{{ $task->status === 'completed' ? 'table-success' : '' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->customer->name ?? 'N/A' }}</td>
                        <td>
                            {{ $task->due_date }}
                            @php
                                $dueDate = \Carbon\Carbon::parse($task->due_date);
                                $now = now();
                                $diff = $dueDate->diff($now);

                                $isOverdue = $now->greaterThan($dueDate);
                            @endphp

                            @if($isOverdue && $task->status !== 'completed')
                                <span class="text-danger">
                                    (Overdue {{ $diff->days }} days,
                                    {{ $diff->h }} hours,
                                    {{ $diff->i }} minutes,
                                    {{ $diff->s }} seconds)
                                </span>
                            @elseif(!$isOverdue)
                                <span class="text-success">
                                    (Due in {{ $diff->days }} days,
                                    {{ $diff->h }} hours,
                                    {{ $diff->i }} minutes,
                                    {{ $diff->s }} seconds)
                                </span>
                            @endif
                        </td>

                        <td>{{ $task->description }}</td>
                        <td>
                            @if($task->materials)
                                <a href="{{ $task->materials }}" target="_blank">View</a>
                            @else
                                No materials
                            @endif
                        </td>
                        <td>{{ $task->completion_percentage }}%</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-xs px-2 py-1">Detail</a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xs px-2 py-1" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>

                            @if($task->status !== 'completed')
                                <form action="{{ route('tasks.done', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-xs px-2 py-1" onclick="return confirm('Mark this task as done?')">Done</button>
                                </form>
                            @else
                                <span class="badge badge-success">Completed</span>
                            @endif
                        </td>
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
