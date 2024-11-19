<?php
session_start();
require('../class/products.class.php');
$client = new Products();
$response = array();
if ($_POST) {
    // var_dump($_POST);exit;
$productId = $_POST['pro_id'];
$product = $client->getProductById($productId);
//  var_dump($product);exit;

$productPrice = number_format($product[0]['products_price'], 2);

$productName = $product[0]['products_name'];

if (!isset($_SESSION['cart'])) {
$_SESSION['cart'] = array();
}

if (!isset($_SESSION['cart'][$productId])) {
$_SESSION['cart'][$productId] = array(
'id' => $productId,
'name' => $productName,
'quantity' => 1,
'itemTotal' => $productPrice,
'itemprice' => $productPrice
);

$counts = count($_SESSION['cart']);
$response = array('status' => 'success', 'message' => 'Product added
to the cart.', 'cartCount' => $counts);
} else if (isset($_POST['quantity'])) {
$newQuantity = $_POST['quantity'];

if (isset($_SESSION['cart'][$productId])) {
$_SESSION['cart'][$productId]['quantity'] = $newQuantity;
$_SESSION['cart'][$productId]['itemTotal'] = $newQuantity *
$productPrice;

$counts = count($_SESSION['cart']);

$response = array('status' => 'success', 'message' => 'Quantity
updated successfully', 'cartCount' => $counts);
} else {
$response = array('status' => 'error', 'message' => 'Product not
found in the cart');
}
} else {
    // ok
    
$response = array('status' => 'error', 'message' => 'Product is already
in the cart.');
}
}
// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>