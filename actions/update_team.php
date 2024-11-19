<?php
require_once("../class/home.class.php");
$team = new home();
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
// var_dump($_FILES);exit;
        $id = $_POST['id'];
        $name=$_POST['1name'];
        $des=$_POST['1des'];
        $img=$_FILES['1photo'];
        if(!empty($img['name']) ){
            // Update information
            $updated = $team->updateteam1($id,$name,$des,$img);
            $response = array(
                'status' => 'success',
                'message' => 'Team updated successfully'
            );}
            else if(empty($img['name'])){
                              $updated=$about->updateteam($id,$title,$paragraph);
                            $response = array(
                                'status' => 'success',
                                'message' => 'Team updated successfully'
                            );
                        } 
          
                }
         else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to update.'
                );
            }
        
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

?>
