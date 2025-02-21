<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve tasks for the authenticated customer
        $tasks = Task::where('customer_id', Auth::id())->get();

        // Pass tasks to the view
        return view('dashboard', compact('tasks'));
    }
}
