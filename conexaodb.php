<?php
$host = 'localhost';
$dbname = 'EncurtadorUrlDB';
$user = 'root';
$pass = '1234';

$tabela = 'urls';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro de conexão: " . $e->getMessage());
}
?>
