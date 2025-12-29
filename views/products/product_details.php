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
?>

<script>
    document.title = "<?php echo htmlspecialchars($product['product_title']); ?> - Shefa Ecommerce";
</script>

<?php include('includes/navbar.php'); ?>

<!-- Breadcrumb -->
<div class="breadcrumb-section">
    <div class="main-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active"><?php echo htmlspecialchars($product['product_title']); ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Product Details -->
<div class="main-container">
    <div class="product-detail-wrapper">
        <div class="product-images">
            <img src="<?php echo htmlspecialchars($product['product_image1']); ?>" alt="<?php echo htmlspecialchars($product['product_title']); ?>" class="main-image">
        </div>
        
        <div class="product-details">
            <h1><?php echo htmlspecialchars($product['product_title']); ?></h1>
            <div class="product-price">
                <?php echo format_price($product['product_price']); ?>
            </div>
            
            <div class="product-description">
                <h3>Description</h3>
                <p><?php echo nl2br(htmlspecialchars($product['product_description'] ?? 'No description available.')); ?></p>
            </div>
            
            <div class="product-actions">
                <form method="POST" action="/cart/add">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
            
            <div class="product-meta">
                <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category'] ?? 'N/A'); ?></p>
                <p><strong>Stock:</strong> <span class="stock-badge">IN STOCK</span></p>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="./assets/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
</body>
</html>