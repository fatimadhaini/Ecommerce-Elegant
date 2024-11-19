<?php

require("../class/users.class.php");
$users = new users();

if ($_POST) {
    // var_dump($_POST);exit;
   $username=$_POST['username'];
  $password=$_POST['password'];
  $user_type=$_POST['user_type'];
    // Check if the category already exists
    $existingUser = $users->getusersbyusername($username);

    if ($existingUser) {
        $response = array(
            'status' => 'error',
            'message' => 'User already exists'
        );
    } else {
        // Insert the category
        $result = $users->insertuser($username,$password,$user_type);
            $response = array(
                'status' => 'success',
                'message' => 'User added successfully'
            );
        } 
    

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
