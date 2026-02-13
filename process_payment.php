<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect payment details
    $cardNumber = $_POST['card_number'];
    $cardHolder = $_POST['card_holder'];
    $expiryDate = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $totalAmount = $_POST['total_amount'] ?? 0; // Ensure total amount is passed from the cart

    // Validate payment details
    if (empty($cardNumber) || empty($cardHolder) || empty($expiryDate) || empty($cvv)) {
        echo "Please fill in all payment details.";
        exit;
    }

    // Simulate payment processing
    $paymentSuccess = true; // Replace with actual payment processing logic

    if ($paymentSuccess) {
        // Update order status to "Paid"
        $orderId = $_SESSION['order_id']; // Ensure order ID is set in session
        $stmt = $pdo->prepare("UPDATE orders SET status = 'Paid' WHERE id = ?");
        $stmt->execute([$orderId]);

        // Clear cart
        $sessionId = session_id();
        $stmt = $pdo->prepare("DELETE FROM cart_items WHERE session_id = ?");
        $stmt->execute([$sessionId]);

        // Redirect to success page
        header('Location: payment_success.php');
        exit;
    } else {
        echo "Payment failed. Please try again.";
        exit;
    }
}
?>      