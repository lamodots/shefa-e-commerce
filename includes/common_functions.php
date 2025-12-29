
<?php

function get_categories()
{
    global $con;
    $query = "SELECT * FROM `categories`";
    $result = mysqli_query($con, $query);

    $current_category = isset($_GET['category']) ? $_GET['category'] : '';

    while ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];

        $active_class = ($current_category === $category_title) ? 'active' : '';

        // Use BASE_URL constant instead of url() function
        echo "<div class='filter-option $active_class'>
                <a href='/products?category=$category_title' class='category-filter' data-id='$category_id'> 
                    " . ucfirst($category_title) . "  
                </a>
              </div>";
    }
}

// function getProducts()
// {
//     global $con;

//     // Check if category is selected
//     if (isset($_GET['category']) && !empty($_GET['category'])) {
//         $category = htmlspecialchars($_GET['category']); 

//         // Validate that the category exists
//         $check_query = "SELECT category_title FROM categories WHERE category_title = ?";
//         $stmt = mysqli_prepare($con, $check_query);
//         mysqli_stmt_bind_param($stmt, "s", $category);
//         mysqli_stmt_execute($stmt);
//         $check_result = mysqli_stmt_get_result($stmt);

//         if (mysqli_num_rows($check_result) === 0) {
//             echo '<div class="error-message">Invalid category selected.</div>';
//             return;
//         }
//         mysqli_stmt_close($stmt);

//         // Use prepared statement to prevent SQL injection
//         $query = "SELECT * FROM products WHERE category = ?";
//         $stmt = mysqli_prepare($con, $query);
//         mysqli_stmt_bind_param($stmt, "s", $category);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);

//     } else {
//         // No category selected → show random products
//         $query = "SELECT * FROM products ORDER BY RAND() LIMIT " . ITEMS_PER_PAGE;
//         $result = mysqli_query($con, $query);
//     }

//     if (!$result) {
//         echo '<div class="error-message">Unable to load products.</div>';
//         return;
//     }

//     if (mysqli_num_rows($result) === 0) {
//         echo '<div class="empty-state">
//                 <p>No products found for this category.</p>
//               </div>';
//         return;
//     }

//     while ($row = mysqli_fetch_assoc($result)) {
//         $product_id    = $row['product_id'];
//         $product_title = htmlspecialchars($row['product_title']);
//         $product_slug  = htmlspecialchars($row['product_slug']);
//         $product_price = $row['product_price'];
//         $product_image = htmlspecialchars($row['product_image1']);

//         echo "
//             <a href='/products/$product_slug' class='product-card'>
//                 <div class='product-image'>
//                     <img src='$product_image' alt='$product_title'>
//                 </div>
//                 <div class='product-info'>
//                     <h3 class='product-name'>$product_title</h3>
//                     <div class='product-meta'>
//                         <span class='stock-badge'>IN STOCK</span>
//                         <span class='product-price'>" . format_price($product_price) . "</span>
//                     </div>
//                 </div>
//             </a>";
//     }

//     if (isset($stmt)) {
//         mysqli_stmt_close($stmt);
//     }
// }

function getProducts()
{
    global $con;

    $category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : null;
    $sort = isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'random';

    $query = "SELECT * FROM products";
    $where_conditions = [];
    $params = [];
    $types = "";

    if ($category && !empty($category)) {
        $check_query = "SELECT category_title FROM categories WHERE category_title = ?";
        $stmt = mysqli_prepare($con, $check_query);
        mysqli_stmt_bind_param($stmt, "s", $category);
        mysqli_stmt_execute($stmt);
        $check_result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($check_result) === 0) {
            echo '<div class="error-message">Invalid category selected.</div>';
            return;
        }
        mysqli_stmt_close($stmt);

        $where_conditions[] = "category = ?";
        $params[] = $category;
        $types .= "s";
    }

    if (!empty($where_conditions)) {
        $query .= " WHERE " . implode(" AND ", $where_conditions);
    }

    switch ($sort) {
        case 'price_asc':
            $query .= " ORDER BY product_price ASC";
            break;
        case 'price_desc':
            $query .= " ORDER BY product_price DESC";
            break;
        case 'newest':
            $query .= " ORDER BY created_at DESC";
            break;
        case 'name_asc':
            $query .= " ORDER BY product_title ASC";
            break;
        case 'name_desc':
            $query .= " ORDER BY product_title DESC";
            break;
        case 'random':
        default:
            $query .= " ORDER BY RAND()";
            break;
    }

    $query .= " LIMIT " . ITEMS_PER_PAGE;

    if (!empty($params)) {
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        $result = mysqli_query($con, $query);
    }

    if (!$result) {
        echo '<div class="error-message">Unable to load products.</div>';
        return;
    }

    if (mysqli_num_rows($result) === 0) {
        echo '<div class="empty-state">
                <i class="fas fa-box-open"></i>
                <p>No products found' . ($category ? ' for this category' : '') . '.</p>
              </div>';
        return;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id    = $row['product_id'];
        $product_title = htmlspecialchars($row['product_title']);
        $product_slug  = htmlspecialchars($row['product_slug']);
        $product_price = $row['product_price'];
        $product_image = htmlspecialchars($row['product_image1']);

        // Use BASE_URL constant
        echo "
            <a href='/products/$product_slug' class='product-card'>
                <div class='product-image'>
                    <img src='$product_image' alt='$product_title' loading='lazy'>
                </div>
                <div class='product-info'>
                    <h3 class='product-name'>$product_title</h3>
                    <div class='product-meta'>
                        <span class='stock-badge'>IN STOCK</span>
                        <span class='product-price'>" . format_price($product_price) . "</span>
                    </div>
                </div>
            </a>";
    }

    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }
}

function getProductCount()
{
    global $con;

    $category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : null;

    if ($category) {
        $query = "SELECT COUNT(*) as total FROM products WHERE category = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $category);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        $query = "SELECT COUNT(*) as total FROM products";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}
?>

