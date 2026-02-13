<?php
session_start();
require 'db_connect.php';

$session_id = session_id();
$stmt = $pdo->prepare("SELECT *, (price * quantity) as total FROM cart_items WHERE session_id = ?");
$stmt->execute([$session_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($items);
?>