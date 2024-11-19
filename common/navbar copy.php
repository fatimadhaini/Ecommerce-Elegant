  <!-- Navbar Brand-->
  <?php 
 require_once('./class/users.class.php');
 $users = new Users();
 $a= $users->getusersbyusername($_SESSION['username']);
// var_dump($result);exit;
    ?> 
  <a class="navbar-brand ps-3" href="../weblevel3/client/index.php">
<img src="./assets/img/logo.png-Photoroom.png" class="img-fluid" width="90px" height="60px" style="margin:50px"/></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <br><?php foreach($a as $key){?>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="./client/assets/images/<?php echo $key['image'];}?>" class="rounded-circle" height="50px" width="50px">
</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <style>
/* Media query for phones */
@media (max-width: 576px) {
  .navbar {
    display: flex;
    justify-content: space-between; /* Align logo to the left and toggle to the right */
  }

  .navbar-brand {
    order: 1; /* Place the logo on the left */
  }

  .navbar-toggler {
    order: 2; /* Place the toggle button on the right */
  }

  .navbar-nav {
    order: 3; /* Place the user icon and menu on the right */
  }

  .navbar-nav .nav-item {
    margin-left: auto; /* Push the user icon to the far right */
  }
}</style>