<?php if (!empty($_SESSION['flash'])): ?>
  <div class="card">
    <?php foreach ($_SESSION['flash'] as $msg): ?>
      <p><?= htmlspecialchars($msg) ?></p>
    <?php endforeach; unset($_SESSION['flash']); ?>
  </div>
<?php endif; ?>
