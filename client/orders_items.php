<?php 
session_start();
require('../class/customers.class.php');
    $id = $_GET['id'];
    $customers = new Customers();
    $result = $customers->getCustomersordersitems($id);
    // var_dump($result);exit;
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <?php require('./common/head.php');?>

    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

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

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section " style="background-image:url(../assets/img/aboutimg.jpg);height:190px;margin-bottom:50px">
        <div class="breadcrumb-wrapper"  style="height:10px; padding-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-12" >
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Orders History</h1>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php" style="color:#FBFADA">Home</a></li>
                                    <li><a href="shop.php" style="color:#FBFADA"> Shop </a></li>
                                    <li><a href="about-us.php" style="color:#FBFADA"> About us </a></li>
                                    <li><a href="contact.php" style="color:#FBFADA"> Contact us </a></li>
                                    <li class="active" aria-current="page"> Orders</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->  

    <div class="container-fluid" style="font-size:16px">
        <div class="row">
        <article>

<section class="sectionWrapper">

  <section class="swiper">

    <div class="parallax-bg" data-swiper-parallax="600" data-swiper-parallax-scale="0.85"></div>

    <div class="swiper-wrapper">
 <?php foreach($result as $key) {
             ?>
      <figure class="swiper-slide">

        <div class="cardPopout" data-swiper-parallax="30" data-swiper-parallax-scale="0.9" data-swiper-parallax-opacity="0.8" data-swiper-parallax-duration="1000">

          <img src="../assets/img/<?php echo $key['url']?>"alt="jellyfish" width="800" height="400" data-swiper-parallax="80" data-swiper-parallax-duration="2000">

          <h2 class="title" data-swiper-parallax="80" data-swiper-parallax-duration="1000">
          <?php echo $key['name'];?>
          </h2>

          <h4 class="subtitle" data-swiper-parallax="80" data-swiper-parallax-duration="1500">
          Price:<?php echo $key['sub_total'];?><br>Quantity:<?php echo $key['quantity'];?>
          </h4>

          


        </div>

      </figure>

      <?php }?>

    </div>

    <div class="swiper-scrollbar"></div>

  </section>

</section>

</article>
       
            
   </div></div><br><br><br><br><br><br><br><br>
    <?php require('./common/footer.php');?>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script src="../js/datatables-simple-demo.js"></script>
<style>

body article {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.sectionWrapper {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
}

.swiper {
  width: 100%;
  height: 100%;
  padding: 20px 20px;
  overflow: visible;
}


.swiper .swiper-wrapper {
  align-items: center;
}

.swiper .swiper-slide {
  
  position: relative;
  height: auto;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  background-color:#4F6F52;
  border-radius: 7px;
  padding: 10px;
  margin: 0;
  cursor: grab;
  user-select: none;
  text-wrap: pretty;
}

.swiper .swiper-slide::before {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 80px;
  height: 80px;
  border-bottom: 1px dashed white;
  border-right: 1px solid white;
  border-radius: 0 0 7px 0;
  content: "";
  transition: all 0.3s ease;
}

.swiper .swiper-slide::after {
  position: absolute;
  top: 0;
  left: 0;
  width: 80px;
  height: 80px;
  border-top: 1px solid white;
  border-left: 1px dashed white;
  border-radius: 7px 0 0 0;
  content: "";
  transition: all 0.3s ease;
}

.swiper .swiper-slide:hover {
  background: linear-gradient(
    135deg,
    #739072,
    #b19361,
    #4F6F52,
    #4F6F52,
    #b19361,
    #3A4D39,
    #ECE3CE,
    #ECE3CE,
    #b19361,
    #3A4D39,
    #b19361,
    #ECE3CE
  );
}

.swiper .swiper-slide:hover::before,
.swiper .swiper-slide:hover::after {
  width: 170px;
  height: 170px;
  transition: all 0.3s ease;
}

.swiper .swiper-slide .cardPopout {
  width: 100%;
  height: 100%;
  background-color: #4F6F52;
  border-radius: 7px;
  padding: 20px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
}

.swiper .swiper-slide img {
  width: 100%;
  height: auto;
  margin-bottom: 25px;
  border-radius: 5px;
}

.swiper .swiper-slide h2 {
  font-size: 200%;
  line-height: 110%;
  margin: 0 0 7px 0;
  color: white;
  font-family: "Nabla", system-ui;
  font-style: italic;
  font-variation-settings: "EDPT" 100, "EHLT" 24;
 
}

.swiper .swiper-slide h4 {
  font-size: 110%;
  line-height: 120%;
  font-weight: 700;
  margin: 0 0 13px 0;
  color: #b19361;
  font-style: italic;
}

.swiper .swiper-slide figcaption {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  margin: 0 0 20px 0;
  padding-left: 20px;
  border-left: 1px solid white;
}

.swiper .swiper-slide figcaption p {
  color: #999;
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.swiper .swiper-slide a {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 20px;
  background-color: black;
  color: white;
  border-radius: 3px;
  text-decoration: none;
  overflow: hidden;
  z-index: 1;
  transition: all 0.6s ease !important;
}

.swiper .swiper-slide a:hover {
  color: black;
  transition: all 0.6s ease;
}

.swiper .swiper-slide a::after {
  position: absolute;
  right: 100%;
  bottom: 0;
  width: 100%;
  height: 100%;
  background-color: #2649ff;
  content: "";
  z-index: -1;
  transition: all 0.6s ease;
}

.swiper .swiper-slide a:hover::after {
  right: 0;
  transition: all 0.6s ease;
}

.swiper .swiper-slide a svg {
  width: 23px;
  height: auto;
  fill: white;
  margin-left: 5px;
  transition: all 0.6s ease;
}

.swiper .swiper-slide a:hover svg {
  margin-left: 10px;
  fill: black;
  transition: all 0.6s ease;
}

.swiper .swiper-scrollbar {
  --swiper-scrollbar-bottom: 0px;
  --swiper-scrollbar-size: 10px;
}

@media (max-height: 550px) {
  .swiper .swiper-slide figcaption p {
    -webkit-line-clamp: 2;
  }
}

@media (max-height: 490px) {
  .swiper .swiper-slide figcaption p {
    -webkit-line-clamp: 1;
  }
}

@media (max-height: 460px) {
  .swiper .swiper-slide figcaption p {
    display: none;
  }
  .swiper .swiper-slide h4 {
    margin: 0;
  }
}

@media (max-height: 430px) {
  .swiper .swiper-wrapper {
    position: relative;
    bottom: 6px;
  }
}

@media (max-width: 750px) {
  .swiper .parallax-bg {
    width: 320%;
  }
}
</style>

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
    <script>const swiper = new Swiper(".swiper", {
  direction: "horizontal",
  loop: false,
  speed: 1500,
  slidesPerView: 4,
  spaceBetween: 60,
  mousewheel: true,
  parallax: true,
  centeredSlides: true,
  effect: "coverflow",
  coverflowEffect: {
    rotate: 40,
    slideShadows: true
  },
  autoplay: {
    delay: 2000,
    pauseOnMouseEnter: true
  },
  scrollbar: {
    el: ".swiper-scrollbar"
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 60
    },
    600: {
      slidesPerView: 2,
      spaceBetween: 60
    },
    1000: {
      slidesPerView: 3,
      spaceBetween: 60
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 60
    },
    2300: {
      slidesPerView: 5,
      spaceBetween: 60
    },
    2900: {
      slidesPerView: 6,
      spaceBetween: 60
    }
  }
});
</script>