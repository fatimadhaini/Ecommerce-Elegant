
<!DOCTYPE html>
<html lang="en">
    <head><?php require('common/header.php');?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <h1 class="mt-4">Update Profile</h1>
                    
                        </div>
                       
    
                        <div class="card mb-4">
                           
                            <div class="card-body">
                            <div class="container light-style flex-grow-1 container-p-y">
      
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0 m-0" style="border-right:solid 5px #729762">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                      
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <?php foreach($a as $key){?>
                                    <div class="row">
            
            <div class="col-sm-12 text-center my-3">
            <form action="actions/update_profile.php" id="updateForm" method="POST" enctype="multipart/form-data">
            <div class="form-group">
<input type="text" hidden value="<?php echo $key['users_id'];?>" name="id">
            <label class="form-label">Profile Image</label>
        <input type="file" class="form-control input-control" placeholder="" aria-label="Images" name="image" aria-describedby="basic-addon3" >
    </div><br>
                <img src="./client/assets/images/<?php echo $key['image'];?>" class="rounded-circle" height="100px" width="100px">
            </div>
            <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" name="username" value="<?php echo $key['username'];?>">
                                </div>
            
    </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                </form>
        </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                        <form action="actions/update_pass.php" id="passForm" method="POST" enctype="multipart/form-data">
                            <div class="card-body pb-2">
                            <input type="text" hidden value="<?php echo $key['users_id'];}?>" name="id">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control" name="current">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control" name="new1">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control" name="new2">
                                </div>
                            </div>
                            <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                        </form>
                        </div>
                      
                   
                    </div>
                </div>
            </div>
        </div>
     
    </div>

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
<?php require('./common/script.php') ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
    $('#updateForm').submit(function(e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "actions/update_profile.php",
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
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(function() {
                        // Redirect to update form page
                        window.location.href = 'settings.php';
                    });
                } else if (response.status === 'error') {
                    Swal.fire({
                        icon: 'warning',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'btn btn-primary'
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
<script>
    $(document).ready(function() {
    $('#passForm').submit(function(e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "actions/update_pass.php",
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
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(function() {
                        // Redirect to update form page
                        window.location.href = 'settings.php';
                    });
                } else if (response.status === 'error') {
                    Swal.fire({
                        icon: 'warning',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'btn btn-primary'
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
<style>body {
    background: #f5f5f5;
    margin-top: 20px;
}

.ui-w-80 {
    width : 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24, 28, 33, 0.1);
    background  : rgba(0, 0, 0, 0);
    color       : #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background  : transparent;
    color       : #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0, 0, 0, 0);
    background  : #3B5998;
    color       : #fff;
}

.btn-instagram {
    border-color: rgba(0, 0, 0, 0);
    background  : #000;
    color       : #fff;
}

.card {
    background-clip: padding-box;
    box-shadow     : 0 1px 4px #729762;
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position  : absolute;
    visibility: hidden;
    width     : 1px;
    height    : 1px;
    opacity   : 0;
}

html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: #729762 !important;
    color:white !important;
  
}

.account-settings-multiselect~.select2-container {
    width: 100% !important;
}

.light-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;  margin-right:0px;
    border-color: #729762 !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #729762 !important;
}

.material-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: #729762 !important;
  
}

.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.dark-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color:#729762 !important;
}

.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.form-control::after{
    box-shadow: 2px 2px 5px #729762 !important;


}

.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}

.light-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}</style>