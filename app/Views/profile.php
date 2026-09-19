<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>User Profile</h1>

<?php if (!empty($user)): ?>
    <div class="profile-item">
        <strong>User ID:</strong>
        <?= esc($user['id']) ?>
    </div>

    <div class="profile-item">
        <strong>Username:</strong>
        <?= esc($user['username']) ?>
    </div>

    <div class="profile-item">
        <strong>Full Name:</strong>
        <?= esc($user['full_name']) ?>
    </div>

    <div class="profile-item">
        <strong>Email:</strong>
        <?= esc($user['email']) ?>
    </div>

    <div class="profile-item">
        <strong>Account Created:</strong>
        <?= esc(date('F d, Y h:i A', strtotime($user['created_at']))) ?>
    </div>
<?php else: ?>
    <p class="empty-message">No user record was found.</p>
<?php endif ?>

<?= $this->endSection() ?>