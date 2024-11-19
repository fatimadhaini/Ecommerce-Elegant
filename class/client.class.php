<?php
require_once('DAL.class.php');


class client extends DAL{


public function getuser($name){
    $sql="SELECT * from `customers`where customers_email='$name'";
    return $this->getdata($sql);

}
public function getrecentorders(){
  $sql = "
      SELECT *
      FROM orders
      JOIN customers ON customers.customers_id = orders.customers_id
      ORDER BY orders.dateorder DESC
      LIMIT 5
  ";
  return $this->getdata($sql);
}
public function getoutofstock(){
  $sql = "
      SELECT *
      FROM products
      WHERE quantity <= 0
  ";
  return $this->getdata($sql);
}

public function insert($email,$PASSWORD,$FIRSTNAME,$LASTNAME,$ADDRESS,$TELEPHONE)
{
  $sql="INSERT INTO `customers`( `customers_password`, `customers_first_name`, 
  `customers_last_name`, `customers_address`, `customers_email`, `customers_telephone`) 
   VALUES ('$PASSWORD','$FIRSTNAME','$LASTNAME','$ADDRESS','$email','$TELEPHONE')";
  $user=$this->execute($sql);
  return $user;
}
public function selectidclient($id)
{
  $sql=" SELECT * FROM `customers`  WHERE customers_id=$id";
  $user=$this->getdata($sql);
  return $user;
}
public function updateused($k,$id)
  {  $sql="UPDATE `couponcode` SET `used_by`='$k' WHERE `code_id`='$id';";
    $category=$this->execute($sql);
    return $category;
  }
  public function updatequantity($id,$quantity)
  {
    $sql=" UPDATE `products` SET `quantity`=(quantity-$quantity) WHERE `products_id`='$id';";
    $category=$this->execute($sql);
    return $category;

  }
  public function insertorderdetails($product_id,$price,$sub_total,$quantity,$name,$order_id)
  {
    $sql="INSERT INTO `orders_details`( `products_id`, `price`, `sub_total`,`name`, `orders_id`, `quantity`) 
    VALUES ('$product_id','$price','$sub_total','$name','$order_id','$quantity');";
    $user=$this->execute($sql);
    return $user;
  }
  
  public function insertorder($id,$country,$city,$zip,$address,$name,$email,$phone,$total,$dis,$shipping)
  {
    $sql="INSERT INTO `orders`( `customers_id`, `country`, `city`, `zipcode`,`address`,`dateorder`,`name`, `email`, `phone`,`total`,`status`,`discount`,`shipping`)
     VALUES ('$id','$country','$city','$zip','$address',current_timestamp(),'$name','$email','$phone','$total','In proggress','$dis','$shipping');";
    $user=$this->execute($sql);
    return $user;
  }

public function selectcodeid($id)
{
  $sql="SELECT * FROM `couponcode` where code_id='$id'";
  $client=$this->getdata($sql);
  return $client;
}
public function updatelimit($id,$limit )
{
  $sql=" UPDATE `couponcode` SET`limits`='$limit' WHERE `code_id`='$id'";
  $category=$this->execute($sql);
  return $category;
}
public function updatestatus($id,$s){
  $sql=" UPDATE `orders` SET `status`='$s' WHERE `orders_id`='$id'";
  $category=$this->execute($sql);
  return $category;
 
}
public function countorders(){
  $sql="SELECT COUNT(*) as total FROM `orders`  ";
  $client=$this->getdata($sql);
  return $client;
}
public function countcustomers(){
  $sql="SELECT COUNT(*) as total FROM `customers`";
  $client=$this->getdata($sql);
  return $client;
}
public function countproducts(){
  $sql="SELECT COUNT(*) as total FROM `products`";
  $client=$this->getdata($sql);
  return $client;

}
public function getcategories(){
$sql = "
    SELECT c.categories_name AS category, COUNT(p.products_id) AS product_count 
    FROM categories c
    LEFT JOIN products p ON c.categories_id = p.categories_id
    GROUP BY c.categories_name
";
$client=$this->getdata($sql);
  return $client;

}
public function getcontact(){
  $sql="SELECT * from contact";
  return $this->getdata($sql);
}
public function updatecontact($id,$address,$email,$phone,$website,$map){
  $sql="UPDATE `contact` SET `address`='$address',`email`='$email',`phone`='$phone',`website`='$website',`map`='$map' WHERE `contact_id`='$id';";
  $category=$this->execute($sql);
  return $category;
}
public function getusersbyusername($username) {
  $sql = "SELECT * FROM users WHERE username = '$username'";
  return $this->getdata($sql);
}
public function getmost(){
  $sql="SELECT 
    od.products_id,
    p.products_name,
    COUNT(od.products_id) AS product_count
FROM 
    orders_details od
JOIN 
    products p ON od.products_id = p.products_id
GROUP BY 
    od.products_id, p.products_name
ORDER BY 
    product_count DESC
LIMIT 4; ";
  $client=$this->getdata($sql);
  return $client;
}}
?>