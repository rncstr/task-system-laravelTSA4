<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Aaron Castro',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        $tasks = [
            [
                'title'       => 'Prepare TSA4 Laravel Project',
                'description' => 'Set up CRUD, Breeze auth, and task completion emails.',
                'priority'    => 'high',
                'due_date'    => now()->addDays(1)->toDateString(),
                'status'      => 'pending',
                'is_archived' => false,
            ],
            [
                'title'       => 'Review Validation Rules',
                'description' => 'Verify required fields on create and edit forms.',
                'priority'    => 'medium',
                'due_date'    => now()->addDays(2)->toDateString(),
                'status'      => 'in_progress',
                'is_archived' => false,
            ],
            [
                'title'       => 'Submit Earlier Lab Activities',
                'description' => 'Already completed task for testing non-resend behavior.',
                'priority'    => 'low',
                'due_date'    => now()->toDateString(),
                'status'      => 'done',
                'is_archived' => false,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}