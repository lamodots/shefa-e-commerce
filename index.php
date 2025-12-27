<?php include('includes/header.php'); ?>
<script>
    document.title = "Shefa - Ecommerce | Home";
</script>

<?php include('includes/navbar.php'); ?>
<header class="  d-flex justify-content-between flex-md-row flex-sm-column my-4">
    <div class="left flex-grow-1">
        <h1>Fresh Arrivals Online</h1>
        <p>Discover Our Newest Collection Today.</p>
        <button class="btn btn-custom ">Shop Now <i class="fa fa-arrow-right"></i></button>
    </div>
    <div class="right d-flex justify-content-end justify-content-sm-center flex-grow-1">
        <img src="./assets/images/hero_right_image.png" width="440" alt="Hero illustration" />
    </div>
</header>
<main>
    <!-- Features Section -->
    <section class="features-section py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <!-- Free Shipping -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-item">
                        <div class="feature-icon mb-3">
                            <i class="fa fa-truck fa-2x"></i>
                        </div>
                        <h5 class="feature-title mb-3">Free Shipping</h5>
                        <p class="feature-text text-muted">Upgrade your style today and get FREE shipping on all orders! Don't miss out.</p>
                    </div>
                </div>

                <!-- Satisfaction Guarantee -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-item">
                        <div class="feature-icon mb-3">
                            <i class="fa fa-shield fa-2x"></i>
                        </div>
                        <h5 class="feature-title mb-3">Satisfaction Guarantee</h5>
                        <p class="feature-text text-muted">Shop confidently with our Satisfaction Guarantee. Love it or get a refund.</p>
                    </div>
                </div>

                <!-- Secure Payment -->
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon mb-3">
                            <i class="fa fa-lock fa-2x"></i>
                        </div>
                        <h5 class="feature-title mb-3">Secure Payment</h5>
                        <p class="feature-text text-muted">Your security is our priority. Your payments are secure with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Selling Section -->
    <section class="best-selling-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-muted text-uppercase mb-2" style="letter-spacing: 2px; font-size: 14px;">SHOP NOW</p>
                <h2 class="section-title mb-4" style="font-size: 32px; font-weight: 600;">Best Selling</h2>
            </div>

            <div class="row">
                <!-- Product 1: Classic Monochrome Tees -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card product-card h-100 border-0">
                        <div class="product-image-wrapper bg-light p-4 text-center">
                            <img src="./assets/images/black-tee.jpg" class="card-img-top" alt="Classic Monochrome Tees" style="max-height: 250px; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2" style="font-size: 16px;">Classic Monochrome Tees</h5>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <span class="badge bg-dark">IN STOCK</span>
                                <span class="price fw-bold">$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Monochromatic Wardrobe -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card product-card h-100 border-0">
                        <div class="product-image-wrapper bg-light p-4 text-center">
                            <img src="./assets/images/brown-tee.jpg" class="card-img-top" alt="Monochromatic Wardrobe" style="max-height: 250px; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2" style="font-size: 16px;">Monochromatic Wardrobe</h5>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <span class="badge bg-dark">IN STOCK</span>
                                <span class="price fw-bold">$27.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Essential Neutrals -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card product-card h-100 border-0">
                        <div class="product-image-wrapper bg-light p-4 text-center">
                            <img src="./assets/images/white-tee.jpg" class="card-img-top" alt="Essential Neutrals" style="max-height: 250px; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2" style="font-size: 16px;">Essential Neutrals</h5>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <span class="badge bg-dark">IN STOCK</span>
                                <span class="price fw-bold">$22.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 4: UTRAANET Black -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card product-card h-100 border-0">
                        <div class="product-image-wrapper bg-light p-4 text-center">
                            <img src="./assets/images/utraanet-black.jpg" class="card-img-top" alt="UTRAANET Black" style="max-height: 250px; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2" style="font-size: 16px;">UTRAANET Black</h5>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <span class="badge bg-dark">IN STOCK</span>
                                <span class="price fw-bold">$43.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fashion-paradise-section">
        <div class="fashion-container">
            <div class="fashion-content">
                <h2 class="fashion-title">Browse Our Fashion Paradise!</h2>
                <p class="fashion-description">
                    Step into a world of style and explore our diverse collection of clothing categories.
                </p>
                <button class="browse-btn">
                    Start Browsing
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </div>
            <div class="fashion-image">
                <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=500" alt="Fashion Poncho">
            </div>
        </div>
    </section>
    <!-- Featured and Latest Section -->
    <section class="featured-latest-section py-5">
        <div class="container">
            <div class="d-flex justify-content-center mt-4 mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-featured-tab" data-bs-toggle="pill" data-bs-target="#pills-featured" type="button" role="tab" aria-controls="pills-featured" aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
                    </li>

                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-featured" role="tabpanel" aria-labelledby="pills-featured-tab" tabindex="0">
                    <div class="row">
                        <!-- Product 1: Elegant Ebony Sweatshirts -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/black-sweatshirt.jpg" class="card-img-top" alt="Elegant Ebony Sweatshirts" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">Elegant Ebony Sweatshirts</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2: Sleek and Cozy Black -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/black-hoodie.jpg" class="card-img-top" alt="Sleek and Cozy Black" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">Sleek and Cozy Black</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$57.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3: Raw Black Tees -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/raw-black-tee.jpg" class="card-img-top" alt="Raw Black Tees" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">Raw Black Tees</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$19.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4: MOCKUP Black -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/mockup-black.jpg" class="card-img-top" alt="MOCKUP Black" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">MOCKUP Black</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$30.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab" tabindex="0">
                    <div class="row">
                        <!-- Product 1: Elegant Ebony Sweatshirts -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/black-sweatshirt.jpg" class="card-img-top" alt="Elegant Ebony Sweatshirts" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">Elegant Ebony Sweatshirts</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2: Sleek and Cozy Black -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/black-hoodie.jpg" class="card-img-top" alt="Sleek and Cozy Black" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">Sleek and Cozy Black</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$57.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3: Raw Black Tees -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/raw-black-tee.jpg" class="card-img-top" alt="Raw Black Tees" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">Raw Black Tees</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$19.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4: MOCKUP Black -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card product-card h-100 border-0">
                                <div class="product-image-wrapper bg-light p-4 text-center">
                                    <img src="./assets/images/mockup-black.jpg" class="card-img-top" alt="MOCKUP Black" style="max-height: 250px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2" style="font-size: 16px;">MOCKUP Black</h5>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <span class="badge bg-dark">IN STOCK</span>
                                        <span class="price fw-bold">$30.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="newsletter-title mb-3" style="font-size: 32px; font-weight: 700;">Join Our Newsletter</h2>
                    <p class="newsletter-description text-muted" style="font-size: 16px;">
                        We love to surprise our subscribers with occasional gifts.
                    </p>
                </div>
                <div class="col-md-6">
                    <form class="newsletter-form d-flex gap-2">
                        <input
                            type="email"
                            class="form-control newsletter-input"
                            placeholder="Your email address"
                            style="padding: 14px 20px; border: 1px solid #dee2e6; border-radius: 4px;">
                        <button
                            type="submit"
                            class="btn btn-dark newsletter-btn px-4"
                            style="white-space: nowrap; padding: 14px 28px; font-weight: 500;">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('includes/footer.php'); ?>


<script src="./assets/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
</body>

</html>