<?php include __DIR__ . '/partials/header.php'; ?>

<section class="hero">
  <h1>Bienvenido a la Matrix</h1>
  <p>Explora historia, personajes e imágenes.</p>
  <p><a class="btn" href="historia.php">Comenzar por la Historia</a></p>
</section>

<section class="features">
  <article>
    <h2>Historia</h2>
    <p>Cronología del conflicto.</p>
    <a class="link" href="historia.php">Ver →</a>
  </article>
  <article>
    <h2>Personajes</h2>
    <p>Neo, Trinity, Morpheus…</p>
    <a class="link" href="personajes.php">Ver →</a>
  </article>
  <article>
    <h2>Imágenes</h2>
    <p>Galería ciberpunk.</p>
    <a class="link" href="imagenes.php">Ver →</a>
  </article>
</section>

<hr style="margin:32px 0;border:1px dashed #00ff41">

<section>
  <h2>Acceso rápido</h2>
  <?php include __DIR__ . '/components/form-login.php'; ?>
</section>

<hr style="margin:32px 0;border:1px dashed #00ff41">

<section>
  <h2>Formulario de prueba</h2>
  <?php include __DIR__ . '/components/form-formulario.php'; ?>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
