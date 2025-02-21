<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            Task::create([
                'title' => 'Complete Laravel Project',
                'priority' => 'High',
                'customer_id' => $customer->id,
                'due_date' => now()->addDays(7),
                'description' => 'Finish the Laravel To-Do List app.',
                'materials' => null,
                'completion_percentage' => 0,
            ]);

            Task::create([
                'title' => 'Write Documentation',
                'priority' => 'Medium',
                'customer_id' => $customer->id,
                'due_date' => now()->addDays(14),
                'description' => 'Prepare documentation for the project.',
                'materials' => 'https://example.com/docs',
                'completion_percentage' => 20,
            ]);
        }
    }
}
