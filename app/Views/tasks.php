<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>All Tasks</h1>

<p>These tasks are ordered according to their scheduled date.</p>

<?php if (!empty($tasks)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>

                    <td class="<?= esc($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </td>

                    <td>
                        <?= esc(date('F d, Y', strtotime($task['task_date']))) ?>
                    </td>

                    <td>
                        <?= esc(date('F d, Y h:i A', strtotime($task['created_at']))) ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="empty-message">No tasks were found.</p>
<?php endif ?>

<?= $this->endSection() ?>