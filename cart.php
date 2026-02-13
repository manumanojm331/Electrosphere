<?php
session_start();
require 'db_connect.php';

// Generate a unique order ID and store it in the session
if (!isset($_SESSION['order_id'])) {
    $_SESSION['order_id'] = uniqid('order_'); // Generate a unique order ID
}

$session_id = session_id();
$stmt = $pdo->prepare("SELECT * FROM cart_items WHERE session_id = ?");
$stmt->execute([$session_id]);
$items = $stmt->fetchAll();

$total = 0;
foreach ($items as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO Tags -->
    <title>Electronics Web Store | Smartphones, Laptops, Audio & More</title>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    
    <!-- Include Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="homepage_cart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
   <nav>   
        <div class="navbar">
            <a href="homepage.php"><img src="elctrospherelogo.png" alt="Cart Logo" class="logo" width="200px"></a>
            <div class="nav-main">
                
                <ul class="nav-links">
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="signin.php">Sign out</a></li>
                </ul>
                <div class="cart-icon-container">
    <a href="cart.php?session_id=<?= isset($_SESSION['cart_session_id']) ? $_SESSION['cart_session_id'] : '' ?>" 
   class="position-relative text-white mx-3 cart-link">
   <ion-icon name="cart-outline" style="font-size: 1.5rem"></ion-icon>
   <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count">
       <?php 
       // PHP fallback
       echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '0';
       ?>
   </span>
</a>
</div>
            </div>
            
            <div class="menu-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <h1 class="text-center mb-4">Your Shopping Cart</h1>
        
        <?php if (empty($items)): ?>
            <div class="empty-cart text-center">
                <ion-icon name="cart-outline" class="empty-cart-icon" style="font-size: 5rem;"></ion-icon>
                <h3 class="mt-3">Your cart is empty</h3>
                <a href="homepage.php" class="btn btn-primary mt-3">Continue Shopping</a>
            </div>
        <?php else: ?>
            <div class="cart-items">
                <?php foreach ($items as $item): ?>
               <div class="cart-item mb-3 p-3 border rounded">
    <div class="row">
        <div class="col-md-2">
            <img src="<?= $item['image'] ?>" class="cart-item-image img-fluid">
        </div>
        <div class="col-md-6">
            <h3><?= $item['product_name'] ?></h3>
            <p class="text-muted">₹<?= $item['price'] ?></p>
        </div>
        <div class="col-md-2">
            <div class="input-group">
                <button class="btn btn-outline-secondary update-qty" data-action="decrease" data-id="<?= $item['id'] ?>">-</button>
                <input type="text" class="form-control text-center" value="<?= $item['quantity'] ?>" readonly>
                <button class="btn btn-outline-secondary update-qty" data-action="increase" data-id="<?= $item['id'] ?>">+</button>
            </div>
        </div>
        <div class="col-md-2 text-end">
            <button class="btn btn-danger remove-item" data-id="<?= $item['id'] ?>">Remove</button>
        </div>
    </div>
</div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary mt-5 p-4 border rounded bg-light">
                <h4 class="mb-4">Order Summary</h4>
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <span>₹<?= number_format($total, 2) ?></span>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <span>Shipping:</span>
                    <span>FREE</span>
                </div>
                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Total:</span>
                    <span>₹<?= number_format($total, 2) ?></span>
                </div>
                <form action="payment.php" method="POST">
                    <input type="hidden" name="total_amount" value="<?= $total ?>">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Proceed to Checkout</button>
                </form>
            </div>
        <?php endif; ?>
    </main>

    <script>
    // Quantity updates
    document.querySelectorAll('.update-qty').forEach(btn => {
        btn.addEventListener('click', function() {
            const formData = new FormData();
            formData.append('item_id', this.dataset.id);
            formData.append('action', this.dataset.action);

            fetch('update_quantity.php', {
                method: 'POST',
                body: formData
            }).then(() => location.reload());
        });
    });
    </script>
</body>
</html> 