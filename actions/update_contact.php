<?php
require_once("../class/client.class.php");

$client = new client();
$id=$_POST['id'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email']; 
$website=$_POST['website'];
$map=$_POST['map'];
$row=$client->updatecontact($id,$address,$email,$phone,$website,$map);
    $response = array(
        'status' => 'success',
        'message' => 'Contact updated successfully.'
    );

echo json_encode($response);
?>