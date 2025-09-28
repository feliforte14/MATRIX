<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }
$next = $_GET['next'] ?? 'index.php';
?>
<form method="post" class="card" action="#" style="max-width:520px;margin-top:12px">
  <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">
  <input type="hidden" name="next" value="<?= htmlspecialchars($next) ?>">

  <label>Email<br>
    <input type="email" name="email" required autocomplete="username">
  </label><br><br>

  <label>Contraseña<br>
    <input type="password" name="password" required autocomplete="current-password">
  </label><br><br>

  <button class="btn" type="submit">Entrar</button>
</form>
