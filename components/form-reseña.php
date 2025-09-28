<form method="post" class="card" action="api/forms/reseña.php" style="max-width:720px;margin-top:12px">
  <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

  <label>Tu nombre o alias
    <input type="text" name="nombre" required>
  </label><br><br>

  <label>Tu reseña o comentario
    <textarea name="comentario" rows="5" required placeholder="Escribe tu opinión sobre Matrix..."></textarea>
  </label><br><br>

  <label>Calificación (1 a 5)
    <select name="puntuacion" required>
      <option value="">Elige...</option>
      <option value="1">⭐</option>
      <option value="2">⭐⭐</option>
      <option value="3">⭐⭐⭐</option>
      <option value="4">⭐⭐⭐⭐</option>
      <option value="5">⭐⭐⭐⭐⭐</option>
    </select>
  </label><br><br>

  <button class="btn" type="submit">Enviar reseña</button>
</form>
