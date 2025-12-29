<?php
// Get the requested URI
$request = $_SERVER['REQUEST_URI'];
$request = str_replace('/shefa-e-commerce/', '', $request);
$request = trim($request, '/');

// Separate path from query string
$path = parse_url($request, PHP_URL_PATH);
$path = $path ? trim($path, '/') : '';
$segments = explode('/', $path);

// Route handling
// Check for single product page: /products/{slug}
if ($segments[0] === 'products' && isset($segments[1]) && !empty($segments[1])) {
    include('views/products/product_details.php');
} else {
    switch ($path) {
        case '':
        case 'index.php':
            include('views/home/index.php');
            break;
        case 'home':
            include('views/home/index.php');
            break;
        case 'register':
            include('views/register/index.php');
            break;
        case 'login':
            include('views/login/index.php');
            break;
        case 'logout':
            include('views/logout/index.php');
            break;
        case 'products':
            include('views/products/index.php');
            break;
        case 'orders':
            include('views/orders/index.php');
            break;
        case 'my-account':
            include('views/account/index.php');
            break;
        default:
            http_response_code(404);
            echo "404 - Page Not Found";
            break;
    }
}
?>