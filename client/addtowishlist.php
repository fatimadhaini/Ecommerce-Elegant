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

if (!isset($_SESSION['wishlist'])) {
$_SESSION['wishlist'] = array();
}

if (!isset($_SESSION['wishlist'][$productId])) {
$_SESSION['wishlist'][$productId] = array(
'id' => $productId,
'name' => $productName,
'itemTotal' => $productPrice,
'itemprice' => $productPrice
);

$counts = count($_SESSION['wishlist']);
$response = array('status' => 'success', 'message' => 'Product added
to the wishlist.', 'wishlistCount' => $counts);
} else {
    // ok
    
$response = array('status' => 'error', 'message' => 'Product is already
in the wishlist.');
}
}
// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>