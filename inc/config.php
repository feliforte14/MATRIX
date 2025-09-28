<?php
return [
  'APP_NAME'   => 'MATRIX',
  'BASE_URL'   => 'http://localhost/MATRIX',

  'ENABLE_DB'  => true, // <-- ACTIVADO

  'AUTH_DB' => [        // BD para usuarios (login/registro)
    'HOST' => '127.0.0.1',
    'NAME' => 'matriz_auth',     // <-- reemplazá por tu nombre real
    'USER' => 'root',
    'PASS' => '',
  ],

  'REVIEWS_DB' => [     // BD para reseñas/comentarios
    'HOST' => '127.0.0.1',
    'NAME' => 'matriz_reviews',  // <-- reemplazá por tu nombre real
    'USER' => 'root',
    'PASS' => '',
  ],

  'SESSION_NAME' => 'matrix_sess',
  'CSRF_KEY'     => 'clave-larga-unica',
];
