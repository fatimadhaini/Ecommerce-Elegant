<?php
session_start();
require('../class/products.class.php');
$client = new Products();


// Handle removal from cart via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    if (isset($_SESSION['wishlist'][$productId])) {
        unset($_SESSION['wishlist'][$productId]);
        echo 'success';
        exit;
    } else {
        echo 'error';
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php require('common/head.php'); ?>
</head>

<body>
    <header class="header-section d-none d-xl-block">
        <?php require('common/navbar.php'); ?>
    </header>

    <!-- Start Mobile Header -->
    <?php require('common/mobile_nav.php') ?>
    <!-- End Mobile Header -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <?php require('common/sidebar.php'); ?>
    <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Addcart Section -->
    <?php require('common/Addcartsection.php'); ?>
    <!-- End Offcanvas Addcart Section -->

    <!-- Start Offcanvas Wishlist Menu Section -->
    <?php require('common/wishlistsection.php'); ?>
    <!-- End Offcanvas Wishlist Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <?php require('common/search.php'); ?>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section" style="background-image:url(../assets/img/add.jpg);">
        <div class="breadcrumb-wrapper" style="height:10px; padding-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Your wishlist</h1>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <div class="container">
                                    <ul>
                                        <li><a href="index.php" style="color:#FBFADA">Home</a></li>
                                        <li><a href="shop.php" style="color:#FBFADA">Shop</a></li>
                                        <li class="active" aria-current="page">Wishlist</li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Section -->

    <!-- Start Cart Section -->
    <?php
                                if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="table_page table-responsive">
                        <table class="table">
                            <!-- Cart Table Head -->
                            <thead style="background-color:#4f6f52">
                                <tr>
                                    <th class="product_remove" style="color:white">Delete</th>
                                    <th class="product_thumb" style="color:white">Image</th>
                                    <th class="product_name" style="color:white">Product</th>
                                    <th class="product_price" style="color:white">Price</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                                <?php
                                    $client = new Products();
                                    $arrayOfProductIds = array_keys($_SESSION['wishlist']);
                                    $productIds = implode(',', array_filter($arrayOfProductIds));
                                    $getall = $client->get($productIds);

                                    foreach ($getall as $all) {
                                        $productId = $all['products_id'];
                                       
                                        $itemPrice = floatval($all['products_price']);
                                    
                                        $images = $client->selectimage($productId);
                                     
                                ?>
                                        <tr data-id="<?php echo $productId; ?>">
                                            <td class="product_remove">
                                                <a href="#" class="btn btn-sm btn-remove" style="background-color:#4f6f52"><i class="fa fa-times"></i></a>
                                            </td>
                                            <td class="product_thumb"><img src="../assets/img/<?php echo $images[0]['url']; ?>" alt="<?php echo $all['products_name']; ?>" style="width: 100px; height: 100px;"></td>
                                            <td class="product_name"><?php echo $all['products_name']; ?></td>
                                            <td class="product_price"><?php echo number_format($itemPrice, 2); ?>$</td>
                                          
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    <!-- End Cart Section --><?php }
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
                                                            <h4 class="title">Your Wishlist is Empty</h4>
                                                            <h6 class="sub-title">Sorry Mate... No item Found inside your wishlist!</h6>
                                                            <a href="shop.php" class="btn btn-lg btn-golden" style="margin-bottom:20px">Continue Shopping</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ...::::End  About Us Center Section:::... -->
                                <?php }
                                ?>

<br><br><br><br><br><br><br>
<?php require('./common/footer.php')?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- All JS Files -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Scripts -->
    <script>
        $(document).ready(function() {
            // Event handler for remove button
            $(document).on('click', '.btn-remove', function(event) {
                event.preventDefault();
                var row = $(this).closest('tr');
                var productId = row.attr('data-id');
                row.remove();
                removeFromSessionCart(productId);
                updateTotals();
            });

          
            // Function to remove from session cart via AJAX
            function removeFromSessionCart(productId) {
                $.ajax({
                    type: 'POST',
                    url: 'wishlist.php', // Assuming this script handles the removal logic
                    data: {
                        productId: productId
                    },
                    success: function(response) {
                        var currentCount = parseInt($('#wishlist-count').text());
                        $('#wishlist-count').text(currentCount - 1);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
</body>

</html>