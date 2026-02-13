    <?php
    require 'db_connect.php';

    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    try {
        $stmt = $pdo->prepare("DELETE FROM cart_items WHERE session_id = ?");
        $stmt->execute([$data['session_id']]);
        
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    ?>