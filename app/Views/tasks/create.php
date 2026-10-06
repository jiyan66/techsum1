<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register New Workspace Parameters</title>
</head>
<body>
    <h2>Form Entry: Register Task Parameters</h2>

    <!-- Dynamic Validation Error Alert Elements List -->
    <?php if(session()->getFlashdata('errors')): ?>
        <div style="color: red; font-weight: bold;">
            <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/tasks/create" method="POST">
        <?= csrf_field() ?>
        <div>
            <label>Title Field Header Descriptor (Required):</label><br>
            <input type="text" name="title" value="<?= old('title') ?>">
        </div><br>

        <div>
            <label>Detailed Workspace Area Description (Optional):</label><br>
            <textarea name="description"><?= old('description') ?></textarea>
        </div><br>

        <div>
            <label>Target Tracking Schedule Date (Required):</label><br>
            <input type="date" name="task_date" value="<?= old('task_date') ?>">
        </div><br>

        <button type="submit">Publish Active Entry Row</button>
        <a href="/tasks">Cancel & Discard Form</a>
    </form>
</body>
</html>
