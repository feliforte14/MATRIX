<?php
require_once __DIR__ . '/../../inc/bootstrap.php';
require_once __DIR__ . '/../../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método no permitido'); }
if (empty($_POST['csrf']) || $_POST['csrf'] !== ($_SESSION['csrf'] ?? '')) { $_SESSION['flash'][]='CSRF inválido.'; header('Location: ../../reseñas.php'); exit; }

$nombre     = trim($_POST['nombre'] ?? '');
$comentario = trim($_POST['comentario'] ?? '');
$puntuacion = (int)($_POST['puntuacion'] ?? 0);

if ($nombre==='' || $comentario==='' || $puntuacion<1 || $puntuacion>5) {
  $_SESSION['flash'][] = 'Completá nombre, comentario y puntuación (1–5).';
  header('Location: ../../reseñas.php'); exit;
}

$stmt = db('reviews')->prepare('INSERT INTO reseñas (nombre, comentario, puntuacion) VALUES (?,?,?)');
$stmt->execute([$nombre, $comentario, $puntuacion]);

$_SESSION['flash'][] = '¡Gracias! Tu reseña fue registrada.';
header('Location: ../../reseñas.php');
