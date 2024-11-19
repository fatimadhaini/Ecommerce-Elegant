<?php
require_once("../class/categories.class.php");

$categories = new categories();

$id=$_POST['id'];
$name=$_POST['categories'];
if ($categories->categoryExists($name,$id)) {
    $response = array(
        'status' => 'error',
        'message' => 'Category already exists. Please choose a different category.'
    );
} else {

    $categories->updatecategories($id,$name);
   
    $response = array(
        'status' => 'success',
        'message' => 'Category updated successfully.'
    );
}
// $response = array(...): This line creates a variable named $response and assigns it an associative array.

// array(...) is the syntax for creating an array in PHP. In this case, it's an associative array where each element is a key-value pair.

// 'status' => 'success': This is an element of the array where 'status' is the key and 'success' is the value. This suggests that the operation being referred to (likely an update operation in this case) was successful.

// 'message' => 'Category updated successfully.': This is another element of the array where 'message' is the key and 'Category updated successfully.' is the value. This provides a human-readable message to convey that the category was updated successfully.

// This type of array structure is commonly used in PHP (and many other programming languages) to organize and represent data. In this specific case, it's often used to prepare a structured response that can be easily converted to JSON and sent back to the client (e.g., in an AJAX response) for processing. JSON is a widely used data interchange format, and PHP's json_encode() function can be used to convert an associative array like this into a JSON string.

echo json_encode($response);
?>