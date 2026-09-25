@extends('layouts.app')

@section('content')
    <h1>Personal Task Manager</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">+ Add Task</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td>
                    <span class="badge {{ $task->status === 'Completed' ? 'bg-success' : 'bg-warning' }}">
                        {{ $task->status }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('tasks.status', $task) }}" method="POST" style="display:inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-sm btn-secondary">Toggle Status</button>
                    </form>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection