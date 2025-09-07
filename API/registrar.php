<?php
// api/registrar.php
// Endpoint simple para recibir datos de usuario, validar y responder en JSON.

// Forzar salida JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if ($method !== 'POST') {
  http_response_code(405);
  echo json_encode([ 'status' => 'error', 'message' => 'Método no permitido. Use POST.' ]);
  exit;
}

// Intentar parsear JSON del cuerpo
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!is_array($data)) {
  // Intentar fallback a application/x-www-form-urlencoded
  $data = $_POST;
}

$username = isset($data['username']) ? trim((string)$data['username']) : '';
$password = isset($data['password']) ? (string)$data['password'] : '';

$errors = [];
if ($username === '') {
  $errors[] = 'El nombre de usuario es obligatorio';
} elseif (mb_strlen($username) < 3) {
  $errors[] = 'El nombre de usuario debe tener al menos 3 caracteres';
}

if ($password === '') {
  $errors[] = 'La contraseña es obligatoria';
} elseif (strlen($password) < 4) {
  $errors[] = 'La contraseña debe tener al menos 4 caracteres';
}

if (!empty($errors)) {
  http_response_code(400);
  echo json_encode([ 'status' => 'error', 'message' => implode('; ', $errors) ]);
  exit;
}

// Simular lógica de registro OK
http_response_code(200);
echo json_encode([ 'status' => 'ok' ]);
