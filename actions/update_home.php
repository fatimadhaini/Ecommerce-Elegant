<?php
require_once("../class/home.class.php");

$home = new home();
// var_dump($_FILES);exit;
// array(7) {
//   ["id"]=>
//   string(1) "1"
//   ["s1_h4"]=>
//   string(14) "New collection"
//   ["s1_h2"]=>
//   string(19) "Cosmos Comfort Sofa"
//   ["s1_h2b"]=>
//   string(10) "Gold Award"
//   ["s2_h4"]=>
//   string(14) "New collection"
//   ["s2_h2"]=>
//   string(11) "Luxy Chairs"
//   ["s2_h2b"]=>
//   string(13) " Design Award"
// }

// Enable error reporting and display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $s1_h4 = $_POST['s1_h4'];
        $s1_h2 = $_POST['s1_h2'];
        $s1_h2b = $_POST['s1_h2b'];
        $s2_h4 = $_POST['s2_h4'];
        $s2_h2 = $_POST['s2_h2'];
        $s2_h2b = $_POST['s2_h2b'];
        $s1_img=$_FILES['s1_img'];
        $s2_img=$_FILES['s2_img'];
        if(!empty($s1_img['name'])&&!empty($s2_img['name']) ){
            // Update information
            $updated = $home->updatehome2($id,$s1_img,$s2_img,$s1_h4,$s1_h2,$s1_h2b,$s2_h4,$s2_h2,$s2_h2b);
            $response = array(
                'status' => 'success',
                'message' => 'Home updated successfully'
            );}
            else if(empty($s1_img['name'])&&empty($s2_img['name'])){
                              $updated=$home->updateh($id,$s1_h4,$s1_h2,$s1_h2b,$s2_h4,$s2_h2,$s2_h2b);
                            $response = array(
                                'status' => 'success',
                                'message' => 'Home updated successfully'
                            );
                        } 
            else if(!empty($s1_img['name'])&&empty($s2_img['name'])){
               
                        $updated=$home->updatehomes1($id,$s1_img,$s1_h4,$s1_h2,$s1_h2b,$s2_h4,$s2_h2,$s2_h2b);
                          $response = array(
                              'status' => 'success',
                              'message' => 'Product updated successfully'
                          );}
                      
            else if(empty($s1_img['name'])&&!empty($s2_img['name'])){
                        $updated=$home->updatehomes2($id,$s2_img,$s1_h4,$s1_h2,$s1_h2b,$s2_h4,$s2_h2,$s2_h2b);
                          $response = array(
                              'status' => 'success',
                              'message' => 'Product updated successfully'
                          );
                      }
       
               
                }
         else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to update product.'
                );
            }
        
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

?>
