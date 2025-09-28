<?php
require_once __DIR__ . '/../../inc/bootstrap.php';
require_once __DIR__ . '/../../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método no permitido'); }
if (empty($_POST['csrf']) || $_POST['csrf'] !== ($_SESSION['csrf'] ?? '')) { $_SESSION['flash'][]='CSRF inválido.'; header('Location: ../../login.php'); exit; }

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';
$next  = $_POST['next'] ?? '../../index.php';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $pass==='') {
  $_SESSION['flash'][] = 'Credenciales inválidas.'; header('Location: ../../login.php'); exit;
}

$stmt = db('auth')->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
$u = $stmt->fetch();

if ($u && password_verify($pass, $u['password_hash'])) {
  $_SESSION['user'] = ['id'=>$u['id'],'name'=>$u['name'],'email'=>$u['email']];
  $_SESSION['flash'][] = 'Sesión iniciada.';
  header('Location: ' . $next); exit;
}

$_SESSION['flash'][] = 'Email o contraseña incorrectos.';
header('Location: ../../login.php'); exit;
