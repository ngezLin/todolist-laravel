@extends('layouts.layoutDashboard')

@section('title', 'Edit Task')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Task</h3>
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

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>

            <div class="mb-3">
                <label for="priority" class="form-label">Priority Level</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="materials" class="form-label">Materials (URL)</label>
                <input type="url" class="form-control" id="materials" name="materials" value="{{ $task->materials }}">
            </div>

            <div class="mb-3">
                <label for="completion_percentage" class="form-label">Completion Percentage</label>
                <input type="number" class="form-control" id="completion_percentage" name="completion_percentage" min="0" max="100" value="{{ $task->completion_percentage }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</div>
@endsection
