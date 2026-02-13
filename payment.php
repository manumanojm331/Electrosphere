<?php
session_start();
require 'product_data.php';
require 'db_connect.php';

// Initialize variables
$display_price = 'Price not available';
$total_amount = 0;
$source = '';

// Determine payment source and amount
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['total_amount'])) {
    // From cart page
    $total_amount = (float)$_POST['total_amount'];
    $source = 'cart';
} elseif (isset($_GET['source']) && $_GET['source'] === 'dropdown' && isset($_GET['amount'])) {
    // From homepage dropdown
    $total_amount = (float)$_GET['amount'];
    $source = 'dropdown';
} elseif (isset($_GET['product_id']) && isset($_GET['price'])) {
    // From product page
    $product_id = $_GET['product_id'];
    $price = $_GET['price'];
    
    // Clean price if it contains currency symbols
    $price_clean = preg_replace('/[^0-9.]/', '', $price);
    $total_amount = (float)$price_clean;
    $source = 'product';
    
    // Get product name for display
    $product_name = isset($products[$product_id]['name']) ? 
        $products[$product_id]['name'] : 'Product';
} else {
    // Default to cart calculation
    $session_id = session_id();
    $stmt = $pdo->prepare("SELECT SUM(price * quantity) as total FROM cart_items WHERE session_id = ?");
    $stmt->execute([$session_id]);
    $result = $stmt->fetch();
    $total_amount = (float)($result['total'] ?? 0);
    $source = 'auto';
}

// Format price for display
$display_price = '₹' . number_format($total_amount, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 500px;
        }
        .payment-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .payment-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .amount-display {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .payment-source {
            text-align: center;
            margin-bottom: 15px;
            color: #6c757d;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #0d6efd;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px;
            font-size: 1.1rem;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0a58ca;
        }
        .payment-source {
            text-align: center;
            margin-bottom: 10px;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="payment-form">
            <h2>Payment Details</h2>
            
            <!-- Display payment source -->
            <div class="payment-source">
                <?php 
                switch($source) {
                    case 'cart':
                        echo 'Payment for your cart items';
                        break;
                    case 'dropdown':
                        echo 'Payment for items in your cart';
                        break;
                    case 'product':
                        echo 'Payment for: ' . htmlspecialchars($product_name);
                        break;
                    default:
                        echo 'Payment for your order';
                }
                ?>
            </div>
            
            <!-- Display amount -->
            <div class="amount-display">
                Total Amount: <?php echo $display_price; ?>
            </div>
            
            <form action="process_payment.php" method="POST">
                <!-- Pass payment source -->
                <input type="hidden" name="source" value="<?php echo htmlspecialchars($source); ?>">
                
                <?php if ($source === 'product'): ?>
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                <?php endif; ?>
                
                <input type="hidden" name="total_amount" value="<?php echo htmlspecialchars($total_amount); ?>">
                
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="cardHolder">Card Holder Name</label>
                    <input type="text" id="cardHolder" name="card_holder" required>
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="text" id="expiryDate" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Pay Now">
                </div>
            </form>
        </div>
    </div>
</body>
</html>