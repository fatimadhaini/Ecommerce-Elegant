<?php
require_once('DAL.class.php');

class Products extends DAL {

    public function get($idproducts){
        $sql = "SELECT * FROM `products` WHERE products_id IN ($idproducts)";
        return $this->getdata($sql);
    }
    public function getProductQuantity($id){
        $sql="SELECT quantity FROM `products` WHERE products_id=$id";
        return $this->getdata($sql);
       
      }
      
  public function getq($id){
    $sql="SELECT quantity from `products` where products_id=$id" ;
return $this->getdata($sql); }
    public function getids(){
        $sql="SELECT products_id FROM `products`";
        return $this->getdata($sql);
    }
    
        public function selectimage($id)
{
$sql=" SELECT * FROM `products_img` WHERE products_id='$id';";
$product=$this->getdata($sql);
return $product;
}
    public function getallproducts(){
        $sql="SELECT *FROM `products` INNER JOIN categories ON products.categories_id=categories.categories_id left join products_img ON products.products_id=products_img.products_id group by products.products_id";
        return $this->getdata($sql);
 
    }
    public function gettrending(){
        $sql="SELECT * from trending";
        return $this->getdata($sql);
 
    }
    public function getproducts($id){
        $sql="SELECT *FROM `products` INNER JOIN categories ON products.categories_id=categories.categories_id where products.products_id='$id' group by products_id";
        return $this->getdata($sql);
 
    }

    public function getproduct($name){
        $sql="select * from products where products_name='$name'";
        return $this->getdata($sql);
 
    }
    public function getproductss($name,$id){
        $sql="select * from products where products_name='$name' and products_id!='$id'";
        return $this->getdata($sql);
 
    }

    /**
     * Inserts a new product into the database.
     *
     * @param string $name The name of the product.
     * @param float $price The price of the product.
     * @param int $categories_id The ID of the category the product belongs to.
     * @param string $description The description of the product.
     * @param array $image Array containing uploaded file details ($_FILES array).
     * @return int|null Returns the ID of the newly inserted product or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function insertproducts($name,$description,$categories,$price,$q){

        $sql="insert into products (products_name,description,categories_id,products_price,quantity) VALUES ('$name','$description','$categories','$price','$q')";
        return $this->execute($sql);
      
    }
     
    /**
     * Inserts a product image into the database.
     *
     * @param int $products_id The ID of the product.
     * @param string $url The URL of the product image.
     * @return int|null Returns the ID of the newly inserted image or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */

    public function insertimage($image_name, $product){

        $sql="insert into products_img (url,products_id) VALUES ('$image_name','$product')";
        return $this->execute($sql);
      
    }
    public function getimages($id)
    {
        $sql="select * from products_img where products_id='$id'";
        return $this->getdata($sql);
    }

    /**
     * Deletes a product from the database.
     *
     * @param int $id The ID of the product to delete.
     * @return int|null Returns the number of affected rows or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function deleteProducts($id) {
        $sql = "DELETE FROM products WHERE products_id = '$id'";
        return $this->execute($sql);
    }

    /**
     * Updates a product in the database.
     *
     * @param int $id The ID of the product to update.
     * @param string $name The updated name of the product.
     * @param float $price The updated price of the product.
     * @param int $categories_id The updated ID of the category the product belongs to.
     * @param string $description The updated description of the product.
     * @return int|null Returns the number of affected rows or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function updateProducts($id, $name, $price, $categories_id, $description,$quantity) {
        $sql = "UPDATE products
         SET products_name = '$name', products_price = '$price', 
         categories_id = '$categories_id', description = '$description'
         ,quantity='$quantity' WHERE products_id = '$id'";
        // var_dump($sql);exit;
        return $this->execute($sql);
    }

    /**
     * Retrieves products belonging to a specific category.
     *
     * @param int $categories_id The ID of the category.
     * @return array|null Array of products belonging to the category or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function getProductsByCategory($categories_id) {
        $sql = "SELECT * FROM products WHERE categories_id = '$categories_id'";
        return $this->getdata($sql);
    }

    /**
     * Retrieves a product by its ID.
     *
     * @param int $id The ID of the product.
     * @return array|null Array representing the product or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE products_id = '$id'";
        return $this->getdata($sql);
    }

    /**
     * Retrieves all categories from the database.
     *
     * @return array|null Array of categories or null on failure.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function getCategories() {
        $sql = "SELECT * FROM categories";
        return $this->getdata($sql);
    }

    /**
     * Checks if a product with the given name already exists, excluding a specific ID.
     *
     * @param string $name The name of the product to check.
     * @param int $id The ID of the product to exclude from the check.
     * @return array|null Array representing the existing product or null if not found.
     * @throws Exception Throws an exception on database connection or query failure.
     */
    public function productExists($name, $id) {
        $sql = "SELECT * FROM products WHERE products_name = '$name' AND products_id != '$id'";
        return $this->getdata($sql);
    }
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "ecommerce";

    public function deleteImage($image_id) {
        try {
            // Fetch the image information from the database
            $sql = "SELECT * FROM products_img WHERE products_img_id = $image_id";
            $row = $this->getdata($sql);
            // var_dump($row);exit;
            if ($row) {
                // Get the image URL from the row
                $image_url =$row[0]['url'];

                // Delete the image file from the folder
                $file_path = 'assets/img/' . $image_url; // Adjust the path as per your folder structure
                if (file_exists($file_path)) {
                    unlink($file_path); // Delete the file
                }
                $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
                // Delete the image record from the database
                $delete_sql = "DELETE FROM products_img WHERE products_img_id = $image_id";
                if ($conn->query($delete_sql) === TRUE) {
                    return 0; // Deletion successful
                } else {
                    return 1; // Database deletion failed
                }
                $conn->close();
            } 
        } catch (PDOException $e) {
            // Handle database errors
            error_log('Error deleting image: ' . $e->getMessage());
            return 1; // Deletion failed
        }
    }
}

        


?>
