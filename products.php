<?php 
require('./class/products.class.php');
$products = new Products();
$result= $products->getAllProducts();

$resultc= $products->getcategories();
// var_dump($result);exit;
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
                    
                        </div>
                        <div align="right" class="mb-3" >
                        <button type="button" class="btn" data-toggle="modal" data-target="#addModal">
  <span class="button__text">Add</span>
  <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button>
                        </div>

                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                <button type="button" class="bttn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="./actions/add_products.php" method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Images</span>
                            </div>
                            <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="images[]" aria-describedby="basic-addon3" multiple>
                        </div>
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Products Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="products" aria-label="products" name="products_name" aria-describedby="basic-addon1" size="20" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Products Price</span>
                        </div>
                        <input type="number" class="form-control" placeholder="products_price" aria-label="products" name="price" aria-describedby="basic-addon1" size="20" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Description</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Description" aria-label="description" name="description" aria-describedby="basic-addon1" size="20" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Quantity</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Quantity" aria-label="quantity" name="quantity" aria-describedby="basic-addon1" size="20" required>
                    </div>
                    
                    <div class="mb-3">
                <label for="categories_id" class="form-label">Categories name</label><br>
                <select name="categories_id" >
                    <?php foreach($resultc as $key){?>
                                <option value="<?php echo($key['categories_id']);?>"><?php echo($key['categories_name']);?></option>
                             <?php } ?>
                </select></div>
              
                    <div class="modal-footer">
                        <button type="button" class="button btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="button btn-danger" value="upload-image">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





    
                        <div class="card mb-4">
                           
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Products name</th>
                                            <th>Products Price</th>
                                             <th>Products Image</th>
                                             <th>Categories name</th>
                                             <th>Quantity</th>
                                             <th>Description</th>
                                            <th>Actions</th>
                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                   
                                
                                
                                </td>
                                        <?php 
                                       
                                        foreach($result as $key){
                                            ?>
                                           <tr>
                                            <td><?php  echo $key['products_name']; ?></td>
                                            <td><?php  echo $key['products_price']; ?></td>
                                            <td>
    <div id="demo<?php echo $key['products_id']; ?>" class="carousel slide" data-bs-ride="carousel">
        
        <!-- Carousel inner -->
        <div class="carousel-inner">
            <?php 
            $first = true; // To mark the first image as active
            $img = $products->getimages($key['products_id']);
            foreach($img as $i => $image) {
                ?>
                <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                    <img src="./assets/img/<?php echo $image['url']; ?>" height="200px" width="200px" alt="Slide <?php echo $i+1; ?>">
                </div>
                <?php 
                $first = false; // Mark subsequent items as not active
            }
            ?>
        </div>
        
        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo<?php echo $key['products_id']; ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo<?php echo $key['products_id']; ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        
    </div>
</td>

                                            <!-- <td> 
                                                <img src="./assets/img/<?php echo ($key['url']);?>"height="100px" width="100px">
                                          
                                              </td> -->
                                            <td><?php  echo $key['categories_name']; ?></td>
                                            <td><?php  echo $key['quantity']; ?></td>
                                            <td><?php  echo $key['description']; ?></td>
                                            <td>
                                            <a href="update_form_products.php?id=<?php echo $key['products_id'] ?>"><i class="fa-solid fa-pen-to-square"  class="edit" style="color:#597445"></i></a>
                                            <a  id="<?php echo $key['products_id']?>" class="delete" style="color:#E4003A">
                                            <i class="fa-solid fa-trash"></i></a></td>
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
                        confirmButtonColor: '#729762',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    }).then(function() {
                        window.location.href = 'products.php';
                    });
                } else {
                    Swal.fire({
                        icon: response.status === 'error' ? 'warning' : 'error',
                        title: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#729762',
                        customClass: {
                            confirmButton: 'btn btn-warning'
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
                    confirmButtonColor: '#729762',
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    }
                });
            }
        });
    });
});
$(document).ready(function() {
        $('#datatablesSimple').on('click', '.delete', function() {
            var id = $(this).attr('id');
            // alert(id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                iconColor:'#B3E2A7',
                showCancelButton: true,
                confirmButtonColor: '#729762',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        cache: false,
                        type: 'POST',
                        data: {
                            pro_id: id
                        },
                        url: 'actions/delete_products.php',
                        success: function(response) {
                            console.log(response);

                            if (response == 0) {

                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then((result) => {
                                    window.location.href = "products.php";
                                })

                            } else {
                                Swal.fire('You can not deleted this category')
                            }
                        }

                    });

                }
            })
        });});
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
        var description = $(this).attr('description');
        var price=$(this).attr('products_price');
        var quantity=$(this).attr('quantity');
        $('#quantity').val(quantity);
        $('#description').val(description);
        $('#id').val(id);
        $('#products').val(name);
        $('#products_price').val(price);

    });
});

      

</script> 