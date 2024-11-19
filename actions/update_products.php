<?php
require_once("../class/products.class.php");

$products = new products();

// Enable error reporting and display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id = $_POST['id'];
        $name = $_POST['products_name'];
        $description = $_POST['description'];
        $categories = $_POST['categories_id'];
        $price = $_POST['price'];
        $images = $_FILES['images'];
        $quantity=$_POST['quantity'];

        // Check if product name already exists
        $existingProduct = $products->getproductss($name, $id);
        if ($existingProduct) {
            $response = array(
                'status' => 'error',
                'message' => 'The name of the product already exists'
            );
        } else {
            // Update product information
            $updated = $products->updateproducts($id, $name, $price, $categories, $description,$quantity);

            if ($updated !== false) {
                // Check if any images were uploaded
                if (!empty($images['name'][0])) {
                    $uploadDir = "../assets/img/";

                    // Iterate through each uploaded image
                    foreach ($images['name'] as $k => $imageName) {
                        $fileTmpName = $images['tmp_name'][$k];
                        $fileSize = $images['size'][$k];
                        $fileError = $images['error'][$k];

                        // Validate file extension
                        $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                        $validExtensions = array("jpg", "jpeg", "png");

                        if (in_array($fileExtension, $validExtensions)) {
                            // Generate unique filename
                            $uniqueFilename = uniqid() . '_' . $imageName;
                            $uploadedFilePath = $uploadDir . $imageName;

                            // Move uploaded file to desired directory
                            if (move_uploaded_file($fileTmpName, $uploadedFilePath)) {
                                // Insert image details into database
                                $imageInserted = $products->insertimage($imageName, $id);
                                if (!$imageInserted) {
                                    $response = array(
                                        'status' => 'error',
                                        'message' => 'Failed to insert image into database.'
                                    );
                                    break; // Exit the loop if image insertion fails
                                }
                            } else {
                                $response = array(
                                    'status' => 'error',
                                    'message' => 'Failed to move uploaded file.'
                                );
                                break; // Exit the loop if file moving fails
                            }

                            $response = array(
                                'status' => 'success',
                                'message' => 'Product updated successfully'
                            );
                        } else {
                            $response = array(
                                'status' => 'error',
                                'message' => 'Invalid file type. Please upload only images with .jpg, .jpeg, or .png extensions.'
                            );
                        }
                    }
                } else {
                    // No images were uploaded, update product data only
                    $response = array(
                        'status' => 'success',
                        'message' => 'Product updated successfully'
                    );
                }
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to update product.'
                );
            }
        }
    } catch (Exception $e) {
        $response = array(
            'status' => 'error',
            'message' => 'Exception: ' . $e->getMessage()
        );
        // Log the exception for further investigation
        error_log('Exception: ' . $e->getMessage());
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
