<?php
session_start();

// Check if productId is provided
if (isset($_POST['productId'])) {
$productId = $_POST['productId'];

// Locate and remove the product_id from the session cart
if (isset($_SESSION['cart'][$productId])) {
unset($_SESSION['cart'][$productId]);

// Additional logic to handle success if needed
$response = array('status' => 'success', 'message' => 'Product
removed from cart.');
echo json_encode($response);
exit(); // Terminate the script after echoing the JSON response
}
}

$response = array('status' => 'error', 'message' => 'Invalid request or
product not found in cart.');
echo json_encode($response);
?>
<script>


function UpdateSessionCart(proId, quantity, subtotal) {
$.ajax({
cache: false,
type: 'POST',

url: 'updatesessioncart.php',
data: {
productId: proId,
quan: quantity,
total: subtotal

},
success: function(response) {
// updateCartCount();
console.log(response);
},
error: function(xhr, status, error) {
// Handle errors if needed
console.error(xhr.responseText);
}
});
}</script>