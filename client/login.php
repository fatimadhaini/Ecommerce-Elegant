<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$total="";
require("../class/DAL.class.php");
$dal = new DAL();
if(isset($_POST['total'])){
    $total=$_POST['total'];
}
if (isset($_POST['useremail']) && isset($_POST['pswd'])) {
    $username = $_POST['useremail'];
    $password = $_POST['pswd'];

    $sql = "SELECT customers_id, customers_first_name, customers_last_name, customers_password FROM customers WHERE customers_email = ?";
    $params = array($username);
    $result = $dal->data($sql, $params);

    if ($result && count($result) > 0) {
        $storedPasswordHash = $result[0]['customers_password'];
        $id = $result[0]['customers_id'];
        $user_name = $result[0]['customers_first_name'] . " " . $result[0]['customers_last_name'];

        if (password_verify($password, $storedPasswordHash)) {
            $_SESSION['client_id'] = $id;
            $_SESSION['client'] = true;
            $_SESSION['auth_client'] = $user_name;
            $_SESSION['clientname'] = $user_name;
if($total!=""){
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Use PHP to insert the value of $total into the JavaScript code
                    window.location.href = 'checkout.php?total=" . $total . "';
                });
            });
        </script>";}
       else{
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                 
                    window.location.href = 'shop.php';
                });
            });
        </script>";}
        } else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Password',
                        }).then(() => {
                            window.location.href = 'index.php';
                        });
                    });
                  </script>";
        }
    } else {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Username',
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                });
              </script>";
    }
}
?>
