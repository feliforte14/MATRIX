<?php
use PDO;

function db(string $which='auth'): PDO {
  $cfg = require __DIR__ . '/config.php';
  if (!$cfg['ENABLE_DB']) { throw new RuntimeException('BD deshabilitada en config.php'); }

  static $pdoAuth = null, $pdoReviews = null;

  if ($which === 'auth') {
    if ($pdoAuth) return $pdoAuth;
    $d = $cfg['AUTH_DB'];
    $pdoAuth = new PDO("mysql:host={$d['HOST']};dbname={$d['NAME']};charset=utf8mb4", $d['USER'], $d['PASS'], [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ]);
    return $pdoAuth;
  }

  if ($which === 'reviews') {
    if ($pdoReviews) return $pdoReviews;
    $d = $cfg['REVIEWS_DB'];
    $pdoReviews = new PDO("mysql:host={$d['HOST']};dbname={$d['NAME']};charset=utf8mb4", $d['USER'], $d['PASS'], [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ]);
    return $pdoReviews;
  }

  throw new InvalidArgumentException('Conexión desconocida: '.$which);
}
