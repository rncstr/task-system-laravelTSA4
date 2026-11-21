<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Completed</title>
</head>
<body style="font-family: Arial, sans-serif; color: #222; line-height: 1.5;">
    <h2>Task Completed Notification</h2>
    <p>The following task has been marked as <strong>Done</strong>:</p>

    <ul>
        <li><strong>Title:</strong> {{ $task->title }}</li>
        <li><strong>Description:</strong> {{ $task->description ?: 'No description provided.' }}</li>
        <li><strong>Priority:</strong> {{ ucfirst($task->priority) }}</li>
        <li><strong>Due Date:</strong> {{ $task->due_date ?: 'No due date' }}</li>
        <li><strong>Status:</strong> {{ strtoupper($task->status) }}</li>
        <li><strong>Completed At:</strong> {{ now()->format('Y-m-d H:i:s') }}</li>
    </ul>

    <p>— Tasks for Today Management System</p>
</body>
</html>