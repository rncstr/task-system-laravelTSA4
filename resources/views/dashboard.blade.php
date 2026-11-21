<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">You're logged in! Manage your tasks below:</p>
                        <div class="flex gap-4">
                            <a href="{{ route('welcome') }}" class="underline text-blue-600">Welcome</a>
                            <a href="{{ route('tasks.index') }}" class="underline text-blue-600">Task List</a>
                            <a href="{{ route('tasks.create') }}" class="underline text-blue-600">Create Task</a>
                            <a href="{{ route('public.profile') }}" class="underline text-blue-600">Profile</a>
                            <a href="{{ route('about') }}" class="underline text-blue-600">About</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
