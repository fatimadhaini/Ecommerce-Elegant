<?php 
require('./class/home.class.php');
$home = new home();
$allhome = $home->gethome();
// var_dump($allhome);exit;
    ?>
<!DOCTYPE html>
<html lang="en">
<head><?php require('common/header.php');?>
    </head>
    <body class="sb-nav-fixed"  style="background-color:#E7F0DC">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#729762">
        <?php require('common/navbar.php');?>
        </nav>
        <div id="layoutSidenav">
          <?php require('common/sidebar.php');?>

          <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item ">
                                <a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item ">
                                <a href="categories.php">Categories</a></li>
                                <li class="breadcrumb-item ">
                                <a href="products.php">Products</a></li>
                                <li class="breadcrumb-item ">
                                <a href="users.php">Users</a></li>
                            <li class="breadcrumb-item acitve">Home page</li>
                        </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="modal-body">
                            <form action="actions/update_form_home.php" id="updateForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3" hidden>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="id" aria-label="ID" name="id" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['home_id'] ?>">
                                </div>   
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s1_h4</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="s1_h4" aria-label="s1_h4" name="s1_h4" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['s1_h4'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s1_h2</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="s1_h2" aria-label="s1_h2" name="s1_h2" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['s1_h2'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s1_h2b</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="s1_h2b" aria-label="s1_h2b" name="s1_h2b" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['s1_h2b'] ?>">
                                </div>  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s2_h4</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="s2_h4" aria-label="s2_h4" name="s2_h4" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['s2_h4'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s2_h2</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="s2_h2" aria-label="s2_h2" name="s2_h2" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['s2_h2'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s2_h2b</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="s2_h2b" aria-label="s2_h2b" name="s2_h2b" aria-describedby="basic-addon1" value="<?php echo $allhome[0]['s2_h2b'] ?>">
                                </div>
                               
                                <div class="row">
            
                                        <div class="col-sm-6 text-center my-3">
                                        <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Slide1 image</span>
                                    </div>
                                    <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="s1_img" aria-describedby="basic-addon3" multiple>
                                </div>
                                            <img src="./client/assets/images/<?php echo $allhome[0]['s1_img']?> " class="rounded" height="200px" width="200px">
                                        </div>
                                        <div class="col-sm-6 text-center my-3">
                                        <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Slide2 image</span>
                                    </div>
                                    <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="s2_img" aria-describedby="basic-addon3" multiple>
                                </div>
                                            <img src="./client/assets/images/<?php echo $allhome[0]['s2_img']?>" class="rounded" height="200px" width="200px">
                                        </div>
                                       
                                       
                        
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="button text-white"value="submit"> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    </div>
    
    </main>
    <?php require('common/footer.php') ?>

    </body>

    </html>


    <?php require('common/script.php') ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
      

// This code uses the FormData object directly to send the form data via AJAX. Also, note that I've set contentType: false and processData: false to ensure that jQuery doesn't process the data or set the content type, as it would with a standard form submission.

// Make sure your server-side script ("actions/add_products.php") handles the FormData correctly, using $_POST for form fields and $_FILES for file uploads.

$(document).ready(function() {
    $('#updateForm').submit(function(e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "actions/update_home.php",
            type: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false, // Set content type to false
            processData: false, // Prevent jQuery from processing the data
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'button btn btn-primary app_style'
                        }
                    }).then(function() {
                        // Redirect to update form page
                        window.location.href = 'home.php';
                    });
                } else if (response.status === 'error') {
                    Swal.fire({
                        icon: 'warning',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'button btn btn-primary app_style'
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log detailed error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                });
            }
        });
    });
});

    </script>