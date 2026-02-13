<?php
session_start();
require 'db_connect.php';

$item_id = $_POST['item_id'];
$action = $_POST['action'];

// Get current quantity
$stmt = $pdo->prepare("SELECT quantity FROM cart_items WHERE id = ?");
$stmt->execute([$item_id]);
$current = $stmt->fetchColumn();

$new_quantity = $action === 'increase' ? $current + 1 : max(1, $current - 1);

$stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
$stmt->execute([$new_quantity, $item_id]);

echo json_encode(['status' => 'success']);
?>