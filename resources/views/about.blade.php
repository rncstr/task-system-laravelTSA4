@extends('layouts.minimal')

@section('title', 'About — Tasks for Today')

@section('content')
    <div class="card">
        <h1>About This Application</h1>
        <p class="subtitle">Built with Laravel Blade, Eloquent ORM, Laravel Breeze, and Mailables.</p>

        <div class="meta-list">
            <div class="meta-item">
                <div class="meta-label">Task Management</div>
                <div class="meta-value">Full CRUD with server-side validation and soft deletion using an <code>is_archived</code> flag.</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Access Control</div>
                <div class="meta-value">Public pages remain open to visitors; creating, editing, and archiving require authentication via Laravel Breeze.</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Email Notifications</div>
                <div class="meta-value">Automatically dispatches a completion email once when a task transitions to Done.</div>
            </div>
        </div>
    </div>
@endsection