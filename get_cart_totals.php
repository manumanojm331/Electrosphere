<?php
require 'db_connect.php';

header('Content-Type: application/json');

$sessionId = $_GET['session_id'] ?? '';

try {
    // Get item count and subtotal
    $stmt = $pdo->prepare("SELECT COUNT(*) as item_count, SUM(price * quantity) as subtotal 
                          FROM cart_items WHERE session_id = ?");
    $stmt->execute([$sessionId]);
    $result = $stmt->fetch();
    
    $subtotal = (float)($result['subtotal'] ?? 0);
    $tax = $subtotal * 0.18; // 18% tax
    $total = $subtotal + $tax;
    
    echo json_encode([
        'success' => true,
        'item_count' => (int)($result['item_count'] ?? 0),
        'subtotal' => $subtotal,
        'tax' => $tax,
        'total' => $total
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>