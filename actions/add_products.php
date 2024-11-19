<?php

require("../class/products.class.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername,$username, $password, $dbname);
$products = new products();

if ($_POST) {
    //  var_dump($_POST);exit;
    $name = $_POST['products_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categories_id =$_POST['categories_id'];
    $quantity=$_POST['quantity'];
    //  var_dump($categories_id);exit;

    $images = $_FILES['images'];
    $prod = $products->getproducts($name);
    $result = $prod;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of the product already exists'
        );
    } else {
        $product = $products->insertproducts($name, $description, $categories_id, $price,$quantity);

        // Iterate through each uploaded image
        foreach ($images['name'] as $k => $value) {
            // Check if the file has a valid extension
            $validExtensions = array("jpg", "jpeg", "png");
            $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));

            if (in_array($extension, $validExtensions)) {
                // Move the file and insert into the database
                $image_name = $products->movemultiplefiles($images, $k);
                $image = $products->insertimage($image_name, $product);

                $response = array(
                    'status' => 'success',
                    'message' => 'Product added successfully'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid file type. Please upload only images with .jpg, .jpeg, or .png extensions.'
                );
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>