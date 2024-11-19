<?php 
require('./class/home.class.php');
$team = new home();
$result= $team->getteam();

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
                        <h1 class="mt-4">Client Team Page</h1>
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
                            <li class="breadcrumb-item acitve">Team page</li>
                        </ol>
                    
                        </div>
                       
    
                        <div class="card mb-4">
                           
                            <div class="card-body">
                            <table id="datatablesSimple" class="display">
    <thead>
        <tr>
           <th>Member name</th>
           <th>Member descr</th>
           <th>Member photo</th>
        
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $key) { ?>
            <tr>
                <td><?php echo $key['1name']?></td>
                <td><?php echo $key['1des']?></td>
                <td><img src="./client/assets/images/<?php echo $key['1photo']; ?>" width="100px" height="100px"></td>
               

                <td>
                    <a href="update_form_team.php?id=<?php echo $key['team_id']?>"><i class="fa-solid fa-pen-to-square edit" style="color:#597445"></i></a>
                  
                </td>
            </tr>
        <?php } ?>
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
                        window.location.href = 'home.php';
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