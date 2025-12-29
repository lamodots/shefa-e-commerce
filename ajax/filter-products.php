<?php
require_once '../config/database.php';
require_once '../includes/common_functions.php';

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['categories'])) {
    echo '<p class="empty-state">Please select a category</p>';
    exit;
}

$ids = implode(',', array_map('intval', $data['categories']));
$query = "SELECT * FROM products WHERE category_id IN ($ids)";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) === 0) {
    echo '<p class="empty-state">No products found</p>';
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <a href='/products/{$row['product_slug']}' class='product-card'>
        <div class='product-image'>
            <img src='{$row['product_image1']}' alt='{$row['product_title']}'>
        </div>
        <div class='product-info'>
            <h3>{$row['product_title']}</h3>
            <span class='product-price'>" . format_price($row['product_price']) . "</span>
        </div>
    </a>";
}
