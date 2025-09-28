<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }
?>
<form method="post" class="card" action="api/forms/reseña-simple.php" style="max-width:600px;margin-top:12px">
  <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

  <label>Nombre (opcional)
    <input type="text" name="nombre" placeholder="Anónimo">
  </label><br><br>

  <label>Comentario
    <textarea name="comentario" rows="3" required placeholder="¿Qué te pareció Matrix?"></textarea>
  </label><br><br>

  <br>

  <button class="btn" type="submit">Enviar comentario</button>
</form>
