<?php
session_start();
require_once("../class/users.class.php");

$user = new users();
//  var_dump($_POST);exit;

// Enable error reporting and display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username=$_POST['username'];
$image=$_FILES['image'];
$id = $_POST['id'];
       
        if(!empty($image['name'])){
            // Update information
            $updated = $user->updateprofile($id,$username,$image);
            $_SESSION['username']=$username;
            $response['status'] = 'success';
            $response['message'] = 'Profile updated successfully!';
        }
           
            else if(empty($image['name'])){
                        $updated=$user->updateprofile2($id,$username);
                        $_SESSION['username']=$username;
                        $response['status'] = 'success';
                        $response['message'] = 'Username updated successfully!';
                    
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
