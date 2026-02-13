<?php
session_start();
require 'db_connect.php';

$session_id = session_id();
$stmt = $pdo->prepare("SELECT SUM(quantity) AS count FROM cart_items WHERE session_id = ?");
$stmt->execute([$session_id]);
$data = $stmt->fetch();

echo json_encode(['count' => $data['count'] ?? 0]);
?>