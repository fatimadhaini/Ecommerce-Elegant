<?php
require_once("../class/categories.class.php");
// This creates an instance of the categories class. It appears to be an object-oriented approach where an instance of the class is created to work with category-related functionality.
$categories = new categories();
if ($_POST) {
    $id = $_POST['cat_id'];
    $categ = $categories->delete_code($id);
    if ($categ == 0) {
        echo $categ;
     
    }
}


?>