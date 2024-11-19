<?php
require_once('DAL.class.php');


class categories extends DAL{

//     public function limit($i,$j){
//         $sql = "SELECT * FROM products LIMIT $i, $j";
// return $this->getdata($sql);
//     }
    public function getallproductsbycat($id){
        $sql="SELECT *FROM `products` INNER JOIN categories ON products.categories_id=categories.categories_id left join products_img ON products.products_id=products_img.products_id where products.categories_id='$id' group by products.products_id";
        return $this->getdata($sql);
    }
   function getallproducts(){
        $sql="SELECT *FROM `products` INNER JOIN categories ON products.categories_id=categories.categories_id left join products_img ON products.products_id=products_img.products_id  group by products.products_id ";
        return $this->getdata($sql);
 
    }
    function getallproductsbyprice($i){
        $sql="SELECT *FROM `products` INNER JOIN categories ON products.categories_id=categories.categories_id left join products_img ON products.products_id=products_img.products_id  group by products.products_id ORDER BY products_price $i ";
        return $this->getdata($sql);
 
    }
    public function getproductsbyid($id){
        $sql="SELECT * FROM `products` INNER JOIN categories ON products.categories_id=categories.categories_id where products.products_id='$id' group by products_id";
        return $this->getdata($sql);
    }
    public function getproductsimg($id){
        
        $sql="SELECT * FROM `products_img` where products_id=$id";
        return $this->getdata($sql);
    }
    public function getallcategories(){
        $sql="select * from categories";
        return $this->getdata($sql);
 
    }
    public function getcoupon(){
        $sql="SELECT * from couponcode";
        return $this->getdata($sql);
    }
    public function getcodebyname($name){
        $sql="SELECT * from couponcode where code_name='$name'";
        return $this->getdata($sql);
    }
    public function insertcode($name,$limits,$percentage,$expiry_date){
        $sql="insert into couponcode (code_name,limits,percentage,expiry_date) VALUES ('$name','$limits','$percentage','$expiry_date')";
        return $this->execute($sql);
    }
    public function delete_code($id){
        $sql= "DELETE FROM couponcode WHERE code_id='$id'";
        return $this->execute($sql);
    }
    public function getcategories($name){
        $sql="select * from categories where categories_name='$name'";
        return $this->getdata($sql);
 
    }
    public function insertcategories($name){

        $sql="insert into categories (categories_name) VALUES ('$name')";
        return $this->execute($sql);
      
    }
    public function deletecategories($id){
        $sql= "DELETE FROM categories WHERE categories_id='$id'";
        return $this->execute($sql);

      
    }
    public function updatecategories($id, $name){
        $sql="UPDATE categories SET categories_name='$name' WHERE categories_id=$id";
        return $this->execute($sql);
    }

public function categoryExists($name,$id){
    $sql="SELECT * FROM categories WHERE categories_name='$name' AND categories_id!= $id";
    return $this->getdata($sql);
}


public function selectcode($code){
$sql="SELECT * FROM `couponcode` where code_name='$code'";
$client=$this->getdata($sql);
return $client;
}
  // Function to get total count of products
  public function countProducts() {
    $query = "SELECT COUNT(*) FROM products";
    $result = $this->getdata($query);
    if ($result) {
        return $result; // Return the total count
    } else {
        return 0; // Return 0 if no products found
    }} 
    public function getFilteredProducts($minPrice, $maxPrice) {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    
        // Example SQL query; adjust as per your database schema
        $sql = "SELECT * FROM products WHERE products_price BETWEEN $minPrice AND $maxPrice";
        $stmt = $this->$conn->prepare($sql);
        $stmt->bindValue(':min_price', $minPrice, PDO::PARAM_INT);
        $stmt->bindValue(':max_price', $maxPrice, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    }