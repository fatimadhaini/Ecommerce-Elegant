<?php 
require('../class/categories.class.php');
$categories = new categories();
$result= $categories->getallcategories();
// var_dump($result);exit;
$row= $categories->getallproducts();


    ?>
<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <?php require('./common/head.php');?><style>
    .cartBtn {
  width: 155px;
  height: 50px;
  border: none;
  border-radius: 0px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  color: white;
  font-weight: 500;
  position: relative;
  background-color:#4F6F52;
  box-shadow: 0 20px 30px -7px #436850;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  overflow: hidden;
}

.cart {
  z-index: 2;
}

.cartBtn:active {
  transform: scale(0.96);
}

.product {
  position: absolute;
  width: 12px;
  border-radius: 3px;
  content: "";
  left: 23px;
  bottom: 23px;
  opacity: 0;
  z-index: 1;
  fill: rgb(211, 211, 211);
}

.cartBtn:hover .product {
  animation: slide-in-top 1.2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

@keyframes slide-in-top {
  0% {
    transform: translateY(-30px);
    opacity: 1;
  }

  100% {
    transform: translateY(0) rotate(-90deg);
    opacity: 1;
  }
}

.cartBtn:hover .cart {
  animation: slide-in-left 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

@keyframes slide-in-left {
  0% {
    transform: translateX(-10px);
    opacity: 0;
  }

  100% {
    transform: translateX(0);
    opacity: 1;
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
    <div class="breadcrumb-section " style="background-image:url(../assets/img/shopnow.jpg);height:190px;margin-bottom:20px">
        <div class="breadcrumb-wrapper" style=" padding-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-12" >
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Shop now</h1>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php" style="color:#FBFADA">Home</a></li>
                                
                                    <li class="active" aria-current="page">Shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                <?php foreach($result as $key){?>
                                    <li><a href="#" id="<?php echo $key['categories_id'] ?>"><?php echo $key['categories_name']; ?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <div id="slider-range"></div>
                                <div class="filter-type-price">
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                      

                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="assets/images/banner/side-banner.jpg" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                         
                                            <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-list"><img
                                                        src="assets/images/icons/bkg_list.png" alt=""></a></li>
                                                        
                                        </ul>

                                       
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                  
                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->
<!-- starttt -->
                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                                       
    <div class="row targetData">
        <!-- This is where AJAX response will be appended -->
    </div>
    <div class="page_num">
        <!-- Pagination controls can go here if needed -->
    </div>
</div>
                   <!-- End Tab Wrapper -->
            
    </div> <!-- ...:::: End Shop Section:::... -->


    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


</html>
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
// Add to cart button click event
$('.addtocart').on('submit', function(e) {
e.preventDefault();
// Get the product ID from the data attribute
// var productId = $(this).data('product-id');
var form = new FormData(this);

var $form = $(this);
// Make the AJAX POST request
$.ajax({
type: 'POST',
url: 'addtocart.php',
dataType: 'json',
processData: false,
contentType: false,
data: form,
success: function(response) {
if (response.status === 'success') {
console.log(response);

$('#cart-count').text(response.cartCount);
// Disable the submit button that was clicked
$form.find('.add-to-cart-btn').prop('disabled', true);
Swal.fire({
icon: 'success',
title: response.message,
showConfirmButton: true,
customClass: {
confirmButton: 'button btn app_style',
 confirmButtonColor: '#4f6f52'
}
}).then((result) => {
if (result.isConfirmed) {
// If the user clicks 'OK', you can perform any additional logic here
// For example, redirecting to another page
// window.location.href = 'your_redirect_url';
console.log('cool');
}
});
// }, 0)
} else if (response.status === 'error')
// setTimeout(() => {
// alert(response.message)

Swal.fire({
icon: 'warning',
title: response.message,
showConfirmButton: true,
customClass: {
confirmButton: 'button btn app_style',
 confirmButtonColor: '#4f6f52'

}
}).then((result) => {
if (result.isConfirmed) {
// If the user clicks 'OK', you can perform any additional logic here
// For example, redirecting to another page
// window.location.href = 'your_redirect_url';
console.log('cool');
}
});
},
});
});
});
</script>
<script>
$(document).ready(function() {
// Add to cart button click event
$('.addtowishlist').on('submit', function(e) {
e.preventDefault();
// Get the product ID from the data attribute
// var productId = $(this).data('product-id');
var form = new FormData(this);

var $form = $(this);
// Make the AJAX POST request
var clientId = "<?php echo isset($_SESSION['client_id']) ? $_SESSION['client_id'] : ''; ?>";
        
        if (clientId === '') {
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
                    window.location.href = 'signin.php'; // Replace with your login page URL
                }
            });}
            else{
$.ajax({
type: 'POST',
url: 'addtowishlist.php',
dataType: 'json',
processData: false,
contentType: false,
data: form,
success: function(response) {
if (response.status === 'success') {
console.log(response);

$('#wishlist-count').text(response.cartCount);
// Disable the submit button that was clicked
$form.find('.add-to-wishlist-btn').prop('disabled', true);
Swal.fire({
icon: 'success',
title: response.message,
showConfirmButton: true,
customClass: {
confirmButton: 'button btn app_style',
 confirmButtonColor: '#4f6f52'
}
}).then((result) => {
if (result.isConfirmed) {
// If the user clicks 'OK', you can perform any additional logic here
// For example, redirecting to another page
// window.location.href = 'your_redirect_url';
console.log('cool');
}
});
// }, 0)
} else if (response.status === 'error')
// setTimeout(() => {
// alert(response.message)

Swal.fire({
icon: 'warning',
title: response.message,
showConfirmButton: true,
customClass: {
confirmButton: 'button btn app_style',
 confirmButtonColor: '#4f6f52'

}
}).then((result) => {
if (result.isConfirmed) {
// If the user clicks 'OK', you can perform any additional logic here
// For example, redirecting to another page
// window.location.href = 'your_redirect_url';
console.log('cool');
}
});
},
});}
});
});
</script>
<script>
$(document).ready(function() {
    $('#view').click(function() {
        var productId = $(this).data('product-id'); // Retrieve product ID from data attribute

        // Assuming you want to use AJAX to retrieve data from the server
        $.ajax({
            url: 'getproductbyid.php',
            method: 'POST',
            data: { productId: productId },
            dataType: 'json',
            success: function(response) {
                // Assuming response is an array of products, and you want to update the .title field
                if (response.length > 0) {
                    $('.title').val(response[0].product_name); // Assuming you want to set the value of .title
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});

</script>
<script>
        $(document).ready(function() {
            $('.sidebar-menu a').click(function(e) {
                e.preventDefault(); // Prevent default behavior of anchor tag

                // Get the ID from the clicked category link
                var targetId = $(this).attr('id');

                // Hide all tab panes
                $('.tab-pane').removeClass('active show');

                // Show the tab corresponding to the clicked category
                $('#' + targetId).addClass('active show');
            });
        });
    </script>
    <!-- pagination -->
     <script>
   $(document).ready(function(){
    var def_page = '1';
    var def_limit = '8';
    bacaData(def_page,def_limit);
    function bacaData(def_page, def_limit){
        $('.targetData').html('');
        $('.page_num').html('');
        $.ajax({
            type : 'POST',
            url : 'getLimitData.php',
            data : 'page='+def_page+'&limit='+def_limit,
            dataType : 'JSON',
            success : function(response){
                // console.log(response);
                var i;
                var data;
                for(i=0;i<response.length;i++){
                    data +=
                    `
                     <div class="col-12">
                                <div class="product-list-single product-color--golden"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <a href="product-details-default.html" class="product-list-img-link">
                                        <img src="../assets/img/${product.url}" width="250px" height="180px" alt="product">
                                    </a>
                                    <div class="product-list-content">
                                        <h5 class="product-list-link">${product.products_name}<a href="product-details-default.html"></a></h5>
                                        <ul class="review-star">
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="empty"><i class="ion-android-star"></i></li>
                                        </ul>
                                        <span class="product-list-price">$${product.products_price}</span>
                                        <p>${product.products_name}</p>
                                        <div class="product-action-icon-link-list">
                                            <!-- Add to cart form -->
                                            <form action="" method="post" class="addtocart text-center" style="float:left;margin-right:5px">
                                                <input type="hidden" value="${product.products_id}" name="pro_id">
                                                <button type="submit" class="btn btn-lg btn-black-default-hover add-to-cart-btn addcart">Add To Cart</button>
                                            </form>
                                            <!-- View product link -->
                                            <a href="viewpro.php?id=${product.products_id}" class="btn btn-lg btn-black-default-hover view"><i class="icon-magnifier"></i></a>
                                            <!-- Add to wishlist form -->
                                            <form action="" method="post" class="addtowishlist text-center" style="float:left;margin-right:5px">
                                                <input type="hidden" value="${product.products_id}" name="pro_id">
                                                <button type="submit" class="btn btn-lg btn-black-default-hover add-to-wishlist-btn addwishlist"><i class="icon-heart"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- End Product Defautlt Single -->
                            </div>
                  
                    `
                }
                $('.targetData').append(data);
            }
        })

        $.ajax({
            type : 'GET',
            url : 'countData.php',
            dataType : 'JSON',
            success : function(response){
                var total_page = response/def_limit;
                var print_page = '';
                for(i=0;i<total_page;i++){
                    print_page += '<button class="btn-page" data="'+(i+1)+'">'+(i+1)+'</button>';
                }
                $('.page_num').append(print_page);
                $('.btn-page').click(function(){
                    // alert($(this).attr('data'));
                    bacaData($(this).attr('data'), def_limit);
                })
            }

        })
    }
})
   </script>