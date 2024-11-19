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
    // var_dump($_POST);exit;
$current=$_POST['current'];
$new1=$_POST['new1'];
$new2=$_POST['new2'];
$id = $_POST['id'];
$userinfo=$user->getusersbyid($id);
// var_dump($userinfo);exit;
$old=$userinfo[0]['password'];
// var_dump($old);exit;
if(password_verify($current,$old)){
    // Check if the new passwords match
    if($new1===$new2){
        // Hash the new password
        $new_password_hash = password_hash($new1, PASSWORD_DEFAULT);
        
        // Update the password in the database
        $updated = $user->updatepassword($id,$new_password_hash);
        $response = array(
           'status' =>'success',
           'message' => 'Password updated successfully'
        );
    }else{
        $response = array(
           'status' => 'error',
           'message' => 'New passwords do not match'
        );
    }
   
       
}
else{
    $response = array(
       'status' => 'error',
       'message' => 'Incorrect current password'
    );
}
}
        
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

?>
