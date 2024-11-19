<?php 
require_once('./class/customers.class.php');
$customers = new Customers();
$result= $customers->getCustomers();
// var_dump($result);exit;
// ["customers_id"]=> string(1) "2" ["customers_password"]=> 
// string(60) "$2y$10$FQec2OyTySKg4Jh.AW5p7eHRdEkvMVTT.pRFmeoNCVeVJcKk1rEqa" ["customers_first_name"]=>
//  string(4) "nour" ["customers_last_name"]=> string(6) "dhaini" ["customers_address"]=> string(4)
//   "xyxy" ["customers_email"]=> string(22) "nourdhaini17@gmail.com" ["customers_telephone"]=> 
// string(8) "70076398" ["customers_created_time"]=> string(19) "2024-07-24 16:14:43" } 
//     ?>
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
                        <h1 class="mt-4">Customers</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item ">
                                <a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item ">
                                <a href="categories.php">Categories</a></li>
                                <li class="breadcrumb-item ">
                                <a href="products.php">Products</a></li>
                                <li class="breadcrumb-item ">
                                <a href="users.php">Users</a></li>
                                <li class="breadcrumb-item ">
                                <a href="home.php">Home</a></li>
                                <li class="breadcrumb-item ">
                                <a href="about.php">About</a></li>
                            <li class="breadcrumb-item acitve">Customers</li>
                        </ol>
                    
                    
                        </div>
                        



                        <div class="card mb-4"  >
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr>
                                            <th>Customer's First name</th>
                                            <th>Customer's Last name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Created time</th>
                                            <th>View orders</th>
                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                   
                                
                                
                                </td>
                                        <?php 
                                       
                                        foreach($result as $key){
                                            ?>
                                           <tr>
                                            <td><?php  echo $key['customers_first_name']; ?></td>
                                             <td><?php  echo $key['customers_last_name']; ?></td>
                                             <td><?php  echo $key['customers_address']; ?></td>
                                             <td><?php  echo $key['customers_email']; ?></td>
                                             <td><?php  echo $key['customers_telephone']; ?></td>
                                             <td><?php  echo $key['customers_created_time']; ?></td>
                                             

                                            <td><a href="customers_orders.php?id=<?php echo $key['customers_id']?>"><i class="fa-solid fa-eye" style="color:#729762"></i></a></td>
                                            <?php }?></tr>

                                    </tbody>
                                </table>
                            </div></div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                 <?php require('common/footer.php')?>
                </footer>
            </div>
        </div>
     
    </body>
</html>


    <?php require('common/script.php')?>
    <script>
$(document).ready(function() {
    $('#addForm').submit(function(e) {
        e.preventDefault();

        var form = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: form,
            success: function(response) {
                console.log(response); // Log the response for debugging
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#739072',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    }).then(function() {
                        window.location.href = 'categories.php';
                    });
                } else {
                    Swal.fire({
                        icon: response.status === 'error' ? 'warning' : 'error',
                        title: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#739072',
                        customClass: {
                            confirmButton: '#739072'
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log the full error response
                Swal.fire({
                    icon: 'error',
                    title: 'An error occurred',
                    text: xhr.responseText,
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#739072',
                    customClass: {
                        confirmButton: '#739072'
                    }
                });
            }
        });
    });
});


        $('#datatablesSimple').on('click', '.delete', function() {
            var id = $(this).attr('data-id');
            // alert(id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                iconColor:'#739072',
                showCancelButton: true,
                confirmButtonColor: '#739072',
                cancelButtonColor: '#739072',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        cache: false,
                        type: 'POST',
                        data: {
                            cat_id: id
                        },
                        url: 'actions/delete_categories.php',
                        success: function(response) {
                            console.log(response)

                            if (response == 0) {

                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success',


                                 
                                ).then((result) => {
                                    window.location.href = "categories.php";
                                
                                })

                            } else {
                                Swal.fire('You can not deleted this category')
                            }
                        }

                    });

                }
            })
        });
        $(document).ready(function() {
    $('#updateForm').submit(function(e) {
        e.preventDefault();

        var form = $(this).serialize(); // btjebon mn lform lal data kel name 7ada l value entered by the user 

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: form,
            success: function(response) {
                console.log(response); // Log the response for debugging
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#538392',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    }).then(function() {
                        window.location.href = 'categories.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error',
                        text: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#538392',
                        customClass: {
                            confirmButton: 'btn btn-warning'
                        }
                    });
                }
            },
          
        });
    });

    $('#datatablesSimple').on('click', '.edit', function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('name');
        $('#id').val(id);
        $('#categories').val(name);
    });
});

      

</script> 