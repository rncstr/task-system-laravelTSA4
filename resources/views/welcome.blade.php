@extends('layouts.minimal')

@section('title', 'Welcome — Tasks for Today')

@section('content')
    <div class="card">
        <h1>Tasks for Today</h1>
        <p class="subtitle">A minimal Laravel workspace for managing daily tasks, archiving completed items, and sending completion notifications.</p>

        <div class="form-actions">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">View Task List</a>
            @guest
                <a href="{{ route('login') }}" class="btn btn-ghost">Sign In</a>
            @else
                <a href="{{ route('tasks.create') }}" class="btn btn-ghost">+ New Task</a>
            @endguest
        </div>
    </div>
@endsection