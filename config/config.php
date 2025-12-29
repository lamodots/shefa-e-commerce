<?php

// Currency
define('CURRENCY', '₦');
define('CURRENCY_CODE', 'NGN');
// Pagination
define('ITEMS_PER_PAGE', 12);
define('BASE_URL', '/shefa-e-commerce');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shafa_ecommerce');
define('DB_PORT', 3306);


function format_price($price) {
    return CURRENCY . number_format($price, 2);
}

// Helper Functions
function url($path = '') {
    return '/' . ltrim($path, '/');
}

?>