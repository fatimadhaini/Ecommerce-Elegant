<?php
require("../class/users.class.php");
// This creates an instance of the categories class. It appears to be an object-oriented approach where an instance of the class is created to work with category-related functionality.
$users = new users();
if ($_POST) {
    $id = $_POST['users_id'];
    $user = $users->deleteusers($id);
    if ($user == 0) {
        echo $user;
     
    }
}


?>