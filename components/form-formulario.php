<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }
?>
<form method="post" class="card" action="#" style="max-width:720px;margin-top:12px">
  <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

  <label>Pregunta 1: ¿Cuál es tu alias en la Matrix?
    <input type="text" name="q1" required>
  </label><br><br>

  <label>Pregunta 2: Motivación
    <textarea name="q2" rows="4"></textarea>
  </label><br><br>

  <fieldset>
    <legend>Pregunta 3: Elección</legend>
    <label><input type="radio" name="q3" value="roja" required> Píldora Roja</label>
    <label><input type="radio" name="q3" value="azul"> Píldora Azul</label>
    <label><input type="radio" name="q3" value="ninguna"> Ninguna</label>
  </fieldset><br>

  <button class="btn" type="submit">Enviar</button>
</form>
