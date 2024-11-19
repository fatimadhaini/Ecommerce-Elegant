<?php
session_start();
include "../class/categories.class.php";

$CategoryClass = new categories();

$checked = isset($_GET['categories']) ? $_GET['categories'] : [];
$priceRange = isset($_GET['price_range']) ? $_GET['price_range'] : '';

// Initialize SQL query to fetch distinct products
$sql = "SELECT DISTINCT products.products_id, products.products_name, products.products_price ,products.quantity
        FROM products 
        JOIN categories ON products.categories_id = categories.categories_id
        JOIN products_img ON products.products_id = products_img.products_id 
        WHERE 1=1"; // Added WHERE 1=1 to make concatenation of conditions easier

// Apply filters based on selected categories
if (!empty($checked)) {
    $String = implode(',', array_map('intval', $checked));
    $sql .= " AND categories.categories_id IN ($String)";
}

// Apply sorting based on price range
if ($priceRange == "high-to-low") {
    $sql .= " ORDER BY products.products_price DESC";
} else if ($priceRange == "low-to-high") {
    $sql .= " ORDER BY products.products_price ASC";
}

// Count total records for pagination
$countSql = "SELECT COUNT(DISTINCT products.products_id) as total 
             FROM products 
             JOIN categories ON products.categories_id = categories.categories_id
             JOIN products_img ON products.products_id = products_img.products_id 
             WHERE 1=1"; // Added WHERE 1=1 to make concatenation of conditions easier

// Apply the same filters for counting
if (!empty($checked)) {
    $countSql .= " AND categories.categories_id IN ($String)";
}

// Execute the count query
$totalResult = $CategoryClass->getdata($countSql);
$totalPages = $totalResult[0]['total'] ?? 0;

// Set pagination variables
$perPage = 4;
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$startFrom = ($page - 1) * $perPage;

// Modify the main query with LIMIT for pagination
$sql .= " LIMIT $startFrom, $perPage";

// Fetch the products
$allProducts = $CategoryClass->getdata($sql);

// Get cart product IDs
$cartProductIds = isset($_SESSION['cart']) ? array_keys($_SESSION['cart']) : [];

// Initialize an array to store products with images
$products = [];
foreach ($allProducts as $product) {
    // Check if the product is already added
    if (!isset($products[$product['products_id']])) {
        // Retrieve all image URLs for the current product
        $imgUrls = $CategoryClass->getproductsimg($product['products_id']); // Assume this returns an array of image URLs
        
        // Build the product entry
        $products[$product['products_id']] = [
            'products_id' => $product['products_id'],
            'products_name' => $product['products_name'],
            'price' => $product['products_price'],
            'images' => $imgUrls, // $imgUrls should be an array of image URLs
            'in_cart' => in_array($product['products_id'], $cartProductIds),
            'quantity' =>$product['quantity'],
        ];
    }
}

// Prepare the response
$response = [
    'products' => array_values($products), // Convert associative array to indexed array
    'total_pages' => $totalPages
];

// Output JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
