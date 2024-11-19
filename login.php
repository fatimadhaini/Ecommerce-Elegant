<?php
session_start();
require_once("class/DAL.class.php"); 
$dal = new DAL();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database based on the username
    $sql = "SELECT user_type, password FROM users WHERE username = ?";
    $params = array($username);
    
    $result = $dal->data($sql, $params);

    if ($result && count($result) > 0) {
        $storedPasswordHash = $result[0]['password'];
        $user_type = $result[0]['user_type'];

        // Verify the user-provided password against the stored hash
        if (password_verify($password, $storedPasswordHash)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['login'] = true;

            // Return JSON response
            echo json_encode(array(
                'status' => 'success',
                'message' => 'Login successful'
            ));
            exit;
        } else {
            // Password does not match
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Invalid Password'
            ));
            exit;
        }
    } else {
        // User not found
        echo json_encode(array(
            'status' => 'error',
            'message' => 'Invalid Username'
        ));
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page | theuicode.com</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+AU+VIC:wght@100..400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <form class="login" id="loginForm" method="post">
            <h3 class="title"> Elegant Login</h3>
            <div class="text-input">
                <i class="ri-user-fill" style="color:#597445"></i>
                <input type="text" placeholder="Username" name="username" autocomplete="off">
            </div>
            <div class="text-input">
                <i class="ri-lock-fill" style="color:#597445"></i>
                <input type="password" placeholder="Password" name="password" autocomplete="off">
            </div>
            <button type="submit" name="submit" class="login-btn">LOGIN</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(loginForm);

            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Log response data for debugging

                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        showConfirmButton: true,
                        confirmButtonColor: '#597445',
                        timer: 1500,
                      
                    }).then((result) => {
                                    window.location.href = "index.php";
                                });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: data.message || 'An error occurred. Please try again later.',
                        confirmButtonColor: '#597445'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again later.',
                    confirmButtonColor: '#597445'
                });
            });
        });
    });
</script>



</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    *, html, body {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(to right, #E7F0DC, #597445, #729762);
    }

    .container {
        width: 60vw;
        height: 80vh;
        display: grid;
        grid-template-columns: 100%;
        grid-template-areas: "login";
        box-shadow: 0 0 17px 10px rgb(0 0 0 / 30%);
        border-radius: 20px;
        background-color: white;
        overflow: hidden;
    }

    .design {
        grid-area: design;
        display: none;
        position: relative;
    }

    .rotate-45 {
        transform: rotate(-45deg);
    }

    .design .pill-1 {
        bottom: 0;
        left: -40px;
        position: absolute;
        width: 80px;
        height: 200px;
        background: linear-gradient(#E7F0DC, #597445, #729762);
        border-radius: 40px;
    }

    .design .pill-2 {
        top: -100px;
        left: -80px;
        position: absolute;
        height: 450px;
        width: 220px;
        background: linear-gradient( #597445, #729762,#E7F0DC);
        border-radius: 200px;
        border: 30px solid #597445;
    }

    .design .pill-3 {
        top: -100px;
        left: 160px;
        position: absolute;
        height: 200px;
        width: 100px;
        background:  linear-gradient( #729762,#597445,#E7F0DC);
        border-radius: 70px;
    }

    .design .pill-4 {
        bottom: -180px;
        left: 220px;
        position: absolute;
        height: 300px;
        width: 120px;
        background: linear-gradient(#729762, #E7F0DC);
        border-radius: 70px;
    }

    .login {
        grid-area: login;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        background: white;
    }

    .login h3.title {
        font-size: 30px;
        margin: 15px 0;
        color: #597445;
        font-family: "Playwrite AU VIC", cursive;
    }

    .text-input {
        background: #e6e6e6;
        height: 40px;
        display: flex;
        width: 60%;
        align-items: center;
        border-radius: 10px;
        padding: 0 15px;
        margin: 5px 0;
    }

    .text-input input {
        background: none;
        border: none;
        outline: none;
        width: 100%;
        height: 100%;
        margin-left: 10px;
    }

    .text-input i {
        color: #686868;
    }

    ::placeholder {
        color: #9a9a9a;
    }

    .login-btn {
        width: 68%;
        padding: 10px;
        color: white;
        background: linear-gradient(to right, #E7F0DC, #597445, #729762);
        border: none;
        border-radius: 20px;
        cursor: pointer;
        margin-top: 10px;
    }

    a {
        font-size: 18px;
        color: #9a9a9a;
        cursor: pointer;
        user-select: none;
        text-decoration: none;
    }

    a.forgot {
        margin-top: 15px;
    }

    .create {
        display: flex;
        align-items: center;
        position: absolute;
        bottom: 30px;
    }

    .create i {
        color: #9a9a9a;
        margin-left: 10px;
    }

    @media (min-width: 768px) {
        .container {
            grid-template-columns: 50% 50%;
            grid-template-areas: "design login";
        }

        .design {
            display: block;
        }
    }
</style>
