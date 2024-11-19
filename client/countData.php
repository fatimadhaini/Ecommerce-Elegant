<?php
// Include necessary files and initialize classes
require('../class/categories.class.php');
$categories=new categories();

$sql ="SELECT count(*) FROM products";
$result =$categories->getdata($sql);
echo json_encode($result[0]);
?>