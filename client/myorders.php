<?php 
session_start();
require('../class/customers.class.php');
// var_dump($_SESSION);exit;
if(isset($_SESSION['client_id'])){
    $id = $_SESSION['client_id'];
    $customers = new Customers();
    $result = $customers->getCustomersorders($id);
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <?php require('./common/head.php');?>

    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
<style>/* General card styles */
.card {
    margin: auto;
    padding: 4vh 0;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-top: 5px solid #4F6F52;
    border-bottom: 3px solid #4F6F52;
    border-left: none;
    border-right: none;
    width: 100%; /* Full width of its container */
    max-width: 800px; /* Maximum width for larger screens */
    margin-bottom: 20px; /* Space between cards */
}

/* Card title */
.title {
    color: #4F6F52;
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial;
}

/* Card details */
#details {
    font-weight: 400;
}

/* Card info section */
.info {
    padding: 5% 8%;
}

.info .col-5 {
    padding: 0;
}

/* Card heading */
#heading {
    color: grey;
    line-height: 6vh;
}

/* Pricing section */
.pricing {
    background-color: #4F6F52;
    color: white;
    padding: 2vh 8%;
    font-weight: 400;
    line-height: 2.5;
}

.pricing .col-3 {
    padding: 0;
}

/* Total section */
.total {
    padding: 2vh 8%;
    color: #4F6F52;
    font-weight: bold;
}

.total .col-3 {
    padding: 0;
}

/* Footer section */
.f {
    background-color: color;
    padding: 0 8%;
    font-size: x-small;
    color: black;
}

.f img {
    height: 5vh;
    opacity: 0.2;
}

.f a {
    color: #4F6F52;
}

.f .col-10, .col-2 {
    display: flex;
    padding: 3vh 0 0;
    align-items: center;
}

.f .row {
    margin: 0;
}

/* Progress bar */
#progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: #4F6F52;
    padding-left: 0px;
    margin-top: 3vh;
}

#progressbar li {
    list-style-type: none;
    font-size: x-small;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: rgb(160, 159, 159);
}

#progressbar #step1:before,
#progressbar #step2:before,
#progressbar #step3:before,
#progressbar #step4:before {
    content: "";
    color: #4F6F52;
    width: 5px;
    height: 5px;
}

#progressbar #step2:before {
    margin-left: 32%;
}

#progressbar #step3:before {
    margin-right: 32%;
}

#progressbar #step4:before {
    margin-right: 0px !important;
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #ddd;
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh;
}

#progressbar li:after {
    content: '';
    height: 2px;
    background: #ddd;
    position: absolute;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 1px;
    z-index: 1;
}

.progress-track {
    padding: 0 8%;
}

#progressbar li:nth-child(2):after {
    margin-right: auto;
}

#progressbar li:nth-child(1):after {
    margin: auto;
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%;
}

#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%;
}

#progressbar li.active {
    color: black;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #4F6F52;
}

/* Media Queries for Responsiveness */

/* For tablets and smaller screens */
@media (max-width: 768px) {
    .container-fluid .row {
        display: flex;
        flex-direction: column; /* Stack cards vertically */
        padding: 0; /* Remove padding from the row */
    }

    .card {
        width: 500%; /* Adjust width for tablets and mobile devices */
        max-width: none; /* Remove max-width restriction */
        padding: 15px;
    }

    .title {
        font-size: 18px; /* Adjust font size for smaller screens */
    }

    #details {
        font-size: 14px;
    }

    .pricing {
        font-size: 14px;
    }

    .total {
        font-size: 16px;
    }

    .f {
        font-size: 14px;
    }
}

/* For very small devices like phones in portrait mode */
@media (max-width: 480px) {
    .card {
        padding: 10px;
    }

    .title {
        font-size: 16px;
    }

    #details {
        font-size: 12px;
    }

    .pricing {
        font-size: 12px;
    }

    .total {
        font-size: 14px;
    }

    .f {
        font-size: 12px;
    }
}

</style>

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

            <?php if($result!=null){foreach($result as $key) {
                // Determine progress bar status
                $status = $key['status'];
               
                $steps = ['In progress', 'Shipped', 'On the way', 'Delivered'];
                $activeStep = array_search($status, $steps);
            ?>
                <div class="col-3">
                    <div class="card">
                        <div class="title">Order</div>
                        <div class="info">
                            <div class="row">
                                <div class="col-12">
                                    <span id="heading">Date</span><br>
                                    <span id="details"><?php echo $key['dateorder'];?></span>
                                </div>
                            </div>      
                        </div>      
                        <div class="pricing">
                            <div class="row">
                                <div class="col-9">
                                    <span id="name">Discount</span>  
                                </div>
                                <div class="col-3">
                                    <span id="price">$<?php echo $key['discount'];?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <span id="name">Shipping</span>
                                </div>
                                <div class="col-3">
                                    <span id="price">$<?php echo $key['shipping'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <div class="row">
                                <div class="col-7"></div>
                                <div class="col-5"><big>$<?php echo $key['total'];?></big></div>
                            </div>
                        </div>
                        <div class="tracking">
                            <div class="title">Tracking Order</div>
                        </div>
                        <div class="progress-track">
                            <ul id="progressbar">
                                <?php foreach ($steps as $index => $step) {
                                    $isActive = $index <= $activeStep ? 'active' : '';
                                ?>
                                    <li class="<?php echo $isActive; ?>" id="step<?php echo $index + 1; ?>"><?php echo $step; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                      
                    
                        <div class="f" style="font-size:16px">
                            <div class="row">
                                <div class="col-12"><a href="orders_items.php?id=<?php echo $key['orders_id']?>"><i class="fa-solid fa-eye" style="color:#4F6F52;"></i>
                                View order details</a></div>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php } ?>
            <?php }
    else {?>
                                    <!-- ...::::Start About Us Center Section:::... -->
                                    <div class="empty-cart-section section-fluid">
                                        <div class="emptycart-wrapper">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3" >
                                                        <div class="emptycart-content text-center">
                                                            <div class="image">
                                                                <img class="img-fluid" src="assets/images/emprt-cart/empty-cart.png" alt="">
                                                            </div>
                                                            <h4 class="title">You dont have any orders</h4>
                                                            <h6 class="sub-title">Sorry Mate... No orders Found!</h6>
                                                            <a href="shop.php" class="btn btn-lg btn-golden" style="margin-bottom:20px">Continue Shopping</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ...::::End  About Us Center Section:::... -->
                                <?php }
                                ?>
        </div>
    </div>
    
</body>
</html>
<br><br><br><br><br>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<?php require('./common/footer.php')?>
 <!-- Use the minified version files listed below for better performance and remove the files listed above -->
 <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>