<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"rel="stylesheet">
        <div class="header-wrapper">
            <div class="header-bottom section-fluid sticky-header" style="background-color:#4F6F52;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/images/logo/logo.png.jpg" alt=""></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="index.php">Home</a>
                                          
                                        </li>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="shop.php">Shop </a>
                                        </li>
                                        <li>
                                            <a href="about-us.php">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact.php">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="banner.php">Trending </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="wishlist.php" class="off-canvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count"id="wishlist-count"><?php if (isset($_SESSION['wishlist'])) {

                                echo count($_SESSION['wishlist']);} else {echo '0';}?></span></a>
                                
                                </li>
                                <li>
                                <a href="cart.php" class="off-canvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count"id="cart-count"><?php if (isset($_SESSION['cart'])) {

                                echo count($_SESSION['cart']);} else {echo '0';}?></span></a>
                                    <!-- <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">3</span>
                                    </a> -->
                                </li>
                                <li>
                                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">   
                                    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                   <?php if(!isset($_SESSION['client_id'])){?>
                        <li><a class="dropdown-item" href="signin.php" style="letter-spacing:2px">Login</a></li>
                        <li><a class="dropdown-item" href="signin.php" style="letter-spacing:2px">Register</a></li>
                        <?php }else{?>
                        <li><a class="dropdown-item" href="myorders.php" style="letter-spacing:2px">My Orders</a></li>
                        <li><a class="dropdown-item" href="logout.php" style="letter-spacing:2px">Logout</a></li>
                        <?php }?>
                       
                    </ul>
                                 
                                
                                </li>
                                
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
          
        </div>