<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompletedMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_archived', false)
            ->orderByDesc('created_at')
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority'    => 'required|in:low,medium,high',
            'due_date'    => 'nullable|date',
            'status'      => 'required|in:pending,in_progress,done',
        ]);

        Task::create([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority'    => $validated['priority'],
            'due_date'    => $validated['due_date'] ?? null,
            'status'      => $validated['status'],
            'is_archived' => false,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return redirect()->route('tasks.edit', $task);
    }

    public function edit(Task $task)
    {
        if ($task->is_archived) {
            abort(404);
        }

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority'    => 'required|in:low,medium,high',
            'due_date'    => 'nullable|date',
            'status'      => 'required|in:pending,in_progress,done',
        ]);

        $wasAlreadyDone = $task->status === 'done';

        $task->update([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority'    => $validated['priority'],
            'due_date'    => $validated['due_date'] ?? null,
            'status'      => $validated['status'],
        ]);

        if (!$wasAlreadyDone && $task->status === 'done') {
            $recipient = env('TASK_NOTIFICATION_EMAIL', 'admin@example.com');
            Mail::to($recipient)->send(new TaskCompletedMail($task));

            return redirect()
                ->route('tasks.index')
                ->with('success', 'Task marked as done! Completion email notification sent.');
        }

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task archived successfully.');
    }
}