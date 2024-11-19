<?php
require("../class/products.class.php");
// This creates an instance of the categories class. It appears to be an object-oriented approach where an instance of the class is created to work with category-related functionality.
$products = new products();
if ($_POST) {
    $id = $_POST['pro_id'];
    $pro = $products->deleteProducts($id);
    if ($pro == 0) {
        echo $pro;
     
    }
}


?>