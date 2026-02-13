<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Electronics Web Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #4cc9f0;
            --dark: #1e1e2c;
            --light: #f8f9fa;
            --gray: #6c757d;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }
        
        .logo {
            height: 50px;
        }
        
        .nav-links li {
            margin: 0 15px;
        }
        
        .nav-links a {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
        }
        
        .nav-links a:hover {
            transform: translateY(-2px);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: white;
            transition: width 0.3s;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .cart-icon {
            font-size: 1.5rem;
            color: white;
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -12px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .product-details-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        .carousel-container {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .carousel-inner {
            border-radius: 12px;
        }
        
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
        
        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.8;
        }
        
        .carousel-control-prev:hover, .carousel-control-next:hover {
            background: rgba(0, 0, 0, 0.6);
        }
        
        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            background-color: var(--primary);
        }
        
        .thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            padding: 10px;
            overflow-x: auto;
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s;
            flex-shrink: 0;
        }
        
        .thumbnail.active {
            border-color: var(--primary);
        }
        
        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }
        
        .product-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .product-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
            margin-bottom: 30px;
        }
        
        .specs-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
            border-bottom: 2px solid var(--secondary);
            padding-bottom: 8px;
            display: inline-block;
        }
        
        .specs-list {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }
        
        .specs-list li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .specs-list li:last-child {
            border-bottom: none;
        }
        
        .spec-label {
            font-weight: 600;
            color: var(--dark);
            width: 40%;
        }
        
        .spec-value {
            color: #555;
            width: 60%;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-buy, .btn-cart {
            padding: 14px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-buy {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            flex: 2;
        }
        
        .btn-cart {
            background: #f1f3f6;
            color: var(--dark);
            flex: 1;
        }
        
        .btn-buy:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-cart:hover {
            background: #e2e6ea;
        }
        
        .review-section {
            margin-top: 50px;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .review-card {
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #eee;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        
        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .review-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            margin-right: 15px;
        }
        
        .review-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--dark);
        }
        
        .review-date {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .rating {
            color: #ffc107;
            margin: 10px 0;
        }
        
        .review-text {
            color: #555;
            line-height: 1.6;
        }
        
        .related-products {
            margin-top: 60px;
        }
        
        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--dark);
            position: relative;
            padding-left: 20px;
        }
        
        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 5px;
            height: 80%;
            width: 6px;
            background: var(--primary);
            border-radius: 3px;
        }
        
        .product-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
            background: white;
            margin-bottom: 25px;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
        }
        
        .product-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .product-card-body {
            padding: 20px;
        }
        
        .product-card-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--dark);
        }
        
        .product-card-price {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .btn-add {
            width: 100%;
            padding: 10px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-add:hover {
            background: #3a56d4;
        }
        
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }
        
        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .product-title {
                font-size: 1.8rem;
            }
            
            .product-price {
                font-size: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .carousel-item img {
                height: 300px;
            }
            
            .specs-list li {
                flex-direction: column;
            }
            
            .spec-label, .spec-value {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="elctrospherelogo.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto nav-links">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                </ul>
                <div class="d-flex ms-3">
                    <a href="#" class="cart-icon position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">3</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Product Details Section -->
    <div class="container product-details-container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Product_images/galaxys25.png" class="d-block w-100" alt="Smartphone">
                            </div>
                            <div class="carousel-item">
                                <img src="Product_images/vivox200.png" class="d-block w-100" alt="Smartphone Side View">
                            </div>
                            <div class="carousel-item">
                                <img src="Product_images/pixel9.png" class="d-block w-100" alt="Smartphone Camera">
                            </div>
                            <div class="carousel-item">
                                <img src="Product_images/oneplus13.png" class="d-block w-100" alt="Smartphone Accessories">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                    </div>
                </div>
                
                <!-- Thumbnails -->
                <div class="thumbnails">
                    <div class="thumbnail active">
                        <img src="Product_images/galaxys25.png" alt="Thumb 1">
                    </div>
                    <div class="thumbnail">
                        <img src="Product_images/vivox200.png" alt="Thumb 2">
                    </div>
                    <div class="thumbnail">
                        <img src="Product_images/pixel9.png" alt="Thumb 3">
                    </div>
                    <div class="thumbnail">
                        <img src="Product_images/oneplus13.png" alt="Thumb 4">
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="product-info">
                    <h1 class="product-title">Vivo X200 Pro 5G (Cosmos Black, 512 GB)</h1>
                    <div class="product-price">₹94,999</div>
                    <div class="rating mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="ms-2">4.5 (128 Reviews)</span>
                    </div>
                    <p class="product-description">
                        The Vivo X200 Pro 5G is a flagship smartphone with cutting-edge features. 
                        Equipped with a professional-grade camera system, it captures stunning photos 
                        in any lighting condition. The 6.7-inch AMOLED display offers vibrant colors 
                        and deep blacks, perfect for media consumption.
                    </p>
                    
                    <h3 class="specs-title">Specifications</h3>
                    <ul class="specs-list">
                        <li>
                            <span class="spec-label">Display:</span>
                            <span class="spec-value">6.7-inch AMOLED, 120Hz refresh rate</span>
                        </li>
                        <li>
                            <span class="spec-label">Processor:</span>
                            <span class="spec-value">Snapdragon 8 Gen 2</span>
                        </li>
                        <li>
                            <span class="spec-label">RAM:</span>
                            <span class="spec-value">16GB LPDDR5</span>
                        </li>
                        <li>
                            <span class="spec-label">Storage:</span>
                            <span class="spec-value">512GB UFS 4.0</span>
                        </li>
                        <li>
                            <span class="spec-label">Camera:</span>
                            <span class="spec-value">Triple rear: 50MP + 48MP + 12MP, 32MP front</span>
                        </li>
                        <li>
                            <span class="spec-label">Battery:</span>
                            <span class="spec-value">5000mAh with 120W fast charging</span>
                        </li>
                        <li>
                            <span class="spec-label">OS:</span>
                            <span class="spec-value">Android 13 with Funtouch OS</span>
                        </li>
                    </ul>
                    
                    <div class="action-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-bolt"></i> Buy Now
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Reviews Section -->
        <div class="review-section">
            <h3 class="section-title">Customer Reviews</h3>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="review-card">
                        <div class="review-header">
                            <div class="review-avatar">R</div>
                            <div>
                                <div class="review-name">Rajesh Kumar</div>
                                <div class="review-date">October 12, 2023</div>
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="review-text">
                            This phone exceeded all my expectations! The camera quality is professional-grade, 
                            and the battery lasts all day with heavy usage. The 120Hz display is buttery smooth.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="review-card">
                        <div class="review-header">
                            <div class="review-avatar">P</div>
                            <div>
                                <div class="review-name">Priya Sharma</div>
                                <div class="review-date">October 5, 2023</div>
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="review-text">
                            The Vivo X200 Pro is a powerhouse. The charging speed is incredible - 
                            0 to 100% in just 25 minutes! The camera performance in low light is 
                            particularly impressive.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="review-card">
                        <div class="review-header">
                            <div class="review-avatar">A</div>
                            <div>
                                <div class="review-name">Amit Patel</div>
                                <div class="review-date">September 28, 2023</div>
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p class="review-text">
                            Great phone overall. The display is stunning and the performance is top-notch. 
                            My only complaint is that it's a bit heavy compared to other flagships.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="review-card">
                        <div class="review-header">
                            <div class="review-avatar">S</div>
                            <div>
                                <div class="review-name">Sunita Reddy</div>
                                <div class="review-date">September 20, 2023</div>
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="review-text">
                            Worth every penny! The camera system is phenomenal, especially the portrait mode. 
                            Battery life is excellent, and the fast charging is a game-changer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <div class="related-products">
            <h3 class="section-title">Related Products</h3>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1605236453806-6ff36851218e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" class="product-img" alt="Samsung Galaxy">
                        <div class="product-card-body">
                            <h5 class="product-card-title">Samsung Galaxy S25 Ultra</h5>
                            <div class="product-card-price">₹141,999</div>
                            <button class="btn btn-add">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" class="product-img" alt="Google Pixel">
                        <div class="product-card-body">
                            <h5 class="product-card-title">Google Pixel 9 Pro</h5>
                            <div class="product-card-price">₹99,999</div>
                            <button class="btn btn-add">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1512054502232-10a0a035d672?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" class="product-img" alt="OnePlus">
                        <div class="product-card-body">
                            <h5 class="product-card-title">OnePlus 13 5G</h5>
                            <div class="product-card-price">₹73,990</div>
                            <button class="btn btn-add">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1610792516307-ea5acd9c3b00?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" class="product-img" alt="iPhone">
                        <div class="product-card-body">
                            <h5 class="product-card-title">Apple iPhone 16 Pro</h5>
                            <div class="product-card-price">₹135,900</div>
                            <button class="btn btn-add">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">ElectroSphere</h5>
                    <p style="color: #bbb; line-height: 1.7;">
                        Your one-stop destination for the latest electronics and gadgets at competitive prices. 
                        Quality products with warranty and excellent customer support.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Deals & Discounts</a></li>
                        <li><a href="#">Gift Cards</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Customer Service</h5>
                    <ul class="footer-links">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Returns & Exchange</a></li>
                        <li><a href="#">Track Your Order</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Contact Info</h5>
                    <ul class="footer-links">
                        <li style="color: #bbb;"><i class="fas fa-map-marker-alt me-2"></i> 123 Tech Street, Bangalore</li>
                        <li style="color: #bbb;"><i class="fas fa-phone me-2"></i> +91 98765 43210</li>
                        <li style="color: #bbb;"><i class="fas fa-envelope me-2"></i> support@electrosphere.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                &copy; 2023 ElectroSphere. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Thumbnail click functionality
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Remove active class from all thumbnails
                document.querySelectorAll('.thumbnail').forEach(t => {
                    t.classList.remove('active');
                });
                
                // Add active class to clicked thumbnail
                this.classList.add('active');
                
                // Get the index of clicked thumbnail
                const index = Array.from(this.parentElement.children).indexOf(this);
                
                // Activate the corresponding carousel item
                const carousel = document.getElementById('productCarousel');
                const carouselInstance = bootstrap.Carousel.getInstance(carousel);
                carouselInstance.to(index);
            });
        });
        
        // Carousel slide event to update active thumbnail
        document.getElementById('productCarousel').addEventListener('slid.bs.carousel', function(event) {
            const activeIndex = event.to;
            const thumbnails = document.querySelectorAll('.thumbnail');
            
            // Remove active class from all thumbnails
            thumbnails.forEach(t => t.classList.remove('active'));
            
            // Add active class to corresponding thumbnail
            if (thumbnails[activeIndex]) {
                thumbnails[activeIndex].classList.add('active');
            }
        });
    </script>
</body>
</html>