<?php
// actions/image_delete.php

// Assuming you have a Products class instance already created
require('../class/products.class.php');
$products = new Products();

// Check if the request method is POST and if image_id is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_id'])) {
    $image_id = $_POST['image_id'];

    // Attempt to delete the image using the deleteImage method from Products class
    $success = $products->deleteImage($image_id);
// var_dump($success);exit;
    if ($success === 0) {
        // Success response
        echo json_encode(array('status' => 'success'));
    } else {
        // Error response
        echo json_encode(array('status' => 'error'));
    }
} else {
    // Handle invalid request
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
}
?>
