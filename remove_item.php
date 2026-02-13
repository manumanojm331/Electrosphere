<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$item_id = $_POST['item_id'] ?? null;

if (!$item_id) {
    echo json_encode(['status' => 'error', 'message' => 'Item ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ?");
    $stmt->execute([$item_id]);
    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>