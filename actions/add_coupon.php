<?php

require("../class/categories.class.php");
$categories = new Categories();

if ($_POST) {
    $name = $_POST['code_name'];
    $limits=$_POST['limits'];
    $expiry_date = $_POST['expiry_date'];
    $percentage=$_POST['percentage'];
    
    // Check if the category already exists
    $existingCategory = $categories->getcodebyname($name);

    if ($existingCategory) {
        $response = array(
            'status' => 'error',
            'message' => 'Coupon code already exists'
        );
    } else {
        // Insert the category
        $result = $categories->insertcode($name,$limits,$percentage,$expiry_date);
            $response = array(
                'status' => 'success',
                'message' => 'Coupon code added successfully'
            );
        } 
    

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
