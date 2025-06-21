<?php
require 'conexaodb.php';

$codigo_encurtado = preg_replace('/[^a-zA-Z0-9]/', '', $_GET['c'] ?? '');

if (!$codigo_encurtado) {
    die("Código não informado.");
}

$stmt = $pdo->prepare("SELECT url_original FROM $tabela WHERE codigo_encurtado = ?");
$stmt->execute([$codigo_encurtado]);

if ($stmt->rowCount() === 0) {
    die("URL encurtada não encontrada.");
}

$row = $stmt->fetch();
$original = $row['url_original'];

if (!filter_var($original, FILTER_VALIDATE_URL)) {
    die("URL inválida.");
}

// Contar acesso
$pdo->prepare("UPDATE $tabela SET qtd_acessos = qtd_acessos + 1 WHERE codigo_encurtado = ?")->execute([$codigo_encurtado]);

header("Location: $original");
exit;
