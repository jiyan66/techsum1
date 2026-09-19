<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc((string) ($pageTitle ?? 'Tasks for Today')) ?> | Tasks for Today</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #222;
        }

        nav {
            background-color: #1f2937;
            padding: 16px;
        }

        nav .nav-container {
            max-width: 900px;
            margin: auto;
        }

        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 900px;
            margin: 30px auto;
            padding: 25px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #1f2937;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #2563eb;
            color: white;
        }

        .pending {
            color: #b45309;
            font-weight: bold;
        }

        .completed {
            color: #15803d;
            font-weight: bold;
        }

        .profile-item {
            margin-bottom: 15px;
        }

        .empty-message {
            padding: 15px;
            background-color: #fef3c7;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="<?= site_url('/') ?>">Welcome</a>
            <a href="<?= site_url('tasks') ?>">Tasks</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
        </div>
    </nav>

    <main>
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>