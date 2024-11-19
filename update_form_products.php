<?php 
require('./class/products.class.php');
$products = new Products();
$id = $_GET['id'];
// var_dump($_GET);exit;
$allcategories = $products->getCategories();
$allproducts = $products->getproducts($id);

$allimages = $products->getimages($id);
// var_dump($allproducts);exit;

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
                            <li class="breadcrumb-item active">
                                <a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">
                                <a href="categories.php">Categories</a></li>
                            <li class="breadcrumb-item ">Products</li>
                        </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="modal-body">
                            <form action="actions/update_form_products.php" id="updateForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3" hidden>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="id" aria-label="ID" name="id" aria-describedby="basic-addon1" value="<?php echo $allproducts[0]['products_id'] ?>">
                                </div>   
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Name" aria-label="Username" name="products_name" aria-describedby="basic-addon1" value="<?php echo $allproducts[0]['products_name'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Description</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Description" aria-label="Description" name="description" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['description'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Quantity</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="quantity" aria-label="" name="quantity" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['quantity'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Category_name</label>
                                    </div>
                                    <select name="categories_id" id="inputGroupSelect02" class="form-control input-control">
                                        <?php foreach ($allcategories as $k => $item) { ?>
                                            <option value="<?php echo $item["categories_id"] ?>" <?php echo ($item["categories_name"] == $allproducts[0]["categories_name"]) ? "selected" : ""; ?>>
                                                <?php echo $item["categories_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Price</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="price" aria-label="price" name="price" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['products_price'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Images</span>
                                    </div>
                                    <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="images[]" aria-describedby="basic-addon3" multiple>
                                </div>
                                <div class="row">
                                    <?php foreach ($allimages as $k => $row) { ?>
                                        <div class="col-sm-4 text-center my-3">
                                            <span class="d-block text-danger delete_img" data-id="<?php echo $row['products_img_id'] ?>" style="float:right;">
                                                <i class="fa-solid fa-delete-left"></i>
                                            </span>
                                            <img src="assets/img/<?php echo $row['url'] ?>" class="rounded" height="200px" width="200px">
                                        </div>
                                    <?php
                                    } ?>
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
      $(document).ready(function() {
    $('.delete_img').on('click', function() {
        var id = $(this).attr('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#729762',
            cancelButtonColor: '#729762',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'actions/image_delete.php',
                    data: {
                        image_id: id
                    },
                    dataType: 'json', // Expect JSON response
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // Redirect to update form page
                                window.location.href = 'update_form_products.php?id=<?php echo $id ?>';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Failed to delete the image.'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        });
                    }
                });
            }
        });
    });
});



// This code uses the FormData object directly to send the form data via AJAX. Also, note that I've set contentType: false and processData: false to ensure that jQuery doesn't process the data or set the content type, as it would with a standard form submission.

// Make sure your server-side script ("actions/add_products.php") handles the FormData correctly, using $_POST for form fields and $_FILES for file uploads.

$(document).ready(function() {
    $('#updateForm').submit(function(e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "actions/update_products.php",
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
                        window.location.href = 'products.php';
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