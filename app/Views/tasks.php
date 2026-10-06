<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasks Dashboard</title>
</head>
<body>
    <h2>Tasks for Today Management</h2>

    <!-- Active User Header Portal Component -->
    <?php if(session()->get('isLoggedIn')): ?>
        <p>Active Session: <strong><?= esc(session()->get('username')) ?></strong> | <a href="/tasks/new">Add New Task</a> | <a href="/logout">Logout</a></p>
    <?php else: ?>
        <p><a href="/login">Authenticate Session (Login)</a> to manage work items.</p>
    <?php endif; ?>

    <!-- Status Messages Output Block -->
    <?php if(session()->getFlashdata('success')): ?>
        <p style="color: green; font-weight: bold;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <p style="color: red; font-weight: bold;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Task Date</th>
                <th>Status</th>
                <th>Action Management Tools</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($tasks)): ?>
                <?php foreach($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['description']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td>
                        <!-- Protect actions inside template rendering space conditionally -->
                        <?php if(session()->get('isLoggedIn')): ?>
                            <a href="/tasks/edit/<?= $task['id'] ?>">Edit</a> | 
                            <a href="/tasks/delete/<?= $task['id'] ?>" onclick="return confirm('Execute safe database archival routine on this tracking parameter?')">Delete</a>
                        <?php else: ?>
                            <span style="color: grey; font-style: italic;">Read-Only View</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No records found matching requirements.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
