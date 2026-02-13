<?php
session_start();
require 'product_data.php'; // Include the product data file

// Get the product ID from the URL
$product_id = $_GET['id'] ?? null;

if (!$product_id || !isset($products[$product_id])) {
    header('Location: homepage.php');
    exit;
}

$product = $products[$product_id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Electronics Web Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <a href="homepage.php"><img src="elctrospherelogo.png" alt="Electrosphere Logo" class="logo" width="200px"></a>
            <div class="nav-main">
                <ul class="nav-links">
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="signin.php">Sign out</a></li>
                </ul>
            <div class="menu-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image-container">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="product-image img-fluid">
                </div>
                <div class="additional-images mt-3">
                    <img src="<?php echo htmlspecialchars($product['image2']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="additional-image img-fluid">
                </div>
            </div>
            <div class="col-md-6">  
    <h1 class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></h1>
    <p class="text-muted">₹<?php echo htmlspecialchars($product['price']); ?></p>
    <p><?php echo htmlspecialchars($product['description']); ?></p>
    <div class="product-actions">
    <div class="d-flex justify-content-between align-items-center">
        <a href="payment.php?product_id=<?php echo $product['id']; ?>&price=<?php echo $product['price']; ?>" 
           class="btn btn-primary btn-lg">Buy Now</a>
    </div>
</div>  
</div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
                <a href="services.php">Terms of Service</a>
                <a href="services.php">Shipping Info</a>
                <a href="services.php">Returns Policy</a>
            </div>
            <div class="copyright">
                &copy; 2023 ElectroShop. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="homepage_cart.js"></script>
</body>
</html>