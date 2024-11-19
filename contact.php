<?php 
require_once('./class/client.class.php');
$client = new client();
$result= $client->getcontact();
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
                        <h1 class="mt-4">Contact</h1>
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
                                <li class="breadcrumb-item ">
                                <a href="team.php">Team</a></li>
                            <li class="breadcrumb-item acitve">Contact page</li>
                        </ol>
                    
                        </div>
                     




<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Contact</h5>
                    <button type="button" class="bttn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="actions/update_contact.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3" hidden >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Contact ID</span>
                            </div>
                            <input type="text" class="form-control" placeholder="id" aria-label="id" name="id" id="id" aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Address</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Address" aria-label="categories" id="address" name="address" value=""aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Email</span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" aria-label="email" id="email" name="email" value=""aria-describedby="basic-addon1" size="20" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Phone</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Phone" aria-label="phone" id="phone" name="phone" value=""aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Website</span>
                            </div>
                            <input type="text" class="form-control" placeholder="website" aria-label="website" id="website" name="website" value=""aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Map link</span>
                            </div>
                            <input type="text" class="form-control" placeholder="map" aria-label="map" id="map" name="map" value=""aria-describedby="basic-addon1" size="20" required>
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
                                            <th>Address</th>
                                             <th>Email</th>
                                             <th>Phone</th>
                                             <th>Website</th>
                                             <th>Map link</th>
                                            
                                            <th>Actions</th>
                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                   
                                
                                
                                </td>
                                        <?php 
                                       
                                        foreach($result as $key){
                                            ?>
                                           <tr>
                                            <td><?php  echo $key['address']; ?></td>
                                             <td><?php  echo $key['email']; ?></td>
                                             <td><?php  echo $key['phone']; ?></td>
                                             <td><?php  echo $key['website']; ?></td>
                                             <td> <div class="rounded">
                            <iframe class="rounded w-100" 
                            style="height: 200px;" src="<?php echo $key['map'];?>" 
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div></td>

                                            <td><a data-toggle="modal" data-target="#updateModal" class="edit"style="color:#597445"
                                             data-id="<?php echo $key['contact_id'] ?>" 
                                             data-address="<?php echo $key['address']?>"
                                             data-email="<?php echo $key['email']?>"
                                             data-phone="<?php echo $key['phone']?>"
                                             data-website="<?php echo $key['website']?>"
                                             data-map="<?php echo $key['map']?>"
                                             ><i class="fa-solid fa-pen-to-square"></i></a>
                                           </td>
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
                        window.location.href = 'contact.php';
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
        var address=$(this).attr('data-address');
        var email=$(this).attr('data-email');
        var phone=$(this).attr('data-phone');
        var website=$(this).attr('data-website');
        var map=$(this).attr('data-map');

        $('#id').val(id);
       
        $('#address').val(address);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#website').val(website);
        $('#map').val(map);

    });
});

      

</script> 