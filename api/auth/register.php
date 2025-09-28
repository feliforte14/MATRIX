<?php
require_once __DIR__ . '/../../inc/bootstrap.php';
require_once __DIR__ . '/../../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método no permitido'); }
if (empty($_POST['csrf']) || $_POST['csrf'] !== ($_SESSION['csrf'] ?? '')) { $_SESSION['flash'][]='CSRF inválido.'; header('Location: ../../register.php'); exit; }

$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if ($name==='' || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($pass)<6) {
  $_SESSION['flash'][]='Datos inválidos (nombre/email/contraseña).';
  header('Location: ../../register.php'); exit;
}

try {
  $stmt = db('auth')->prepare('INSERT INTO users (name,email,password_hash) VALUES (?,?,?)');
  $stmt->execute([$name, $email, password_hash($pass, PASSWORD_DEFAULT)]);
  $_SESSION['flash'][]='Registro exitoso. Iniciá sesión.';
  header('Location: ../../login.php'); exit;
} catch (PDOException $e) {
  $_SESSION['flash'][] = ($e->getCode()==='23000') ? 'El email ya existe.' : 'Error de BD.';
  header('Location: ../../register.php'); exit;
}
