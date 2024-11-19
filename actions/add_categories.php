<?php

require("../class/categories.class.php");
$categories = new Categories();

if ($_POST) {
    $name = $_POST['categories_name'];
    
    // Check if the category already exists
    $existingCategory = $categories->getcategories($name);

    if ($existingCategory) {
        $response = array(
            'status' => 'error',
            'message' => 'Category already exists'
        );
    } else {
        // Insert the category
        $result = $categories->insertcategories($name);
            $response = array(
                'status' => 'success',
                'message' => 'Category added successfully'
            );
        } 
    

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
