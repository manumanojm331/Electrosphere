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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
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
    <!-- Optional dropdown -->
    <div class="cart-dropdown">
    <div class="cart-dropdown-items">
        <!-- Items will be added dynamically -->
    </div>
    <div class="cart-dropdown-total">
        Total: ₹<span class="cart-total-amount">0</span>
    </div>
    <div class="cart-dropdown-actions">
        <a href="cart.php" class="btn btn-outline-primary">View Cart</a>
        <a href="payment.php?source=dropdown" 
           class="btn btn-primary btn-checkout"
           data-amount="0">Checkout</a>
    </div>
</div>
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
        <h1 class="text-center mb-4">Our Premium Electronics Collection</h1>
        
        <!-- Category Tabs -->
        <div class="category-tabs">
            <button class="category-tab active" data-category="smartphones">Smartphones</button>
            <button class="category-tab" data-category="audio">Audio Devices</button>
            <button class="category-tab" data-category="tvs">TVs & Displays</button>
            <button class="category-tab" data-category="laptops">Laptops</button>
        </div>

        <!-- Smartphones Category -->

        <div id="smartphones" class="category-content active">
            <h2 class="text-center mb-4">Premium Smartphones</h2>
            <div class="row">
                <?php
                $smartphones = [
                    [
                        'id' => 1,   
                        'name' => 'Vivo X200 Pro 5G (Cosmos Black, 512 GB)  (16 GB RAM)',
                        'image' => 'Product_images/vivox200.png',
                        'description' => 'A powerful smartphone with professional camera features.',
                        'price' => '94999',
                    ],
                    [
                        'id' => 2,
                        'name' => 'SAMSUNG Galaxy S25 Ultra 5G (Titanium Black, 512 GB)  (12 GB RAM)',
                        'image' => 'Product_images/galaxys25.png',
                        'description' => 'Premium smartphone with AMOLED display.',
                        'price' => '141999',
                       
                    ],
                    [
                        'id' => 3,
                        'name' => 'Google Pixel 9 Pro 5G (Hazel Grey, 256 GB)  (16 GB RAM)',
                        'image' => 'Product_images/pixel9.png',
                        'description' => 'Best camera phone with pure Android experience.',
                        'price' => '99999',
                       
                    ],
                    [
                        'id' => 4,
                        'name' => 'OnePlus 13 5G (Arctic Dawn, 512 GB ROM)  (16 GB RAM)',
                        'image' => 'Product_images/oneplus13.png',
                        'description' => 'Flagship killer with fast charging.',
                        'price' => '73990',
                        
                    ],
                    [
                        'id' => 5,
                        'name' => 'Apple iPhone 16 Pro Max 5G (Desert Titanium, 256 GB)    ',
                        'image' => 'Product_images/iphone16.png',
                        'description' => 'Apple\'s latest with A16 Bionic chip.',
                        'price' => '135900',
                        
                    ],
                    [
                        'id' => 6,
                        'name' => 'Nothing Phone (3a) 5G (Black, 256 GB ROM)  (8 GB RAM)',
                        'image' => 'Product_images/nothing3a.png',
                        'description' => 'Budget phone with great performance.',
                        'price' => '26999',
                        
                    ],
                    [
                        'id' => 7,
                        'name' => 'ROG Phone 8 Pro Edition (Phantom Black,1 TB) (24 GB)',
                        'image' => 'Product_images/rog8.png',
                        'description' => 'Gaming smartphone with 165Hz refresh rate LTPO Display.',
                        'price' => '119999',
                       
                    ],
                    [
                        'id' => 8,
                        'name' => 'Xiaomi 14 Ultra 5G (White, 512 GB ROM)  (16 GB RAM) ',
                        'image' => 'Product_images/xiaomi14.png',
                        'description' => '4K OLED display with professional camera features.',
                        'price' => '99999',
                      
                    ],
                    [
                        'id' => 9,
                        'name' => 'MOTOROLA Edge 60 Fusion 5G (PANTONE Zephyr, 256 GB)  (12 GB RAM)',
                        'image' => 'Product_images/moto60.png',
                        'description' => 'Budget phone with all latest features.',
                        'price' => '24999',
                       
                    ],
                    [
                        'id' => 10,
                        'name' => 'OPPO Find X8 Pro 5G (Space Black, 512 GB)  (16 GB RAM)',
                        'image' => 'Product_images/oppox8.png',
                        'description' => 'Premium phone with greate camera and performance.',
                        'price' => '99999',
                       
                    ]
                ];
foreach ($smartphones as $product) {
    echo "<div class='col-md-4 mb-4'>
        <div class='product-card'>
            <div class='product-top-section' onclick=\"window.location.href='product-details.php?id={$product['id']}'\">
                <div class='product-image-container'>
                    <img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "' class='product-image'>
                </div>
                <div class='product-info'>
                    <h3 class='fw-bold'>" . htmlspecialchars($product['name']) . "</h3>
                    <p>" . htmlspecialchars($product['description']) . "</p>
                </div>
            </div>
            <div class='product-actions'>
                <div class='d-flex justify-content-between align-items-center'>
                    <span class='text-primary fw-bold'>₹" . htmlspecialchars($product['price']) . "</span>
                    <div class='btn-group'>
                        <button class='btn btn-outline-primary btn-sm add-to-cart' 
                            data-id='" . htmlspecialchars($product['id']) . "'
                            data-name='" . htmlspecialchars($product['name']) . "'
                            data-price='" . htmlspecialchars($product['price']) . "'
                            data-image='" . htmlspecialchars($product['image']) . "'>
                            Add to Cart
                        </button>
                        <a href='product-details.php?id={$product['id']}' class='btn btn-primary btn-sm'>Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}
                ?>
            </div>
        </div>

        <!-- Audio Devices Category -->
        <div id="audio" class="category-content">
            <h2 class="text-center mb-4">High-Quality Audio Devices</h2>
            <div class="row">
                <?php
                $audioDevices = [
                    [
                        'id' => 11,
                        'name' => 'Google Pixel Buds Pro with Active Noise Cancellation Bluetooth  (Bay, True Wireless)',
                        'image' => 'Product_images/pixelbuds.png',
                        'description' => 'Experience sound like never before.',
                        'price' => '9990',
                        'link' => 'product-wireless-earbuds-pro.php'
                    ],
                    [
                        'id' => 12,
                        'name' => 'OnePlus Z2-R Active Noise Cancellation Bluetooth  (Red, In the Ear)',
                        'image' => 'Product_images/oppoheadphone.png',
                        'description' => 'Premium ANC for immersive listening.',
                        'price' => '1884',
                        'link' => 'product-noise-cancelling-headphones.php'
                    ],
                    [
                        'id' => 13,
                        'name' => 'boAt Stone 350 Pro with Dynamic RGB LEDs (Raging Black, Mono Channel)',
                        'image' => 'Product_images/noisespeaker.png',
                        'description' => 'Portable speaker with 12hr battery life.',
                        'price' => '1699',
                        'link' => 'product-bluetooth-speaker.php'
                    ],
                    [
                        'id' => 14,
                        'name' => 'Boult 70 Hrs Battery, Eelctronic Noise Cancellation Mic (Black, On the Ear)',
                        'image' => 'Product_images/boult.png',
                        'description' => 'Professional-grade audio for creators.',
                        'price' => '1999',
                        'link' => 'product-studio-monitor-headphones.php'
                    ],
                    [
                        'id' => 15,
                        'name' => 'Panasonic SC-HT460GW-K 100 W Bluetooth Home Theatre  (Black, 4.1 Channel)',
                        'image' => 'Product_images/panasonic.png',
                        'description' => 'Home theater experience with wireless subwoofer.',
                        'price' => '5999',
                        'link' => 'product-soundbar-3-1.php'
                    ],
                    [
                        'id' => 16,
                        'name' => 'CMF by Nothing Buds 42 dB Active Noise Cancellation (Orange, True Wireless)',
                        'image' => 'Product_images/nothingbuds.png',
                        'description' => 'Compact earbuds with 6hr battery life.',
                        'price' => '2299',
                        'link' => 'product-true-wireless-earbuds.php'
                    ],
                    [
                        'id' => 17,
                        'name' => 'SpinBot Headphones with 50ms Low Latency (Black, On the Ear)',
                        'image' => 'Product_images/gaminghaedphone.png',
                        'description' => '7.1 surround sound with mic.',
                        'price' => '1851',
                        'link' => 'product-gaming-headset.php'
                    ],
                    [
                        'id' => 18,
                        'name' => 'Octec Digital to Analog Audio Converter, Coaxial/Toslink to RCA (L/R) 5V (Black)',
                        'image' => 'Product_images/dac.png',
                        'description' => 'High-resolution audio on the go.',
                        'price' => '693',
                        'link' => 'product-portable-dac.php'
                    ],
                    [
                        'id' => 19,
                        'name' => 'realme Buds Wireless 3 Neo with 13.4mm Driver (Black, In the Ear)',
                        'image' => 'Product_images/realmeneckband.png',
                        'description' => 'Comfortable around-neck design.',
                        'price' => '1099',
                        'link' => 'product-wireless-neckband.php'
                    ],
                    [
                        'id' => 20,
                        'name' => 'SONY SRS-XB100 Portable Super-Compact, 16Hrs Battery (Grey, Stereo Channel)',
                        'image' => 'Product_images/sonyspeaker.png',
                        'description' => 'Bookshelf speakers with amazing clarity.',
                        'price' => '4499',
                        'link' => 'product-hifi-speaker-system.php'
                    ]
                ];

                foreach ($audioDevices as $product) {
                    echo "<div class='col-md-4 mb-4'>
        <div class='product-card'>
            <div class='product-top-section' onclick=\"window.location.href='product-details.php?id={$product['id']}'\">
                <div class='product-image-container'>
                    <img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "' class='product-image'>
                </div>
                <div class='product-info'>
                    <h3 class='fw-bold'>" . htmlspecialchars($product['name']) . "</h3>
                    <p>" . htmlspecialchars($product['description']) . "</p>
                </div>
            </div>
            <div class='product-actions'>
                <div class='d-flex justify-content-between align-items-center'>
                    <span class='text-primary fw-bold'>₹" . htmlspecialchars($product['price']) . "</span>
                    <div class='btn-group'>
                        <button class='btn btn-outline-primary btn-sm add-to-cart' 
                            data-id='" . htmlspecialchars($product['id']) . "'
                            data-name='" . htmlspecialchars($product['name']) . "'
                            data-price='" . htmlspecialchars($product['price']) . "'
                            data-image='" . htmlspecialchars($product['image']) . "'>
                            Add to Cart
                        </button>
                        <a href='product-details.php?id={$product['id']}' class='btn btn-primary btn-sm'>Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}
                ?>
            </div>
        </div>

        <!-- TVs & Displays Category -->
        <div id="tvs" class="category-content">
            <h2 class="text-center mb-4">Stunning TVs & Displays</h2>
            <div class="row">
                <?php
                $tvs = [
                    [
                        'id' => 21,
                        'name' => 'SAMSUNG 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV',
                        'image' => 'Product_images/samsung108.png',
                        'description' => 'Ultra HD resolution for a premium viewing experience.',
                        'price' => '67999',
                        'link' => 'product-4k-smart-tv.php'
                    ],
                    [
                        'id' => 22,
                        'name' => 'SAMSUNG 163 cm (65 inch) Ultra HD (4K) Neo QLED Smart Tizen TV  (QA65QN85CAKLXL)',
                        'image' => 'Product_images/samsung163.png',
                        'description' => 'Future-proof with stunning picture quality.',
                        'price' => '154999',
                        'link' => 'product-8k-oled-tv.php'
                    ],
                    [
                        'id' => 23,
                        'name' => 'LG UltraGear 81.28 cm (32 inch) Curved Quad HD LED Backlit VA Panel with 1000R Curvature',
                        'image' => 'Product_images/lgcurved.png',
                        'description' => '1ms response time for competitive gaming.',
                        'price' => '25999',
                        'link' => 'product-gaming-monitor-240hz.php'
                    ],
                    [
                        'id' => 24,
                        'name' => 'Acer Nitro ED0 80.01 cm (31.5 inch) Curved Full HD LED Backlit VA Panel with 1500R Curvature ',
                        'image' => 'Product_images/acercurved.png',
                        'description' => 'Immersive 34" display for productivity.',
                        'price' => '19999',
                        'link' => 'product-curved-ultrawide-monitor.php'
                    ],
                    [
                        'id' => 25,
                        'name' => 'Bestor HY300 Pro Smart Projector, 160 ANSI Lumens, 720P, 4K Support, 180° Rotation.',
                        'image' => 'Product_images/projecter.png',
                        'description' => '100" screen anywhere with 1080p resolution.',
                        'price' => '5599',
                        'link' => 'product-portable-projector.php'
                    ],
                    [
                        'id' => 26,
                        'name' => 'Lenovo 68.58 cm (27 inch) Curved Full HD VA Panel 99% sRGB, 90% DCI-P3, 2x3W Inbuilt Speakers',
                        'image' => 'Product_images/legioncurved.png',
                        'description' => 'Professional color accuracy for creators.',
                        'price' => '16599',
                        'link' => 'product-4k-hdr-monitor.php'
                    ],
                    [
                        'id' => 27,
                        'name' => 'Sansui 109 cm (43 inch) Full HD LED Smart Google TV with Panel HDR10 Audio  (JSW43GSFHD)',
                        'image' => 'Product_images/sansui.png  ',
                        'description' => 'Brighter than OLED with quantum dot technology.',
                        'price' => '25999',
                        'link' => 'product-qled-tv-65.php'
                    ],
                    [
                        'id' => 28,
                        'name' => 'ViewSonic 40.64 cm (16 inch) Full HD LED Backlit TN Panel Touch compatible',
                        'image' => 'Product_images/viewsonic.png   ',
                        'description' => 'Interactive 27" display for creative work.',
                        'price' => '26999',
                        'link' => 'product-touchscreen-monitor.php'
                    ],
                    [
                        'id' => 29,
                        'name' => 'TCL C755 215 cm (85 inch) Ultra HD (4K) Mini LED Smart Google TV with 144Hz VRR and IMAX Enhanced  (85C755)',
                        'image' => 'Product_images/tcl.png',
                        'description' => 'Thousands of dimming zones for perfect contrast.',
                        'price' => '259999  ',
                        'link' => 'product-mini-led-tv.php'
                    ],
                    [
                        'id' => 30,
                        'name' => 'TCL P655 139 cm (55 inch) Ultra HD (4K) LED Smart Google TV with T-Screen, Dynamic Colour Enhancement and Dolby Audio 24W  (55P655)',
                        'image' => 'Product_images/tcl55.png',
                        'description' => 'Weatherproof design with anti-glare screen.',
                        'price' => '29590',
                        'link' => 'product-outdoor-tv.php'
                    ]
                ];

                foreach ($tvs as $product) {
                    echo "<div class='col-md-4 mb-4'>
        <div class='product-card'>
            <div class='product-top-section' onclick=\"window.location.href='product-details.php?id={$product['id']}'\">
                <div class='product-image-container'>
                    <img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "' class='product-image'>
                </div>
                <div class='product-info'>
                    <h3 class='fw-bold'>" . htmlspecialchars($product['name']) . "</h3>
                    <p>" . htmlspecialchars($product['description']) . "</p>
                </div>
            </div>
            <div class='product-actions'>
                <div class='d-flex justify-content-between align-items-center'>
                    <span class='text-primary fw-bold'>₹" . htmlspecialchars($product['price']) . "</span>
                    <div class='btn-group'>
                        <button class='btn btn-outline-primary btn-sm add-to-cart' 
                            data-id='" . htmlspecialchars($product['id']) . "'
                            data-name='" . htmlspecialchars($product['name']) . "'
                            data-price='" . htmlspecialchars($product['price']) . "'
                            data-image='" . htmlspecialchars($product['image']) . "'>
                            Add to Cart
                        </button>
                        <a href='product-details.php?id={$product['id']}' class='btn btn-primary btn-sm'>Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}
                ?>
            </div>
        </div>

        <!-- Laptops Category -->
        <div id="laptops" class="category-content">
            <h2 class="text-center mb-4">Powerful Laptops</h2>
            <div class="row">
                <?php
                $laptops = [
                    [
                        'id' => 31,
                        'name' => 'SAMSUNG Galaxy Book5 Pro 360 AI PC Full Metal Chasis Intel Core Ultra 7 258V - (32 GB/1 TB SSD/Windows 11 Home) NP960QHA 2 in 1 Laptop',
                        'image' => 'Product_images/galaxybook.png',
                        'description' => 'Thin and light with all-day battery.',
                        'price' => '195999',
                        'link' => 'product-ultrabook-pro.php'
                    ],
                    [
                        'id' => 32,
                        'name' => 'ASUS ROG Zephyrus G16 (2025) with Office 2024 + M365 Basic* Intel Core Ultra 9 285H - (32 GB/2 TB SSD/Windows 11 Home/16 GB Graphics/NVIDIA GeForce RTX 5080',
                        'image' => 'Product_images/roggaming.png',
                        'description' => 'RTX 5080 for maximum performance.',
                        'price' => '349999',
                        'link' => 'product-gaming-laptop.php'
                    ],
                    [
                        'id' => 33,
                        'name' => 'Lenovo IdeaPad Flex 5 AMD Ryzen 5 Hexa Core 7530U - (16 GB/512 GB SSD/Windows 11 Home) 14ABR8 2 in 1 Laptop',
                        'image' => 'Product_images/lennova.png',
                        'description' => 'Laptop and tablet in one device.',
                        'price' => '60599',
                        'link' => 'product-2-in-1-convertible.php'
                    ],
                    [
                        'id' => 34,
                        'name' => 'Apple MacBook AIR Apple M2 - (16 GB/256 GB SSD/macOS Sequoia) MC7X4HN/A  (13.6 Inch, Midnight, 1.24 kg)',
                        'image' => 'Product_images/macm2.png',
                        'description' => 'Apple silicon with fanless design.',
                        'price' => '75999',
                        'link' => 'product-macbook-air-m2.php'
                    ],
                    [
                        'id' => 35,
                        'name' => 'Lenovo Lenovo V15 G3 IAP Intel Core i7 12th Gen 1255U - (16 GB/512 GB SSD/Windows 11 Home) 82TTA073IN Thin and Light Laptop ',
                        'image' => 'Product_images/lennovav15.png',
                        'description' => 'For professionals who need power.',
                        'price' => '50999',
                        'link' => 'product-workstation-laptop.php'
                    ],
                    [
                        'id' => 36,
                        'name' => 'MOTOROLA Motobook 60 Full Metal Intel Core 5 (Series 2) 210H - (16 GB/512 GB SSD/Windows 11 Home) 14IRH10R Thin and Light Laptop',
                        'image' => 'Product_images/motolaptop.png',
                        'description' => 'Great for students and everyday use.',
                        'price' => '65999   ',
                        'link' => 'product-budget-laptop.php'
                    ],
                    [
                        'id' => 37,
                        'name' => 'HP Chromebook MediaTek Kompanio 500 - (4 GB/64 GB EMMC Storage/Chrome OS) 11a-na0006MU Chromebook',
                        'image' => 'Product_images/hp.png',
                        'description' => 'Simple and secure for web browsing.',
                        'price' => '18999',
                        'link' => 'product-chromebook.php'
                    ],
                    [
                        'id' => 38,
                        'name' => 'MSI Modern 14 Intel Core i3 12th Gen 1215U - (8 GB/512 GB SSD/Windows 11 Home) Modern 14 C12MO Business Laptop',
                        'image' => 'Product_images/msi.png',
                        'description' => 'Enterprise-grade security features.',
                        'price' => '32999',
                        'link' => 'product-business-laptop.php'
                    ],
                    [
                        'id' => 39,
                        'name' => 'HP Professional Intel Core i5 13th Gen 1334U Turbo Boost Finger Print - (32 GB/512 GB SSD/Windows 11 Pro) 250 G10 Thin and Light Laptop',
                        'image' => 'Product_images/hppro.png',
                        'description' => 'Optimized for video editing and design.',
                        'price' => '62999',
                        'link' => 'product-creator-laptop.php'
                    ],
                    [
                        'id' => 40,
                        'name' => 'ASUS TUF Gaming A15 AMD Ryzen 5 Hexa Core 7535HS - (8 GB/512 GB SSD/Windows 11 Pro/4 GB Graphics/NVIDIA GeForce RTX 2050) FA506NF-HN578W Gaming Laptop',
                        'image' => 'Product_images/asustuf.png',
                        'description' => 'Military-grade durability.',
                        'price' => '61999',
                        'link' => 'product-rugged-laptop.php'
                    ]
                ];

                foreach ($laptops as $product) {
                    echo "<div class='col-md-4 mb-4'>
        <div class='product-card'>
            <div class='product-top-section' onclick=\"window.location.href='product-details.php?id={$product['id']}'\">
                <div class='product-image-container'>
                    <img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "' class='product-image'>
                </div>
                <div class='product-info'>
                    <h3 class='fw-bold'>" . htmlspecialchars($product['name']) . "</h3>
                    <p>" . htmlspecialchars($product['description']) . "</p>
                </div>
            </div>
            <div class='product-actions'>
                <div class='d-flex justify-content-between align-items-center'>
                    <span class='text-primary fw-bold'>₹" . htmlspecialchars($product['price']) . "</span>
                    <div class='btn-group'>
                        <button class='btn btn-outline-primary btn-sm add-to-cart' 
                            data-id='" . htmlspecialchars($product['id']) . "'
                            data-name='" . htmlspecialchars($product['name']) . "'
                            data-price='" . htmlspecialchars($product['price']) . "'
                            data-image='" . htmlspecialchars($product['image']) . "'>
                            Add to Cart
                        </button>
                        <a href='product-details.php?id={$product['id']}' class='btn btn-primary btn-sm'>Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}
                ?>
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

    <script>
        // Navbar toggle functionality
        const menuToggle = document.querySelector('.menu-toggle');
        const navMain = document.querySelector('.nav-main');
        
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navMain.classList.toggle('active');
        });
        
        // Category tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.category-tab');
            const contents = document.querySelectorAll('.category-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.classList.remove('active'));
                    
                    tab.classList.add('active');
                    const categoryId = tab.getAttribute('data-category');
                    document.getElementById(categoryId).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>