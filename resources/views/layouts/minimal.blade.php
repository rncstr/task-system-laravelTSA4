<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tasks for Today')</title>
    <style>
        :root {
            --bg: #fafafa;
            --surface: #ffffff;
            --border: #e4e4e7;
            --text: #18181b;
            --muted: #71717a;
            --accent: #18181b;
            --accent-hover: #27272a;
            --danger: #b91c1c;
            --success-bg: #f0fdf4;
            --success-text: #166534;
            --success-border: #bbf7d0;
            --error-bg: #fef2f2;
            --error-text: #991b1b;
            --error-border: #fecaca;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .navbar-inner {
            max-width: 920px;
            margin: 0 auto;
            padding: 14px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .nav-brand {
            font-weight: 600;
            letter-spacing: -0.02em;
            color: var(--text);
            text-decoration: none;
            margin-right: 16px;
        }

        .nav-links, .nav-auth {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .nav-link {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.15s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--text);
            font-weight: 500;
        }

        .nav-user {
            font-size: 13px;
            color: var(--muted);
        }

        /* Layout & Cards */
        .container {
            max-width: 920px;
            margin: 36px auto;
            padding: 0 20px;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 28px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        .subtitle {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: background 0.15s, border-color 0.15s, color 0.15s;
            font-family: inherit;
        }

        .btn-primary {
            background: var(--accent);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
        }

        .btn-ghost {
            background: transparent;
            color: var(--text);
            border-color: var(--border);
        }

        .btn-ghost:hover {
            background: #f4f4f5;
        }

        .btn-link {
            background: none;
            border: none;
            padding: 0;
            font-size: 13px;
            color: var(--muted);
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
        }

        .btn-link:hover { color: var(--text); }
        .btn-link.danger:hover { color: var(--danger); }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border: 1px solid;
        }

        .alert-success {
            background: var(--success-bg);
            color: var(--success-text);
            border-color: var(--success-border);
        }

        .alert-error {
            background: var(--error-bg);
            color: var(--error-text);
            border-color: var(--error-border);
        }

        .alert-error ul {
            margin: 0;
            padding-left: 18px;
        }

        /* Table */
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--muted);
            font-weight: 600;
            padding: 12px 14px;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #f4f4f5;
            vertical-align: top;
            font-size: 14px;
        }

        tr:last-child td { border-bottom: none; }

        .task-title { font-weight: 500; color: var(--text); }
        .task-desc { color: var(--muted); font-size: 13px; margin-top: 2px; }

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
            white-space: nowrap;
        }

        /* Minimal Pills */
        .pill {
            display: inline-block;
            padding: 2px 9px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid var(--border);
            background: #f4f4f5;
            color: #3f3f46;
        }

        .pill-done {
            background: #f0fdf4;
            border-color: #dcfce7;
            color: #166534;
        }

        .pill-in_progress {
            background: #f4f4f5;
            border-color: #d4d4d8;
            color: #18181b;
        }

        .pill-high {
            background: #fef2f2;
            border-color: #fee2e2;
            color: #991b1b;
        }

        /* Forms */
        .form-group {
            margin-bottom: 18px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--text);
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 9px 12px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text);
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 6px;
            outline: none;
            transition: border-color 0.15s;
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--text);
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        /* Meta List (Profile/About) */
        .meta-list {
            display: grid;
            gap: 14px;
            margin-top: 20px;
        }

        .meta-item {
            padding-bottom: 14px;
            border-bottom: 1px solid #f4f4f5;
        }

        .meta-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .meta-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--muted);
        }

        .meta-value {
            font-size: 15px;
            font-weight: 500;
            margin-top: 2px;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--muted);
        }
    </style>
</head>
<body>
    @include('partials.nav')

    <main class="container">
        @yield('content')
    </main>
</body>
</html>