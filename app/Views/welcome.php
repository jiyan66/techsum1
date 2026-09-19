<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Tasks for Today</h1>

<p>
    Today is <?= esc(date('F d, Y')) ?>.
    Here are the tasks scheduled for today.
</p>

<?php if (!empty($tasks)): ?>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>

                    <td class="<?= esc($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </td>

                    <td>
                        <?= esc(date('F d, Y', strtotime($task['task_date']))) ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="empty-message">There are no tasks scheduled for today.</p>
<?php endif ?>

<?= $this->endSection() ?>