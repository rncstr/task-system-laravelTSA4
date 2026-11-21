@extends('layouts.minimal')

@section('title', 'Tasks — Tasks for Today')

@section('content')
    <div class="page-header">
        <div>
            <h1>Task List</h1>
            <p class="subtitle">
                @auth
                    Manage active tasks below.
                @else
                    Viewing in read-only mode. Sign in to create, edit, or archive tasks.
                @endauth
            </p>
        </div>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ New Task</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="padding: 8px 0;">
        @if($tasks->isEmpty())
            <div class="empty-state">
                <p style="margin: 0 0 12px;">No active tasks right now.</p>
                <a href="{{ route('tasks.create') }}" class="btn btn-ghost">Create your first task</a>
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Priority</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>
                                    <div class="task-title">{{ $task->title }}</div>
                                    @if($task->description)
                                        <div class="task-desc">{{ $task->description }}</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="pill {{ $task->priority === 'high' ? 'pill-high' : '' }}">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                </td>
                                <td style="color: var(--muted); white-space: nowrap;">
                                    {{ $task->due_date ?: '—' }}
                                </td>
                                <td>
                                    <span class="pill pill-{{ $task->status }}">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn-link">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-link danger" onclick="return confirm('Archive this task?')">Archive</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection