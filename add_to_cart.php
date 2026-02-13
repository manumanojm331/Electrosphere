<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$product_id = $_POST['product_id'] ?? null;
$product_name = $_POST['product_name'] ?? null;
$price = (float) str_replace(['₹','$'], '', $_POST['price'] ?? '');
$image = $_POST['image'] ?? null;
$session_id = session_id();

if (!$product_id || !$product_name || !$price || !$image) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

// Check if item exists
$stmt = $pdo->prepare("SELECT * FROM cart_items WHERE session_id = ? AND product_id = ?");
$stmt->execute([$session_id, $product_id]);
$existing = $stmt->fetch();

try {
    if ($existing) {
        $stmt = $pdo->prepare("UPDATE cart_items SET quantity = quantity + 1 WHERE id = ?");
        $stmt->execute([$existing['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart_items (session_id, product_id, product_name, price, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$session_id, $product_id, $product_name, $price, $image]);
    }
    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>