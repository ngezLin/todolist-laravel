@extends('layouts.layoutDashboard')

@section('title', 'Add Task')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New Task</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="priority" class="form-label">Priority Level</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
{{--
            <div class="mb-3">
                <label for="assigned_to" class="form-label">Assigned To</label>
                <select class="form-control" id="assigned_to" name="assigned_to" required>
                    <option value="">Select a user</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="mb-3">
                <label for="materials" class="form-label">Materials (URL)</label>
                <input type="url" class="form-control" id="materials" name="materials">
            </div>

            <div class="mb-3">
                <label for="completion_percentage" class="form-label">Completion Percentage</label>
                <input type="number" class="form-control" id="completion_percentage" name="completion_percentage" min="0" max="100">
            </div>

            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
</div>
@endsection
