@extends('layouts.layoutDashboard')

@section('title', 'About')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">About This App</h3>
    </div>
    <div class="card-body">
        <p>Welcome to the <strong>Todo-List App</strong>. This application helps users manage their daily tasks efficiently.</p>

        <h5>Features:</h5>
        <ul>
            <li>Create, edit, and delete tasks</li>
            <li>Assign priority levels and due dates</li>
            <li>Track task completion progress</li>
            <li>Store and access task-related materials</li>
        </ul>

        <h5>This application was built using:</h5>
        <ul>
            <li>PHP Laravel 11</li>
            <li>Bootstrap 5.</li>
            <li>Tailwind css</li>
            <li>Jquery</li>
            <li>AdminLTE</li>

        </ul>
    </div>
</div>
@endsection
