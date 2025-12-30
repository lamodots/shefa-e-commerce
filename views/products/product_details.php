<?php require_once './config/config.php' ?>
<?php include('./config/database.php'); ?>
<?php include('includes/common_functions.php'); ?>
<?php include('includes/header.php'); ?>

<?php
// Get product slug from URL
$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$product_slug = end($segments);
$product_slug = htmlspecialchars($product_slug);

// Fetch product from database
$query = "SELECT * FROM products WHERE product_slug = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $product_slug);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {
    http_response_code(404);
    echo '<div class="container mt-5">
            <h1>Product Not Found</h1>
            <p>The product you are looking for does not exist.</p>
            <a href="/products" class="btn btn-primary">Back to Products</a>
          </div>';
    include('includes/footer.php');
    exit;
}

$product = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Fetch reviews (mock data - replace with actual query)
$reviews = [
    ['name' => 'Corey Davis', 'date' => '2 days ago', 'rating' => 4.5, 'comment' => 'This company always gets above and beyond to satisfy their customers.'],
    ['name' => 'Daniel Smith', 'date' => '1 month ago', 'rating' => 4, 'comment' => 'I got it looking nice affordable and high quality, this item is!'],
    ['name' => 'Benjamin Clark', 'date' => '13 years', 'rating' => 4, 'comment' => 'It was quite close their size, and it seems to fitted products.']
];
?>



<script>
    document.title = "<?php echo htmlspecialchars($product['product_title']); ?> - Shefa Ecommerce";
</script>

<?php include('includes/navbar.php'); ?>

<!-- Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Shefa</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active"><?php echo htmlspecialchars($product['product_title']); ?></li>
            </ol>
        </nav>
    </div>
</div>

<div class="product-detail-container">
    <!-- Product Detail -->
    <div class="product-detail-wrapper">
        <div class="product-images">
        <div id="productCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <?php
                // Collect all available images
                $images = [];
                if (!empty($product['product_image1'])) {
                    $images[] = $product['product_image1'];
                }
                if (!empty($product['product_image2'])) {
                    $images[] = $product['product_image2'];
                }
                if (!empty($product['product_image3'])) {
                    $images[] = $product['product_image3'];
                }
                
                // Display carousel items
                foreach ($images as $index => $image):
                    $activeClass = $index === 0 ? 'active' : '';
                ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                    <img src="<?php echo htmlspecialchars($image); ?>" 
                         alt="<?php echo htmlspecialchars($product['product_title']); ?>" 
                         class="main-image d-block w-100">
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Carousel Controls -->
            <?php if (count($images) > 1): ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
            <!-- Carousel Indicators (Dots) -->
            <div class="carousel-indicators">
                <?php foreach ($images as $index => $image): ?>
                <button type="button" 
                        data-bs-target="#productCarousel" 
                        data-bs-slide-to="<?php echo $index; ?>" 
                        class="<?php echo $index === 0 ? 'active' : ''; ?>" 
                        aria-label="Slide <?php echo $index + 1; ?>">
                </button>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
        <!-- <div class="product-images">
            <img src="<?php echo htmlspecialchars($product['product_image1']); ?>" alt="<?php echo htmlspecialchars($product['product_title']); ?>" class="main-image">
           
        </div> -->

        <div class="product-info">
            <h1><?php echo htmlspecialchars($product['product_title']); ?></h1>

            <div class="product-meta-top">
                <div class="rating">
                    ★★★★☆ 4.2—50 Reviews
                </div>
                <span>IN STOCK</span>
            </div>

            <div class="product-price">
                <?php echo format_price($product['product_price']); ?>
            </div>

            <!-- Color Selection -->
            <div class="color-selection">
                <h4>Available Colors</h4>
                <div class="color-options">
                    <div class="color-option active" style="background: #87CEEB;"></div>
                    <div class="color-option" style="background: #333;"></div>
                    <div class="color-option" style="background: #FFD700;"></div>
                </div>
            </div>

            <!-- Size Selection -->
            <div class="size-selection">
                <h4>Select Size</h4>
                <div class="size-options">
                    <button class="size-option active">S</button>
                    <button class="size-option">M</button>
                    <button class="size-option">L</button>
                    <button class="size-option">XL</button>
                    <button class="size-option">XXL</button>
                </div>
            </div>

            <!-- Quantity -->
            <div class="quantity-section">
                <h4>Quantity</h4>
                <div class="quantity-controls">
                    <button type="button" onclick="decrementQty()">-</button>
                    <input type="number" id="quantity" value="1" min="1" readonly>
                    <button type="button" onclick="incrementQty()">+</button>
                </div>
            </div>

            <!-- Actions -->
            <div class="product-actions">
                <button class="btn-add-cart">ADD TO CART</button>
                <button class="btn-wishlist">♡</button>
            </div>

            <div class="shipping-info">
                — FREE SHIPPING ON ORDERS $100+
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="product-tabs-section">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- Details Tab -->
            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                <div class="details-content">
                    <?php echo nl2br(htmlspecialchars($product['product_description'])); ?>
                </div>
            </div>

            <!-- Reviews Tab -->
            <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                <div class="reviews-header">
                    <div class="reviews-summary">
                        <div class="reviews-score">4.2</div>
                        <div>
                            <div class="review-rating">★★★★☆</div>
                            <div class="reviews-count">50 Reviews</div>
                        </div>
                    </div>
                    <button class="btn-write-review" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Write a review</button>
                </div>
                <!--  Review Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-4">
                                <form>
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="full-name" class="col-form-label">Full name</label>
                                        <input type="text" class="form-control" id="full-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                                <div class="ratings">
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <i class="fa-solid fa-star star-rating"></i>
                                </div>
                            </div>
                            <div class="review-footer">
                                <button type="button" class="btn  btn-lg ">Submit Your Review</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="reviews-list">
                    <?php foreach ($reviews as $review): ?>
                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar"><?php echo substr($review['name'], 0, 2); ?></div>
                                    <div>
                                        <div class="reviewer-name"><?php echo htmlspecialchars($review['name']); ?></div>
                                        <div class="review-date">Posted <?php echo htmlspecialchars($review['date']); ?></div>
                                    </div>
                                </div>
                                <div class="review-rating">
                                    <?php
                                    $fullStars = floor($review['rating']);
                                    for ($i = 0; $i < $fullStars; $i++) echo '★';
                                    if ($review['rating'] - $fullStars > 0) echo '☆';
                                    for ($i = ceil($review['rating']); $i < 5; $i++) echo '☆';
                                    ?>
                                </div>
                            </div>
                            <div class="review-text">
                                <?php echo htmlspecialchars($review['comment']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <button class="btn-load-more">Load more reviews</button>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="related-products">
        <h2>You might also like</h2>
        <p style="color: #666; margin-bottom: 30px;">SIMILAR PRODUCTS</p>

        <div class="products-grid">
            <?php getRelatedProducts($product['category'], $product['product_id']); ?>

        </div>
    </div>
</div>

<script>
    function incrementQty() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    // Size selection
    document.querySelectorAll('.size-option').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.size-option').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Color selection
    document.querySelectorAll('.color-option').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.color-option').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
<script src="/assets/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
<?php include('includes/footer.php'); ?>
</body>

</html>