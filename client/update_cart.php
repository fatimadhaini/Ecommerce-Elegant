<?php
session_start();

// Example: Retrieve product ID, name, image, price, and quantity from Ajax request
$productId = $_POST['productId']; // Example: Sanitize and validate input
$productName = $_POST['productName']; // Example: Sanitize and validate input
$productImage = $_POST['productImage']; // Example: Sanitize and validate input
$productPrice = $_POST['productPrice']; // Example: Sanitize and validate input
$quantity = $_POST['quantity']; // Example: Sanitize and validate input

// Simulate adding item to cart (replace with actual logic)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if the product is already in cart
if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId] += $quantity; // Increment quantity if already in cart
} else {
    $_SESSION['cart'][$productId] = $quantity; // Add new product to cart
}

// Function to calculate total price
function calculateTotalPrice($cart) {
    $totalPrice = 0;
    foreach ($cart as $productId => $quantity) {
        // Replace with actual price retrieval logic based on $productId
        // Example: $price = getProductPrice($productId);
        // Example: $totalPrice += $price * $quantity;
        // For demonstration, we assume a fixed price
        $price = $productPrice; // Use the price passed from AJAX request
        $totalPrice += $price * $quantity;
    }
    return $totalPrice;
}

// Calculate total price
$totalPrice = calculateTotalPrice($_SESSION['cart']);

// Generate HTML for table rows based on session cart
$html = '';
foreach ($_SESSION['cart'] as $productId => $quantity) {
    // For demonstration, we use the data passed from AJAX request
    $productName = $_POST['productName'];
    $productImage = $_POST['productImage'];
    $productPrice = $_POST['productPrice'];

    $productTotal = $productPrice * $quantity;

    // Generate HTML for each cart item row
    $html .= '
        <tr>
            <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
            <td class="product_thumb"><a href="' . $productImage . '"><img src="' . $productImage . '" alt=""></a></td>
            <td class="product_name"><a href="#">' . $productName . '</a></td>
            <td class="product-price">$' . number_format($productPrice, 2) . '</td>
            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="' . $quantity . '" type="number"></td>
            <td class="product_total">$' . number_format($productTotal, 2) . '</td>
        </tr>';
}

// Echo out the generated HTML
echo $html;
?>
