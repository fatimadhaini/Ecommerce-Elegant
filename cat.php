<?php
require("class/categories.class.php");

$categories = new categories();
$allcategories = $categories->getallcategories();
// var_dump($allcategories);exit;

?>
<!DOCTYPE html>
<html lang="en">
    <head><?php require('common/header.php');?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#538392">
        <?php require('common/navbar.php');?>
        </nav>
        <div id="layoutSidenav">
          <?php require('common/sidebar.php');?>
          <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Categories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item ">Categories</li>
                        </ol>
                    
                        </div>
                        <div align="right" class="mb-3" >
                            
                        <button class="button" data-toggle="modal" data-target="#addModal">
Add category
  <svg fill="currentColor" viewBox="0 0 24 24" class="icon">
    <path clip-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" fill-rule="evenodd"></path>
  </svg>
</button>
                        </div>
                </div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="actions/add_categories.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width: 150px;">Categories Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="categories" aria-label="categories" name="categories_name" aria-describedby="basic-addon1" size="20" required>
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Categories</h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="actions/update_categories.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3" hidden >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Categories ID</span>
                            </div>
                            <input type="text" class="form-control" placeholder="id" aria-label="id" name="id" id="id" aria-describedby="basic-addon1" size="20" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="width: 150px;">Categories Name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="categories" aria-label="categories" id="categories" name="categories" aria-describedby="basic-addon1" size="20" required>
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
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Categories
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Categories Id</th>
                                <th>Categories Name</th>
                                <th>Actions</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($allcategories as $cat) { ?>
                                <tr>
                                    <td><?php echo $cat['categories_id'] ?></td>
                                    <td><?php echo $cat['categories_name'] ?></td>
                                    <td><a data-id="<?php echo $cat['categories_id'] ?>" class="delete"><i class="fa fa-trash text-danger"></i></a>
                                    <a data-toggle="modal" data-target="#updateModal" class="edit" data-id="<?php echo $cat['categories_id'] ?>" name="<?php echo $cat['categories_name'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
                                
                                
                                </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php require('common/footer.php') ?>
</body>

</html>
<?php require('common/script.php') ?>

   
<script>
    $(document).ready(function() {
        $('#addForm').submit(function(e) {

            e.preventDefault();

            var form = new FormData(this);
            // console.log(form);exit;
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: form,
                success: function(response) {
                    console.log(response);
                    // exit;
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'categories.php';
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        });
                    }
                }
            });
        });


        $('#datatablesSimple').on('click', '.delete', function() {
            var id = $(this).attr('data-id');
            // alert(id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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
                                    'success'
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
        })

        $('#datatablesSimple').on('click', '.edit', function() {
            // $('.edit').on('click', function() {
            var id = $(this).attr('data-id');
            var name = $(this).attr('name');
            // alert(id);
            $('#id').val(id);
            $('#categories').val(name);
        });



    });


</script>