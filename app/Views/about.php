<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>About the System</h1>

<p>
    Tasks for Today is a simple task management system created using
    CodeIgniter 4.
</p>

<p>
    The system displays today's scheduled tasks, all saved tasks, and the
    account information of its demo user.
</p>

<p>
    <strong>Developer:</strong>
    <?= esc((string) ($developerName ?? 'Gian Mistica')) ?>
</p>

<?= $this->endSection() ?>