<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include("../class/client.class.php");
session_start();
$client = new client();
if (isset($_POST['fname'])) {
    // $method=$client->validate('post');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['pswd'];
    $cpassword = $_POST['cnfpswd'];
    $phone = $_POST['telephone'];


    $result = $client->getuser($email);
    if ($result) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'The email already exists',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'signin.php';
            });
        });
      </script>";
       
    } else if ($password != $cpassword) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Passwords do not match',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'signin.php';
            });
        });
      </script>";
      
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Email',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'signin.php';
            });
        });
      </script>";
       
    } else {
        $result = $client->validatePhoneNumber($phone);
        if ($result == false) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid phone number',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'signin.php';
                });
            });
          </script>";
           
        } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $user = $client->insert($email, $pass, $fname, $lname, $address, $phone);
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Register Successful',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'signin.php';
                });
            });
          </script>";
            
    }
    }}
?>