<?php
session_start();
require_once('../class/products.class.php');

// Initialize total and shipping cost
$total = 0;
$shipping = 10; // Example shipping cost, replace with your logic to calculate shipping



// Handle removal from cart via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
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
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Your cart</h1>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <div class="container">
                                    <ul>
                                        <li><a href="index.php" style="color:#FBFADA">Home</a></li>
                                        <li><a href="shop.php" style="color:#FBFADA">Shop</a></li>
                                        <li class="active" aria-current="page">Cart</li>
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
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {?>
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
                                    <th class="product_quantity "style="color:white">Quantity</th>
                                    <th class="product_total" style="color:white">Total</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                                <?php
                            $client = new Products();
                        
                             
                                    $arrayOfProductIds = array_keys($_SESSION['cart']);
                                    $productIds = implode(',', array_filter($arrayOfProductIds));
                                    $getall = $client->get($productIds);
                                

                                    foreach ($getall as $all) {
                                        $productId = $all['products_id'];
                                        $quantity = $_SESSION['cart'][$productId]['quantity'];
                                        $itemPrice = floatval($all['products_price']);
                                        $itemTotal = $itemPrice * $quantity;
                                        $images = $client->selectimage($productId);
                                        $total += $itemTotal;
                                        $maxQuantity = $client->getProductQuantity($productId); // Fetch maximum quantity
                                        // var_dump($maxQuantity[0]['quantity']);exit;
                                ?>
                                        <tr data-id="<?php echo $productId; ?>" data-max-quantity="<?php echo $maxQuantity[0]['quantity']; ?>">
                                            <td class="product_remove">
                                                <a href="#" class="btn btn-sm btn-remove" style="background-color:#4f6f52"><i class="fa fa-times"></i></a>
                                            </td>
                                            <td class="product_thumb"><img src="../assets/img/<?php echo $images[0]['url']; ?>" alt="<?php echo $all['products_name']; ?>" style="width: 100px; height: 100px;"></td>
                                            <td class="product_name"><?php echo $all['products_name']; ?></td>
                                            <td class="product_price"><?php echo number_format($itemPrice, 2); ?>$</td>
                                            <td class="product_quantity">
            <div class="input-group mx-auto" style="width: 150px; height: 40px;">
                <div class="input-group-prepend">
                    <a href="#" class="btn btn-sm btn-minus" style="background-color:#4f6f52; height: 100%;"><i class="fa fa-minus"></i></a>
                </div>
                <input type="text" class="form-control form-control-sm quantity text-center" style="color:white;background-color:#b19361; height: 100%;" disabled value="<?php echo $quantity; ?>">
                <div class="input-group-append">
                    <a href="#" class="btn btn-sm btn-plus" style="background-color:#4f6f52; height: 100%;"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </td>

                                            <td class="product_total"><?php echo number_format($itemTotal, 2); ?>$</td>
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

        <!-- Coupon and Cart Totals -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Coupon Area -->
                <div class="coupon_area">
                    <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                        <h3 style="background-color: #4f6f52;">Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <form id="codeform" action="couponcode.php">
                            <input class="mb-2" placeholder="Coupon code" type="text" name="code">
                            <button type="submit" class="btn btn-md btn-golden">Apply coupon</button></form>
                        </div>
                    </div>
                </div>
                <!-- End Coupon Area -->
            </div>
            <div class="col-lg-6">
                <!-- Cart Totals -->
                <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                    <h3 style="background-color: #4f6f52;">Cart Totals</h3>
                    <div class="coupon_inner">
                        <div class="cart_subtotal">
                            <p>Subtotal</p>
                            <p class="cart_amount" id="totalsub"><?php echo number_format($total, 2); ?>$</p>
                        </div>
                        <div class="cart_subtotal">
                            <p>Shipping</p>
                            <p class="cart_amount"> <?php echo number_format($shipping, 2); ?>$</p>
                        </div>
                        <div class="cart_subtotal">
            <p>Discount</p>
            <p class="cart_amount" id="discount">0.00$</p> <!-- Placeholder for discount -->
        </div>
                        <div class="cart_subtotal">
                            <p>Total</p>
                            <p class="cart_amount" id="total"><?php echo number_format($total + $shipping, 2); ?>$</p>
                        </div>
                        <div class="checkout_btn" id="checkoutBtn">
<div class="custom-container">
  <div class="custom-left-side">
    <div class="custom-card">
      <div class="custom-card-line"></div>
      <div class="custom-buttons"></div>
    </div>
    <div class="custom-post">
      <div class="custom-post-line"></div>
      <div class="custom-screen">
        <div class="custom-dollar">$</div>
      </div>
      <div class="custom-numbers"></div>
      <div class="custom-numbers-line2"></div>
    </div>
  </div>
  <div class="custom-right-side">
    <div class="custom-new">Checkout</div>
  </div>
</div>

</div>

                    </div>
                </div>
                <!-- End Cart Totals -->
            </div>
        </div>
        <!-- End Coupon and Cart Totals -->
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
                                                            <h4 class="title">Your Cart is Empty</h4>
                                                            <h6 class="sub-title">Sorry Mate... No item Found inside your cart!</h6>
                                                            <a href="shop.php" class="btn btn-lg btn-golden" style="margin-bottom:20px">Continue Shopping</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ...::::End  About Us Center Section:::... -->
                                <?php }
                                ?>

<br><br><br><br>
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

            // Event handler for quantity buttons
            $(document).on('click', '.btn-minus, .btn-plus', function() {
                var row = $(this).closest('tr');
                var productId = row.attr('data-id');
                var maxQuantity =row.attr('data-max-quantity'); // Get max quantity
// console.log(maxQuantity);

                var quantityInput = row.find('.quantity');
                var currentQuantity = parseInt(quantityInput.val());

                if ($(this).hasClass('btn-minus') && currentQuantity > 1) {
                    quantityInput.val(currentQuantity - 1);
                } else if ($(this).hasClass('btn-plus') && currentQuantity < maxQuantity) {
                    quantityInput.val(currentQuantity + 1);
                }

                updateSubtotal(row, productId);
            });

            // Function to update subtotal
            function updateSubtotal(row, productId) {
                var price = parseFloat(row.find('.product_price').text().replace('$', '').replace(',', '')) || 0;
                var quantity = parseInt(row.find('.quantity').val()) || 0;
                var subtotal = price * quantity;
                row.find('.product_total').text(subtotal.toFixed(2) + '$'); // Update subtotal display
                updateTotals();
                UpdateSessionCart(productId, quantity, subtotal);
            }

            // Function to update total
            function updateTotals() {
                var total = 0;
                $('.table tbody tr').each(function() {
                    var subtotal = parseFloat($(this).find('.product_total').text().replace('$', '').replace(',', '')) || 0;
                    total += subtotal;
                });
                $('#totalsub').text(total.toFixed(2) + '$'); // Update subtotal display
                $('#total').text((total + <?php echo $shipping; ?>).toFixed(2) + '$'); // Update total display including shipping
            }

            // Function to remove from session cart via AJAX
            function removeFromSessionCart(productId) {
                $.ajax({
                    type: 'POST',
                    url: 'cart.php', // Assuming this script handles the removal logic
                    data: {
                        productId: productId
                    },
                    success: function(response) {
                        var currentCount = parseInt($('.cartcount').text());
                        $('.cartcount').text(currentCount - 1);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
       
    </script>
<script>
    $(document).ready(function() {
        var total = parseFloat($('#totalsub').text().replace('$', '').replace(',', '')) || 0;
        var shipping = parseFloat('<?php echo $shipping; ?>');
        var totalWithDiscount=total+shipping;
        // Function to update totals based on coupon application
        function applyCouponDiscount(couponDiscount) {
           
            var discount = parseFloat(couponDiscount) || 0;
            totalWithDiscount = (total + shipping - ((total + shipping)*(discount/100.00))).toFixed(2);
            
            $('#discount').text(discount.toFixed(2) + '%'); // Update discount display
            $('#total').text(totalWithDiscount + '$'); // Update total display including discount
        
        }

        // Event handler for coupon form submission
        $(document).on('submit', '#codeform', function(e) {
            e.preventDefault();
            var form = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: form,

                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn app_style',
                                confirmButtonColor: '#4f6f52'
                            }
                        }).then(function() {
                            // Update totals on successful coupon application
                            applyCouponDiscount(response.discount);
                        });
                    } else if (response.status === 'error') {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn app_style',
                                confirmButtonColor: '#4f6f52'
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
                    console.error(xhr.responseText);
                }
            });
        });
   

    document.getElementById('checkoutBtn').addEventListener('click', function() {
        // Check if client is logged in (assuming you have a session variable client_id)
        var clientId = "<?php echo isset($_SESSION['client_id']) ? $_SESSION['client_id'] : ''; ?>";
        
        if (clientId === '') {
            // If client is not logged in, show SweetAlert
            Swal.fire({
                icon: 'warning',
                title: 'Please Login',
                text: 'You need to signin before proceeding to checkout!',
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-golden',
                    cancelButton: 'btn btn-golden'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to login page
                    window.location.href = 'signin.php?total=' + encodeURIComponent(totalWithDiscount); // Replace with your login page URL
                }
            });
        } else {
           
            // If client is logged in, proceed to checkout
        
            window.location.href = 'checkout.php?total=' + encodeURIComponent(totalWithDiscount);}
    }); });
</script>
</body>

</html>
<style>.custom-container {
  background-color: #ffffff;
  display: flex;
  width: 250px;
  height:100px;
  position: relative;
  border-radius: 6px;
  transition: 0.3s ease-in-out;
}

.custom-container:hover {
  transform: scale(1.03);
}

.custom-container:hover .custom-left-side {
  width: 100%;
}

.custom-left-side {
  background-color: #4f6f52;
  width: 130px;
  height: 100px;
  border-radius: 4px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: 0.3s;
  flex-shrink: 0;
  overflow: hidden;
}

.custom-right-side {
  display: flex;
  align-items: center;
  overflow: hidden;
  cursor: pointer;
  justify-content: space-between;
  white-space: nowrap;
  transition: 0.3s;
}

.custom-right-side:hover {
  background-color: #f9f7f9;
}

.custom-arrow {
  width: 20px;
  height: 20px;
  margin-right: 20px;
}

.custom-new {
  font-size: 23px;
font-family:Anton SC, sans-serif ;
  margin-left: 20px;

}

.custom-card {
  width: 70px;
  height: 46px;
  background-color: #c7ffbc;
  border-radius: 6px;
  position: absolute;
  display: flex;
  z-index: 10;
  flex-direction: column;
  align-items: center;
  box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
}

.custom-card-line {
  width: 65px;
  height: 13px;
  background-color: #80ea69;
  border-radius: 2px;
  margin-top: 7px;
}

@media only screen and (max-width: 480px) {
  .custom-container {
    transform: scale(0.7);
  }

  .custom-container:hover {
    transform: scale(0.74);
  }

  .custom-new {
    font-size: 18px;
  }
}

.custom-buttons {
  width: 8px;
  height: 8px;
  background-color: #379e1f;
  box-shadow: 0 -10px 0 0 #26850e, 0 10px 0 0 #56be3e;
  border-radius: 50%;
  margin-top: 5px;
  transform: rotate(90deg);
  margin: 10px 0 0 -30px;
}

.custom-container:hover .custom-card {
  animation: slide-top 1.2s cubic-bezier(0.645, 0.045, 0.355, 1) both;
}

.custom-container:hover .custom-post {
  animation: slide-post 1s cubic-bezier(0.165, 0.84, 0.44, 1) both;
}

@keyframes slide-top {
  0% {
    transform: translateY(0);
  }

  50% {
    transform: translateY(-70px) rotate(90deg);
  }

  60% {
    transform: translateY(-70px) rotate(90deg);
  }

  100% {
    transform: translateY(-8px) rotate(90deg);
  }
}

.custom-post {
  width: 63px;
  height: 75px;
  background-color: #dddde0;
  position: absolute;
  z-index: 11;
  bottom: 10px;
  top: 120px;
  border-radius: 6px;
  overflow: hidden;
}

.custom-post-line {
  width: 47px;
  height: 9px;
  background-color: #545354;
  position: absolute;
  border-radius: 0px 0px 3px 3px;
  right: 8px;
  top: 8px;
}

.custom-post-line:before {
  content: "";
  position: absolute;
  width: 47px;
  height: 9px;
  background-color: #757375;
  top: -8px;
}

.custom-screen {
  width: 47px;
  height: 23px;
  background-color: #ffffff;
  position: absolute;
  top: 22px;
  right: 8px;
  border-radius: 3px;
}

.custom-numbers {
  width: 12px;
  height: 12px;
  background-color: #838183;
  box-shadow: 0 -18px 0 0 #838183, 0 18px 0 0 #838183;
  border-radius: 2px;
  position: absolute;
  transform: rotate(90deg);
  left: 25px;
  top: 52px;
}

.custom-numbers-line2 {
  width: 12px;
  height: 12px;
  background-color: #aaa9ab;
  box-shadow: 0 -18px 0 0 #aaa9ab, 0 18px 0 0 #aaa9ab;
  border-radius: 2px;
  position: absolute;
  transform: rotate(90deg);
  left: 25px;
  top: 68px;
}

@keyframes slide-post {
  50% {
    transform: translateY(0);
  }

  100% {
    transform: translateY(-70px);
  }
}

.custom-dollar {
  position: absolute;
  font-size: 16px;
  font-family: "Lexend Deca", sans-serif;
  width: 100%;
  left: 0;
  top: 0;
  color: #4b953b;
  text-align: center;
}

.custom-container:hover .custom-dollar {
  animation: fade-in-fwd 0.3s 1s backwards;
}

@keyframes fade-in-fwd {
  0% {
    opacity: 0;
    transform: translateY(-5px);
  }

  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>