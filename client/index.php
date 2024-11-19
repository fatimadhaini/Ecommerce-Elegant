<?php 
require_once('../class/home.class.php');
$home = new home();
$result= $home->gethome();
// var_dump($result);exit;
    ?>
<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <?php require('./common/head.php');?>
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</head>

<body>
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <?php require('common/navbar.php');?>
    </header>
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    <?php require('common/mobile_nav.php')?>
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
      <?php require('common/sidebar.php');?>
   <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->


    <!-- Start Offcanvas Addcart Section -->
      <?php require('common/Addcartsection.php');?>
   <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Wishlist Menu Section -->
    <?php require('common/wishlistsection.php');?>
    <!-- End Offcanvas Wishlist Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
   <?php require('common/search.php');?>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>
<?php foreach($result as $key){?>
    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="./assets/images/<?php echo($key['s1_img'])?>" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle"><?php echo($key['s1_h4'])?></h4>
                                        <h2 class="title"><?php echo($key['s1_h2'])?> <br> <?php echo($key['s1_h2b'])?> </h2>
                                        <a href="shop.php"><button class="animated-button">
                                            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                              <path
                                                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                              ></path>
                                            </svg>
                                            <span class="text">Shop now</span>
                                            <span class="circle"></span>
                                            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                              <path
                                                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                              ></path>
                                            </svg>
                                          </button></a>
<!--                                           
                                        <a href="product-details-default.html"
                                            class="btn btn-lg btn-outline-golden">shop now </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="assets/images/<?php echo($key['s2_img'])?>" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle"><?php echo($key['s2_h4'])?></h4>
                                        <h2 class="title"><?php echo($key['s2_h2'])?> <br> <?php echo($key['s2_h2b'])?></h2>
                                        <button class="animated-button">
                                            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                              <path
                                                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                              ></path>
                                            </svg>
                                            <span class="text">Shop now</span>
                                            <span class="circle"></span>
                                            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                              <path
                                                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                              ></path>
                                            </svg>
                                          </button>
                                        <!-- <a href="product-details-default.html"
                                            class="btn btn-lg btn-outline-golden">shop now </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
            </div>
<?php }?>
            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="row mb-n6">

                    <div class="col-lg-6 col-12 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-1 banner-animation img-responsive"
                            data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/banner/banner-style-1-img-1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">Mini rechargeable
                                    Table Lamp - E216</h4>
                                <h5 class="sub-title">We design your home</h5>
                                <a href="product-details-default.html"
                                    class="btn btn-lg btn-outline-golden icon-space-left"><span
                                        class="d-flex align-items-center">discover now <i
                                            class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>

                    <div class="col-lg-6 col-12 mb-6">
                        <div class="row mb-n6">
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-1.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Kitchen <br>
                                            utensils</h4>
                                        <a href="shop.php" class="link-text"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-2.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Sofas and <br>
                                            Armchairs</h4>
                                        <a href="shop.php" class="link-text"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-3.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Chair & Bar<br>
                                            stools</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-4.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Interior <br>
                                            lighting</h4>
                                        <a href="product-details-default.html"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Section -->
     
<br><br>
     <?php require('about-us copy.php')?>
</body></html>
    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>



</html>
<style>
    
    .animated-button {
        width:170px;
        height:50px;
        margin:30px;
  position: relative;
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 16px 36px;
  border: 4px solid;
  border-color: transparent;
  font-size: 16px;
  background-color: inherit;
  border-radius: 100px;
  font-weight: 600;
  color: #4F6F52;
  box-shadow: 0 0 0 2px #4F6F52;
  cursor: pointer;
  overflow: hidden;
  transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button svg {
  position: absolute;
  width: 20px;
  fill: #4F6F52;
  z-index: 9;
  transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button .arr-1 {
  right: 16px;
}

.animated-button .arr-2 {
  left: -25%;
}

.animated-button .circle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 20px;
  height: 20px;
  background-color: #4F6F52;
  border-radius: 50%;
  opacity: 0;
  transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button .text {
  position: relative;
  z-index: 1;
  transform: translateX(-12px);
  transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
}

.animated-button:hover {
  box-shadow: 0 0 0 12px transparent;
  color: #212121;
  border-radius: 12px;
}

.animated-button:hover .arr-1 {
  right: -25%;
}

.animated-button:hover .arr-2 {
  left: 16px;
}

.animated-button:hover .text {
  transform: translateX(12px);
}

.animated-button:hover svg {
  fill: #212121;
}

.animated-button:active {
  scale: 0.95;
  box-shadow: 0 0 0 4px #4F6F52;
}

.animated-button:hover .circle {
  width: 220px;
  height: 220px;
  opacity: 1;
}

h4,h2{
    font-family: "Oswald", sans-serif;
    color:#4F6F52;
}

    /* Responsive Styles */
    @media (max-width: 1199px) {
        .hero-slider-content h2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 991px) {
        .hero-slider-content h4 {
            font-size: 1.25rem;
        }

        .hero-slider-content h2 {
            font-size: 1.5rem;
        }

        .animated-button {
            width: 150px;
            height: 45px;
            font-size: 14px;
        }
    }

    @media (max-width: 767px) {
        .hero-slider-content h4 {
            font-size: 1rem;
        }

        .hero-slider-content h2 {
            font-size: 1.25rem;
        }

        .animated-button {
            width: 130px;
            height: 40px;
            font-size: 12px;
        }
    }

    @media (max-width: 575px) {
        .hero-slider-content {
            padding: 0 10px;
        }

        .animated-button {
            width: 120px;
            height: 35px;
            font-size: 11px;
            padding: 10px 20px;
        }
    }


    @media (max-width: 767px) {
        .banner-single-item {
            margin-bottom: 10px;
        }
    }

</style>
