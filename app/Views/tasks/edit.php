<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adjust Dataset Parameters</title>
</head>
<body>
    <h2>Form Entry: Modify Property Metrics</h2>

    <?php if(session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/tasks/update/<?= $task['id'] ?>" method="POST">
        <?= csrf_field() ?>
        <div>
            <label>Title Field Header Descriptor:</label><br>
            <input type="text" name="title" value="<?= old('title', $task['title']) ?>">
        </div><br>

        <div>
            <label>Detailed Workspace Area Description:</label><br>
            <textarea name="description"><?= old('description', $task['description']) ?></textarea>
        </div><br>

        <div>
            <label>Target Tracking Schedule Date:</label><br>
            <input type="date" name="task_date" value="<?= old('task_date', $task['task_date']) ?>">
        </div><br>

        <div>
            <label>Lifecycle Evaluation Phase (Status):</label><br>
            <select name="status">
                <option value="Pending" <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending Processing</option>
                <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress Activity</option>
                <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed Scope Tasks</option>
            </select>
        </div><br>

        <button type="submit">Commit Tracking Adjustments</button>
        <a href="/tasks">Cancel Adjustments</a>
    </form>
</body>
</html>
