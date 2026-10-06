<!DOCTYPE html>
<html lang="en">
<head>
    <title>Authentication Entrance Terminal</title>
</head>
<body>
    <h2>System Access Login</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color: red; font-weight: bold;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="/login/authenticate" method="POST">
        <?= csrf_field() ?>
        <div>
            <label>Email Address Identity Entry:</label><br>
            <input type="email" name="email" value="<?= old('email') ?>" required>
        </div><br>
        
        <div>
            <label>Security Keyphrase (Password):</label><br>
            <input type="password" name="password" required>
        </div><br>

        <button type="submit">Verify Credentials & Open Access</button>
    </form>
    <p><a href="/tasks">Return to Public Dashboard Workspace</a></p>
</body>
</html>
