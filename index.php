<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeepAura Antique Jewelry</title>

    <!-- Link to Google Fonts for a Vintage Font Style -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">

    <!-- Link to Bootstrap CSS for Layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        /* General Styles */
        body {
            font-family: 'Merriweather', serif;
            background-color: #f8f4e1;
            color: #333;
            padding-top: 56px;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #49331c;
            padding: 10px 20px;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            color: #a17a39 !important;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            font-family: 'Playfair Display', serif;
            color: #a17a39 !important;
            padding: 8px 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #e5c07b;
        }

        /* Hero Section */
        .hero-section {
            background-color: #4e3629;
            color: #f1e6b0;
            padding: 120px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        .hero-section h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #d1a057;
            border: none;
            font-family: 'Merriweather', serif;
        }

        .btn-primary:hover {
            background-color: #b88e47;
        }

        /* Product Card Styles */
        .card {
            border: 1px solid #d1a057;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fef2d7;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .footer {
            background-color: #3e2b19;
            color: #d1a057;
            padding: 30px 0;
            text-align: center;
        }

        .social-media a img {
            width: 40px;
            margin: 0 10px;
            transition: transform 0.3s ease;
        }

        .social-media a:hover img {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">DeepAura Jewels</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <div class="inputBox_container">
                        <input class="inputBox" id="inputBox" type="text" placeholder="Search For Products">
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="view-cart" data-bs-toggle="modal" data-bs-target="#cartModal">
                            <img height="27px" src="socialmida/bag.svg" alt="">
                            <span id="cart-count"></span>
                        </a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href=".php">signup</a>
            <?php endif; ?>
                
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <h2>Welcome to DeepAura Jewellery Shop</h2>
            <p>Discover the finest handcrafted jewelry with timeless elegance for every occasion.</p>
            <a href="#products" class="btn btn-primary mt-4">Shop Now</a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="container my-5">
        <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">Our Timeless Collection</h2>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0015.jpg" class="card-img-top" alt="Elegant butterfly Ring">
                    <div class="card-body">
                        <h5 class="card-title">Elegant butterfly Ring</h5>
                        <p class="card-text">₹120</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="1"
                            data-product-name="Elegant butterfly Ring" data-product-price="120"
                            data-product-image="ringimag/IMG-20241119-WA0015.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="120"
                            data-product-description="A beautiful butterfly-inspired ring with elegant design."
                            data-product-image="ringimag/IMG-20241119-WA0015.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0016.jpg" class="card-img-top" alt="Antique Silver Ring">
                    <div class="card-body">
                        <h5 class="card-title">Antique Silver Ring</h5>
                        <p class="card-text">100</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="2"
                            data-product-name="Antique Silver Ring" data-product-price="100"
                            data-product-image="ringimag/IMG-20241119-WA0016.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Antique Silver Ring" data-product-price="100"
                            data-product-description="An exquisite antique silver ring, perfect for formal occasions."
                            data-product-image="ringimag/IMG-20241119-WA0016.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0017.jpg" class="card-img-top" alt="Elegant Ring">
                    <div class="card-body">
                        <h5 class="card-title">Elegant Ring</h5>
                        <p class="card-text">110</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="3"
                            data-product-name="Elegant Ring" data-product-price="110"
                            data-product-image="ringimag/IMG-20241119-WA0017.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant Ring" data-product-price="110"
                            data-product-description="A sleek and sophisticated elegant ring design."
                            data-product-image="ringimag/IMG-20241119-WA0017.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0018.jpg" class="card-img-top" alt="Carat silver lovely ring">
                    <div class="card-body">
                        <h5 class="card-title">Carat Silver Lovely Ring</h5>
                        <p class="card-text">130</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="4"
                            data-product-name="Carat Silver Lovely Ring" data-product-price="130"
                            data-product-image="ringimag/IMG-20241119-WA0018.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Carat Silver Lovely Ring" data-product-price="130"
                            data-product-description="A dazzling carat silver ring with a lovely design."
                            data-product-image="ringimag/IMG-20241119-WA0018.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <!-- Product 5 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0019.jpg" class="card-img-top" alt="Black Floral Girls Ring">
                    <div class="card-body">
                        <h5 class="card-title">Black Floral Girls Ring</h5>
                        <p class="card-text">130</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="5"
                            data-product-name="Black Floral Girls Ring" data-product-price="130"
                            data-product-image="ringimag/IMG-20241119-WA0019.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Black Floral Girls Ring" data-product-price="130"
                            data-product-description="A stylish black floral ring designed for young girls."
                            data-product-image="ringimag/IMG-20241119-WA0019.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 6 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0020.jpg" class="card-img-top" alt="Livinson Vintage Ring">
                    <div class="card-body">
                        <h5 class="card-title">Livinson Vintage Ring</h5>
                        <p class="card-text">120</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="6"
                            data-product-name="Livinson Vintage Ring" data-product-price="120"
                            data-product-image="ringimag/IMG-20241119-WA0020.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Livinson Vintage Ring" data-product-price="120"
                            data-product-description="A unique vintage ring that adds charm to any outfit."
                            data-product-image="ringimag/IMG-20241119-WA0020.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 7 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0021.jpg" class="card-img-top" alt="Livinson Vintage Ring">
                    <div class="card-body">
                        <h5 class="card-title">Livinson Vintage Ring</h5>
                        <p class="card-text">120</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="7"
                            data-product-name="Livinson Vintage Ring" data-product-price="120"
                            data-product-image="ringimag/IMG-20241119-WA0021.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Livinson Vintage Ring" data-product-price="120"
                            data-product-description="A timeless vintage ring with intricate details."
                            data-product-image="ringimag/IMG-20241119-WA0021.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 8 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0022.jpg" class="card-img-top" alt="Elegant Butterfly Ring">
                    <div class="card-body">
                        <h5 class="card-title">Elegant Butterfly Ring</h5>
                        <p class="card-text">120</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="8"
                            data-product-name="Elegant Butterfly Ring" data-product-price="120"
                            data-product-image="ringimag/IMG-20241119-WA0022.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant Butterfly Ring" data-product-price="120"
                            data-product-description="A charming ring with a butterfly design."
                            data-product-image="ringimag/IMG-20241119-WA0022.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 9 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0023.jpg" class="card-img-top" alt="Elegant Floral Ring">
                    <div class="card-body">
                        <h5 class="card-title">Elegant Floral Ring</h5>
                        <p class="card-text">120</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="9"
                            data-product-name="Elegant Floral Ring" data-product-price="120"
                            data-product-image="ringimag/IMG-20241119-WA0023.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant Floral Ring" data-product-price="120"
                            data-product-description="A stylish floral design ring with elegance and class."
                            data-product-image="ringimag/IMG-20241119-WA0023.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 10 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0024.jpg" class="card-img-top" alt="Antique Gold Ring">
                    <div class="card-body">
                        <h5 class="card-title">Antique Gold Ring</h5>
                        <p class="card-text">100</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="10"
                            data-product-name="Antique Gold Ring" data-product-price="100"
                            data-product-image="ringimag/IMG-20241119-WA0024.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Antique Gold Ring" data-product-price="100"
                            data-product-description="A stunning antique gold ring with a timeless design."
                            data-product-image="ringimag/IMG-20241119-WA0024.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <!-- Product 11 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0025.jpg" class="card-img-top" alt="Luxury Wedding Ring">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Wedding Ring</h5>
                        <p class="card-text">110</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="11"
                            data-product-name="Luxury Wedding Ring" data-product-price="110"
                            data-product-image="ringimag/IMG-20241119-WA0025.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Luxury Wedding Ring" data-product-price="110"
                            data-product-description="An elegant luxury wedding ring to symbolize eternal love."
                            data-product-image="ringimag/IMG-20241119-WA0025.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            
            <!-- Product 12 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0026.jpg" class="card-img-top" alt="Luxury Wedding Ring">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Wedding Ring</h5>
                        <p class="card-text">120</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="12"
                            data-product-name="Luxury Wedding Ring" data-product-price="120"
                            data-product-image="ringimag/IMG-20241119-WA0026.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Luxury Wedding Ring" data-product-price="120"
                            data-product-description="An elegant luxury wedding ring to symbolize eternal love."
                            data-product-image="ringimag/IMG-20241119-WA0026.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 13 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0027.jpg" class="card-img-top" alt="Gold Plated Ring">
                    <div class="card-body">
                        <h5 class="card-title">Gold Plated Ring</h5>
                        <p class="card-text">100</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="13"
                            data-product-name="Gold Plated Ring" data-product-price="100"
                            data-product-image="ringimag/IMG-20241119-WA0027.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Gold Plated Ring" data-product-price="100"
                            data-product-description="A stunning gold-plated ring with intricate designs."
                            data-product-image="ringimag/IMG-20241119-WA0027.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 14 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0028.jpg" class="card-img-top" alt="Silver Wedding Band">
                    <div class="card-body">
                        <h5 class="card-title">Silver Wedding Band</h5>
                        <p class="card-text">100</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="14"
                            data-product-name="Silver Wedding Band" data-product-price="100"
                            data-product-image="ringimag/IMG-20241119-WA0028.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Silver Wedding Band" data-product-price="100"
                            data-product-description="A sleek and timeless silver wedding band."
                            data-product-image="ringimag/IMG-20241119-WA0028.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        
            <!-- Product 15 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="ringimag/IMG-20241119-WA0029.jpg" class="card-img-top" alt="Diamond Gold Ring">
                    <div class="card-body">
                        <h5 class="card-title">Diamond Gold Ring</h5>
                        <p class="card-text">130</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="15"
                            data-product-name="Diamond Gold Ring" data-product-price="130"
                            data-product-image="ringimag/IMG-20241119-WA0029.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Diamond Gold Ring" data-product-price="130"
                            data-product-description="A luxurious diamond ring set in 18k gold."
                            data-product-image="ringimag/IMG-20241119-WA0029.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="products" class="container my-5">
        <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">Earrings</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="earring/1.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Earrings</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="16"
                            data-product-name="Elegant butterfly Ring" data-product-price="250"
                            data-product-image="earring/1.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="250"
                            data-product-description="Description of Elegant Necklace."
                            data-product-image="earring/1.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="earring/2.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Earrings</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="17"
                            data-product-name="Elegant butterfly Ring" data-product-price="250"
                            data-product-image="earring/2.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="250"
                            data-product-description="Description of Elegant Necklace."
                            data-product-image="earring/2.jpg">Quick View</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="earring/3.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Earrings</h5>
                        <p class="card-text">230</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="18"
                            data-product-name="Elegant butterfly Ring" data-product-price="230"
                            data-product-image="earring/3.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="230"
                            data-product-description="Description of Elegant Necklace."
                            data-product-image="earring/3.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="earring/4.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Earrings</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="19"
                            data-product-name="Elegant butterfly Ring" data-product-price="250"
                            data-product-image="earring/4.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="250"
                            data-product-description="Description of Elegant Necklace."
                            data-product-image="earring/4.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="earring/5.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Earrings</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="20"
                            data-product-name="Earring" data-product-price="200"
                            data-product-image="earring/5.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="220"
                            data-product-description="Description of Elegant Necklace."
                            data-product-image="earring/5.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="imag/earing.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Earrings</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="21"
                            data-product-name="Earring" data-product-price="200"
                            data-product-image="imag/earing.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant butterfly Ring" data-product-price="220"
                            data-product-description="Description of Elegant Necklace."
                            data-product-image="imag/earing.jpg">Quick View</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="products" class="container my-5">
        <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">Bangles</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="imag/11.jpg" class="card-img-top" alt="Jewelry Piece 1">
                    <div class="card-body">
                        <h5 class="card-title">Golden Necklace</h5>
                        <p class="card-text">1199</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="22"
                            data-product-name="Golden Necklace" data-product-price="1199"
                            data-product-image="imag/11.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Golden Necklace" data-product-price="1199"
                            data-product-description="A beautiful golden necklace perfect for any occasion."
                            data-product-image="imag/11.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="imag/12.jpg" class="card-img-top" alt="Jewelry Piece 2">
                    <div class="card-body">
                        <h5 class="card-title">Elegant Butterfly Ring</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="23"
                            data-product-name="Elegant Butterfly Ring" data-product-price="250"
                            data-product-image="imag/12.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Elegant Butterfly Ring" data-product-price="250"
                            data-product-description=" "
                            data-product-image="imag/12.jpg">Quick View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="imag/13.jpg" class="card-img-top" alt="Jewelry Piece 3">
                    <div class="card-body">
                        <h5 class="card-title">Gold Bangles</h5>
                        <p class="card-text">250</p>
                        <a href="#" class="btn btn-outline-primary add-to-cart" data-product-id="24"
                            data-product-name="Gold Bangles" data-product-price="250"
                            data-product-image="imag/13.jpg">Add to Cart</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            data-product-name="Gold Bangles" data-product-price="250"
                            data-product-description="Elegant gold bangles that complement any traditional attire."
                            data-product-image="imag/13.jpg">Quick View</button>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    
    <!-- Quick View Modal -->
    <!-- Quick View Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quickViewModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modalProductImage" alt="Product Image">
                    <h5 id="modalProductName"></h5>
                    <p id="modalProductDescription"></p>
                    <p>Price: <span id="modalProductPrice"></span></p>

                </div>
            </div>
        </div>
    </div>


  <!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="cart-items-list"></div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5>Total Price: <span id="cart-total-price">0.00</span></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Checkout button logic -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button type="button" class="btn btn-primary" id="checkout-btn" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                        Checkout
                    </button>
                <?php else: ?>
                    <button type="button" class="btn btn-primary" id="login-checkout-btn" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Checkout
                    </button>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<!-- Login/Sign Up Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign In or Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h6>You need to log in or sign up to proceed to checkout.</h6>
                    <a href="login.php" class="btn btn-primary">Sign In</a>
                    <a href="signup.php" class="btn btn-secondary">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="checkout-form" method="POST" action="checkout.php">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Shipping Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                        <!-- <textarea class="form-control" id="address" name="address" rows="3" required></textarea> -->
                    </div>
                    <div class="mb-3">
                        <label for="totalPrice" class="form-label">Total Price</label>
                        <input type="hidden" id="totalPrice" name="totalPrice">
                        <p id="totalPriceDisplay"></p>
                    </div>
                    <div class="mb-3">
                        <label for="productNames" class="form-label">Products</label>
                        <input type="hidden" id="productNames" name="productNames">
                        <p id="productNamesDisplay"></p>
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                            <option value="creditCard" name="payment">Credit Card</option>
                            <option value="paypal" name="payment">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Complete Purchase</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <section id="contact">
        <div class="container">
            <div class="text-center mt-4 social-media">
                <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook"><img
                        src="socialmida/icons8-facebook-logo.svg" alt="Facebook"></a>
                <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram"><img
                        src="socialmida/icons8-instagram-logo.svg" alt="Instagram"></a>
                <a href="https://www.linkedin.com/in/deepak-sharma-615212287/" target="_blank"
                    aria-label="LinkedIn"><img src="socialmida/icons8-linkedin.svg" alt="LinkedIn"></a>
                <a href="https://www.youtube.com/@DeepTech-r8w" target="_blank" aria-label="YouTube"><img
                        src="socialmida/icons8-youtube (1).svg" alt="YouTube"></a>
                <a href="https://wa.me/+923432527807" target="_blank" aria-label="WhatsApp"><img
                        src="socialmida/icons8-whatsapp.svg" alt="WhatsApp"></a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 DeepAura Artifical Jewelry. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-qrcode/1.0/jquery.qrcode.min.js"></script>

    <script>
        // Cart functionality
       // Array to store cart items
// Initialize cart as an empty array
let cart = [];

// Function to add a product to the cart and update display
function addToCart(productId, productName, productPrice, productImage) {
    // Check if the product already exists in the cart
    const existingItem = cart.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1; // Increase quantity if already in cart
    } else {
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            quantity: 1,
            image: productImage
        });
    }

    updateCartDisplay();  // Update the cart display
    saveCart();           // Save the updated cart to localStorage
}

// Function to remove a product from the cart based on its ID
function removeFromCart(productId) {
    // Filter out the item to be removed
    cart = cart.filter(item => item.id !== productId);
    
    updateCartDisplay();  // Update the cart display
    saveCart();           // Save the updated cart to localStorage
}

// Function to update the cart display
function updateCartDisplay() {
    const cartItemsList = document.getElementById('cart-items-list');
    cartItemsList.innerHTML = '';  // Clear current cart display
    let totalPrice = 0;

    cart.forEach(item => {
        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-3');

        cartItemElement.innerHTML = `
            <div class="d-flex align-items-center">
                <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; border-radius: 50px; margin-right: 10px;">
                <div>
                    <h6>${item.name} (x${item.quantity})</h6>
                    <p>${(item.price * item.quantity).toFixed(2)}</p>
                </div>
            </div>
            <button class="btn btn-danger btn-sm remove-item" onclick="removeFromCart('${item.id}')">Remove</button>
        `;
        cartItemsList.appendChild(cartItemElement);
        totalPrice += item.price * item.quantity;
    });

    document.getElementById('cart-total-price').textContent = totalPrice.toFixed(2);
    updateCartCount();  // Update the cart count display
}

// Function to update the cart count display
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems > 0 ? totalItems : '';
}

// Function to save the cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to load the cart from localStorage on page load
function loadCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
        updateCartDisplay();
    }
}

// Load the cart from localStorage when the page loads
window.onload = loadCart;


        // Handle adding items to the cart
        // Handle adding items to the cart
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', event => {
                event.preventDefault();
                const productId = event.target.getAttribute('data-product-id');
                const productName = event.target.getAttribute('data-product-name');
                const productPrice = parseFloat(event.target.getAttribute('data-product-price'));
                const productImage = event.target.getAttribute('data-product-image');

                // Check if the product is already in the cart
                const existingItem = cart.find(item => item.id === productId);

                if (existingItem) {
                    existingItem.quantity += 1; // Increase quantity
                } else {
                    cart.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: 1,
                        image: productImage
                    });
                }

                updateCartDisplay();  // Update the cart display
            });
        });


        // Remove item from the cart
        document.addEventListener('click', event => {
            if (event.target.classList.contains('remove-item')) {
                const productId = event.target.getAttribute('data-product-id');
                cart = cart.filter(item => item.id !== productId);  // Remove the item from the cart
                updateCartDisplay();  // Update the cart display
            }
        });

        // Search functionality
        let searchTimeout;
const inputBox = document.getElementById('inputBox');
inputBox.addEventListener('input', function () {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        const searchTerm = inputBox.value.toLowerCase();
        const productCards = document.querySelectorAll('.card');
        productCards.forEach(card => {
            const productName = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = productName.includes(searchTerm) ? 'block' : 'none';
        });
    }, 300); // Delay the search by 300ms
});


        // Handle checkout
        document.getElementById('checkout-btn').addEventListener('click', function () {
            const totalPrice = document.getElementById('cart-total-price').textContent;
            const productNames = cart.map(item => item.name).join(', ');

            document.getElementById('totalPrice').value = totalPrice;
            document.getElementById('totalPriceDisplay').textContent = '' + totalPrice;
            document.getElementById('productNames').value = productNames;
        });

        // Prevent default actions for right-click and certain key combinations
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function (e) {
            if (e.keyCode == 123 || (e.ctrlKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'C'.charCodeAt(0))) || (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))) {
                return false;
            }
        };

        // Quick view functionality
        document.querySelectorAll('.quick-view').forEach(button => {
            button.addEventListener('click', event => {
                const productId = event.target.getAttribute('data-product-id');
                const productName = event.target.getAttribute('data-product-name');
                const productPrice = event.target.getAttribute('data-product-price');
                const productImage = event.target.getAttribute('data-product-image');
                const productDescription = event.target.getAttribute('data-product-description');

                document.getElementById('quickViewImage').src = productImage;
                document.getElementById('quickViewTitle').textContent = productName;
                document.getElementById('quickViewPrice').textContent = `${productPrice}`;
                document.getElementById('quickViewDescription').textContent = productDescription;

                // Add to Cart button in Quick View modal
                document.getElementById('addToCartFromQuickView').onclick = () => {
                    addToCart(productId, productName, productPrice, productImage);
                };
            });
        });

        // Function to add product to cart (simplified version)
        function addToCart(id, name, price, image) {
            const existingItem = cart.find(item => item.id === id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: parseFloat(price),
                    quantity: 1,
                    image: image
                });
            }
            updateCartDisplay();
            alert(`${name} added to cart!`);
        }
        $(document).ready(function () {
            // Handle Quick View Modal
            $('.btn-primary[data-bs-target="#quickViewModal"]').on('click', function () {
                const productName = $(this).data('product-name');
                const productPrice = $(this).data('product-price');
                const productDescription = $(this).data('product-description');
                const productImage = $(this).data('product-image');

                $('#modalProductName').text(productName);
                $('#modalProductPrice').text(' PKR ' + productPrice);
                $('#modalProductDescription').text(productDescription);
                $('#modalProductImage').attr('src', productImage);
            });

            // Handle Add to Cart from Modal
            $('.add-to-cart-modal').on('click', function () {
                const productName = $('#modalProductName').text();
                const productPrice = $('#modalProductPrice').text();
                const productImage = $('#modalProductImage').attr('src');

                // Here you can implement the logic to add the product to the cart


            });

            // Handle Add to Cart from Product Card
            $('.add-to-cart').on('click', function () {
                const productName = $(this).data('product-name');
                const productPrice = $(this).data('product-price');
                const productImage = $(this).data('product-image');

                // Here you can implement the logic to add the product to the cart

            });
        });

    </script>
    <!-- <script src="script.js"></script> -->
</body>

</html>