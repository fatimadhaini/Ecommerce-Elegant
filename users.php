<?php 
require('./class/users.class.php');
$users = new Users();
$result= $users->getusers();
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
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item ">
                                <a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item ">
                                <a href="categories.php">Categories</a></li>
                                <li class="breadcrumb-item ">
                                <a href="products.php">Products</a></li>
                            <li class="breadcrumb-item acitve">Users</li>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                <button type="button" class="bttn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="./actions/add_users.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">UserName</span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" aria-label="username" name="username" aria-describedby="basic-addon1" size="20" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" aria-label="password" name="password" aria-describedby="basic-addon1" size="20" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Usertype</span>
                        </div>
                        <input type="text" class="form-control" placeholder="user_type" aria-label="user_type" name="user_type" aria-describedby="basic-addon1" size="20" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="button btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="button btn-danger" value="upload-image">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Users</h5>
                    <button type="button" class="bttn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="actions/update_users.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3" hidden >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Users ID</span>
                            </div>
                            <input type="text" class="form-control" placeholder="id" aria-label="id" name="id" id="id" aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">UserName</span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" aria-label="username" id="username" name="username" value=""aria-describedby="basic-addon1" size="20" required>
                        </div> <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Password</span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" aria-label="password" id="passowrd" name="password" value=""aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Usertype</span>
                            </div>
                            <input type="text" class="form-control" placeholder="user_type" aria-label="password" id="user_type" name="user_type" value=""aria-describedby="basic-addon1" size="20" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="button btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="button btn-danger" value="upload-image">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
                        <div class="card mb-4"  >
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr>
                                            <th>Username</th>
                                            <!-- <th>Password</th> -->
                                            <th>User Type</th>
                                            <th>Actions</th>
                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                   
                                
                                
                                </td>
                                        <?php 
                                       
                                        foreach($result as $key){
                                            ?>
                                           <tr>
                                            <td><?php  echo $key['username']; ?></td>
                                            <!-- <td><?php  echo $key['password']; ?></td> -->
                                            <td><?php  echo $key['user_type']; ?></td>
                                            <td><a data-toggle="modal" data-target="#updateModal" class="edit"style="color:#597445" data-id="<?php echo $key['users_id'] ?>" name="<?php echo $key['username'] ?>" 
                                            password="<?php echo $key['password'];?>" user_type="<?php echo $key['user_type'];?>" ><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a data-id="<?php echo $key['users_id']?>" class="delete" style="color:#E4003A">
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
                        confirmButtonColor: '#739072',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    }).then(function() {
                        window.location.href = 'users.php';
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
                            users_id: id
                        },
                        url: 'actions/delete_users.php',
                        success: function(response) {
                            console.log(response)

                            if (response == 0) {

                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success',


                                 
                                ).then((result) => {
                                    window.location.href = "users.php";
                                
                                })

                            } else {
                                Swal.fire('You cannot delete it')
                            }
                        }

                    });

                }
            })
        });
        $(document).ready(function() {  
      $('#datatablesSimple').on('click', '.edit', function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('name');
        var password=$(this).attr('password');
        var user_type=$(this).attr('user_type');
        $('#id').val(id);
        $('#username').val(name);
        $('#passowrd').val(password);
        $('#user_type').val(user_type);

    });
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
                        window.location.href = 'users.php';
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


});

      

</script> 