<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    die(json_encode(['error' => 'Essa página não pode ser acessada diretamente']));
}

require 'conexaodb.php';

$original = $_POST['url_original'] ?? '';

if (!filter_var($original, FILTER_VALIDATE_URL)) {
    http_response_code(400);
    die(json_encode(['error' => 'URL inválida']));
}

do {
    $codigo_encurtado = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);
    $stmt = $pdo->prepare("SELECT id FROM $tabela WHERE codigo_encurtado = ?");
    $stmt->execute([$codigo_encurtado]);
} while ($stmt->rowCount() > 0);

$stmt = $pdo->prepare("INSERT INTO $tabela (url_original, codigo_encurtado) VALUES (?, ?)");
$stmt->execute([$original, $codigo_encurtado]);

$url_encurtada = "http://localhost/encurtador-de-url/redireciona.php?c=$codigo_encurtado";

header('Content-Type: application/json; charset=utf-8');
echo json_encode(
    ['url_encurtada' => $url_encurtada],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK
);
exit;
