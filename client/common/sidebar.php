<?php
require_once('../class/client.class.php');
$client=new client();
$row=$client->getcontact();
?>
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section" 
style="background-color:#597445">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="index.php"><span>Home</span></a>
                          
                        </li>
                        <li>
                            <a href="shop.php"><span>Shop</span></a>
                         
                                </li>
                           
                      
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="banner.php">Trending</a></li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="index.html"><img src="./assets/images/logo/logo.png.jpg" alt=""></a>
                </div>
<?php foreach($row as$key){?>
                <address class="address">
                    <span>Address:<?php echo $key['address'];?></span>
                    <span>Call Us: <?php echo $key['phone'];?></span>
                    <span>Email:<?php echo $key['email'];?></span>
                </address>
<?php }?>
              

             
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>