<div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Mobile Left Side -->
                    <div class="mobile-header-left">
                        <ul class="mobile-menu-logo">
                            <li>
                                <a href="index.html">
                                    <div class="logo">
                                        <img src="./assets/images/logo/logo.png.jpg" alt="">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
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
                                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Right Side -->
                </div>
            </div>
        </div>
    </div>