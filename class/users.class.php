<?php
require_once('DAL.class.php');


class users extends DAL{
    // Inside users.class.php

public function getusersbyusername($username) {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    return $this->getdata($sql);
}
public function getusersbyusernameid($username,$id) {
    $sql = "SELECT * FROM users WHERE username = '$username' and users_id=$id";
    return $this->getdata($sql);
}
public function getusersbyid($id) {
    $sql = "SELECT * FROM users WHERE users_id=$id";
    return $this->getdata($sql);
}

public function updatepassword($id,$p){
   
    $sql="UPDATE `users` SET `password`='$p' WHERE users_id=$id";
    return $this->execute($sql);
}
public function getusers(){
    $sql="SELECT * FROM users";
    return $this->getdata($sql);
}
public function updateprofile($id,$username,$image){
    $i = $this->moveSingleFile($image); // Move and get the file name
    $sql="UPDATE `users` SET `username`='$username',`image`='$i' WHERE users_id=$id";
    return $this->execute($sql);
}
public function updateprofile2($id,$username){
    $sql="UPDATE `users` SET `username`='$username' WHERE users_id=$id";
    return $this->execute($sql);
}

public function getuser($id){
    $sql="SELECT * FROM users WHERE users_id=$id";
    return $this->getdata($sql);
}

public function insertuser($name,$password,$user_type){
    $hashedpass=password_hash($password,PASSWORD_DEFAULT);
    // var_dump($hashedpass);exit;
    $sql="INSERT INTO `users`(`username`, `password`, `user_type`) VALUES ('$name','$hashedpass','$user_type')";
    return $this->execute($sql);
}
public function deleteusers($id){
    $sql= "DELETE FROM users WHERE users_id=$id";
    return $this->execute($sql);
}
public function updateusers($id,$name,$password,$user_type){
    $hashedpass=password_hash($password, PASSWORD_DEFAULT);
    $sql="UPDATE `users` SET `username`='$name',`password`='$hashedpass',`user_type`='$user_type' WHERE users_id=$id";
    return $this->execute($sql);
}
}