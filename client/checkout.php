<?php

use function PHPSTORM_META\type;

session_start();
if(isset($_GET['total']))
$total=$_GET['total'];
// var_dump($_SESSION['client']);exit;
// array(2) { [60]=> array(5) { ["id"]=> string(2) "60" ["name"]=> string(14) "Sectional Sofa" 
// ["quantity"]=> int(1) ["itemTotal"]=> string(8) "1,200.00" ["itemprice"]=> string(8) "1,200.00" } 
// [61]=> array(5) { ["id"]=> string(2) "61" ["name"]=> 
// string(8) "Loveseat" ["quantity"]=> int(1) ["itemTotal"]=> string(6) "600.00" ["itemprice"]=> string(6) "600.00" } }
if (isset($_SESSION['client']))

    require('../class/client.class.php');
$users = new client();
$shipping = 10; 
$user = $users->selectidclient($_SESSION['client_id']);
//  var_dump($user);exit;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php require('common/head.php'); ?>
    <style>#c{
    width: 540px;
     border-radius: 8px ;
    padding: 40px;
    box-shadow: 0 0 0 1px #4f6f52,
                0 5px 12px #4f6f52,
                0 18px 36px -6px #4f6f52;
}


#c .f .category{
    margin-top: 10px;
    padding-top: 20px;

    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 15px;
}
#c label{
    width: 100px;
    /* height: 65px; */
    height: 145px;
    margin: 5px;
    box-shadow: 0px 0px 0px 1px #4f6f52;
    display: inline-flex;
    /* justify-content: space-between; */
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border-radius: 5px;
    position: relative;
}

/* label:nth-child(2), label:nth-child(3){
    margin: 15px 0;
} */


#visa:checked ~ .category .visaMethod,
#mastercard:checked ~ .category .mastercardMethod,
#paypal:checked ~ .category .paypalMethod,
#AMEX:checked ~ .category .amexMethod{
    box-shadow: 0px 0px 0px 1px #4f6f52;
}


#visa:checked ~ .category .visaMethod .check,
#mastercard:checked ~ .category .mastercardMethod .check,
#paypal:checked ~ .category .paypalMethod .check,
#AMEX:checked ~ .category .amexMethod .check{
    display: block;
}


label .imgName{
    display: flex;
    /* justify-content: space-between;
     */
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: column;
    gap: 10px;
}

.imgName span{
    /* margin-left: 20px; */
    font-family: Arial, Helvetica, sans-serif;

    position: absolute;
    top: 72%;
    transform: translateY(-72%);
}

.imgName .imgContainer{
    width: 50px;
    display: flex;
    justify-content: center;
    align-items: center;

    position: absolute;
    top: 35%;
    transform: translateY(-35%);
}

img{
    width: 50px;
    height: auto;
}

.visa img{
    width: 80px;
    /* margin-left: 5px; */
}
h3,button{
    font-family:cursive;
    letter-spacing: 3px;
    font-size: 30px;
    /* font-weight: -200; */
}
.mastercard img{
    width: 65px;
}

.paypal img{
    width: 80px;
}

.AMEX img{
    width: 50px;
}

.check{
   
    display: none;
    position: absolute;
    top: -4px;
    right: -4px;
}

.check i{
    font-size: 18px;
}


    
    .price {
        display: inline-block;
        font-size: 20px;
        margin-right: 10px;
    }
    .old-price {
        color: red;
        text-decoration: line-through red;
    }</style>
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
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Checkout</h1>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <div class="container">
                                    <ul>
                                        <li><a href="index.php" style="color:#FBFADA">Home</a></li>
                                        <li><a href="shop.php" style="color:#FBFADA">Shop</a></li>
                                        <li><a href="cart.php" style="color:#FBFADA">Cart</a></li>
                                        <li class="active" aria-current="page">Checkout</li>
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

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section">
        <div class="container">
            <div class="row">
               
            </div>
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <?php foreach($user as $key){?>
                    <div class="col-lg-6 col-md-6">
                    <form id="addForm" action="placeorder.php?total=<?php echo htmlspecialchars($total); ?>"method="post">
                            <h3 style="background-color:#4f6f52">Billing Details</h3>
                            <div class="row">
                            <input class="form-control" value="<?php echo $key['customers_id'] ?>" name="id" type="hidden" >
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" name="fname" value="<?php echo $key['customers_first_name'];?>" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" name="lname" value="<?php echo $key['customers_last_name'];?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" value="<?php echo $key['customers_telephone'];?>">
                                    </div>
                                </div> <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Email</label>
                                        <input type="email" name="email"value="<?php echo $key['customers_email'];?>">
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Street address <span>*</span></label>
                                        <input name="address"  value="<?php echo $key['customers_address'];?>" type="text" >
                                    </div>
                                </div>
                              
                                <div class="col-12">
                                    <div class="default-form-box">
                                    <label>Country</label>
                                <select name="country" required class="custom-select">
                                    <option selected> Lebanon</option>
                                    <option>Iraq</option>
                                    <option>Jordan</option>
                                </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        
                                <label>City</label>
                                <input name="city" required class="form-control" autocomplete="off" type="text" placeholder="">
                                    </div></div>
                                    <div class="col-12">
                                    <div class="default-form-box">
                                        
                                    <label>ZIP Code</label>
                                    <input name="zipcode" required class="form-control" autocomplete="off" type="text" placeholder="">
                                    </div></div>
                            </div>
                        
                    </div>
                  
                    <div class="col-lg-6 col-md-6">
                        
                            <h3 style="background-color:#4f6f52">Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead style="background-color:#b19361;color:white;box-shadow:2px 2px 5px #4f6f52">
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) { ?>
                                        <?php $j =0.00;
                                             foreach($_SESSION['cart'] as $key){?>
                                        <tr>
                                            <td> <?php echo $key['name']?> <strong> × <?php echo $key['quantity']?></strong></td>
                                            <td> <?php    if (is_numeric($key['itemTotal'])) {
                    $j = $j + $key['itemTotal'];}
                else{
                    $numericString=$key['itemTotal'];
                $cleanedString = str_replace(',', '',$numericString);
                $numericValue = floatval($cleanedString);
                $j = $numericValue + $j;}
                
                               echo $key['itemTotal'] ;}?></td>
                                        </tr>
                                      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><strong>Cart Subtotal</strong></th>
                                            <td><strong>
                                            <?php
                                                            if (isset($j)) {
                                                                echo $j . ".00$";
                                                            } else {
                                                                echo "00.00$";
                                                            };} ?>
                                            </strong></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong><?php echo $shipping?></strong></td>
                                        </tr>
                                       
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td> <strong> <?php if($_GET['total']==$shipping+$j){
                                            echo $shipping+$j."$";}else{?></strong>
                                                <div class="price old-price"><strong><?php echo ($shipping+$j).".00$";?></strong></div>
                                            <div class="price">
                                                <strong><?php if (isset($_GET['total'])){
                                                echo $_GET['total']."$";}?></strong></div><?php }?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                            <div class="payment_method">
                          <h3 style="background-color:#4f6f52">Payment Method</h3>
                          <div class="container" id="c">

  
            <input type="radio" name="payment" id="visa" style="display:none" required>
            <input type="radio" name="payment" id="mastercard" style="display:none" required>
            <input type="radio" name="payment" id="paypal" style="display:none" required
            <input type="radio" name="payment" id="AMEX" style="display: none;" required>


            <div class="category">
                <label for="visa" class="visaMethod">
                    <div class="imgName">
                        <div class="imgContainer visa">
                            <img src="https://i.ibb.co/vjQCN4y/Visa-Card.png" alt="">
                        </div>
                        <span class="name">VISA</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style=" color:#4f6f52;"></i></span>
                </label>

                <label for="mastercard" class="mastercardMethod">
                    <div class="imgName">
                        <div class="imgContainer mastercard">
                            <img src="https://i.ibb.co/vdbBkgT/mastercard.jpg" alt="">
                        </div>
                        <span class="name">Mastercard</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style=" color:#4f6f52;"></i></span>
                </label>

                <label for="paypal" class="paypalMethod">
                    <div class="imgName">
                        <div class="imgContainer paypal">
                            <img src="https://i.ibb.co/KVF3mr1/paypal.png" alt="">
                        </div>
                        <span class="name">Paypal</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color:#4f6f52;"></i></span>
                </label>

                <label for="AMEX" class="amexMethod">
                    <div class="imgName">
                        <div class="imgContainer AMEX">
                            <img src="https://i.ibb.co/wQnrX86/American-Express.jpg" alt="">
                        </div>
                        <span class="name">AMEX</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style=" color:#4f6f52;"></i></span>
                </label>
            </div>
       
    </div> <br>   <button type="submit"<?php if (!isset($_SESSION['cart'])) echo " disabled"; ?>>Order now</button>
    <br><br>
    <?php }?> </form>
    <style>button {
  text-decoration: none;
  position: relative;
  border: none;
  font-size: 14px;
  font-family: inherit;
  cursor: pointer;
  color: #fff;
  width: 11em;
  height: 3em;
  line-height: 2em;
  text-align: center;
  background: linear-gradient(90deg, #b19361, white, #4f6f52, #b19361);
  background-size: 300%;
  border-radius: 30px;
  z-index: 1;
}

button:hover {
  animation: ani 8s linear infinite;
  border: none;
}

@keyframes ani {
  0% {
    background-position: 0%;
  }

  100% {
    background-position: 400%;
  }
}

button:before {
  content: "";
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  z-index: -1;
  background: linear-gradient(90deg, #b19361, #4f6f52, #b19361, #b19361);
  background-size: 400%;
  border-radius: 35px;
  transition: 1s;
}

button:hover::before {
  filter: blur(20px);
}

button:active {
  background: linear-gradient(32deg, #b19361, #4f6f52, #4f6f52, #b19361);
}
</style>
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
           
        </div>
    </div></div><!-- ...:::: End Checkout Section:::... -->


    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

  

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script>
$(document).ready(function() {
    $('#addForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var form = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Action URL from the form
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: form,
            success: function(response) {
                console.log(response); // Debugging: log the response

                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'button btn',
                            confirmButtonColor: '#4f6f52'
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: response.message,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'button btn',
                            confirmButtonColor: '#4f6f52'
                        }
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error:', textStatus, errorThrown); // Debugging: log error details
                Swal.fire({
                    icon: 'error',
                    title: 'An error occurred',
                    text: 'Please try again later.',
                    showConfirmButton: true,
                    customClass: {
                        confirmButton: 'button btn',
                        confirmButtonColor: '#4f6f52'
                    }
                });
            }
        });
    });
});
</script>


</body>


</html>
