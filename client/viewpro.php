<?php 
require('../class/categories.class.php');
$categories = new categories();
$id=$_GET['id'];
$c= $categories->getproductsbyid($id);
//  var_dump($row);exit;
$catid=$c[0]['categories_id'];
$all=$categories->getallproductsbycat($catid);
// var_dump($all);exit;?>
<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <?php require('./common/head.php');?>

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
    <div class="breadcrumb-section "style="background-image:url(../assets/img/details.jpg);height:190px;margin-bottom:20px">
        <div class="breadcrumb-wrapper"  style="height:10px; padding-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-12" >
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Product Details</h1>
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


<!-- Start Modal Quickview cart -->
 <?php foreach($c as $key){?>
                <div class="container-fluid" style="margin:5px">
                <?php $img=$categories->getproductsimg($key['products_id']);?>
                    <div class="row">
                        <div class="col-md-7">
                        <div class="image-container">
<?php foreach($img as $key1){?>
		<div class="image"active>
        <img src="../assets/img/<?php echo $key1['url']?>"/>
		</div>
        

		<?php } ?>
	</div>

                        </div>
                        
                        <div class="col-md-5">

                            <div class="modal-product-details-content-area" style="box-shadow: 20px 20px 60px #4F6F52, -20px -20px 60px #ffffff;padding:20px;margin:10px;">
                                <!-- Start  Product Details Text Area-->
                                <div class="product-details-text">
                                    <h4 class="title"><?php echo $key['products_name'];?></h4>
                                    <h3 class="price">$<?php echo $key['products_price'];?></h3>
                                </div> <!-- End  Product Details Text Area-->
                                <!-- Start Product Variable Area -->
                                <div class="modal-product-about-text">
                                <?php echo $key['description'];}?>
                                </div>
                                    <!-- Product Variable Single Item -->
                                    <div class="d-flex align-items-center flex-wrap">
                                       

                                        <div class="product-add-to-cart-btn">
                                              <!-- add to cart -->
                                                         
                                                            <form action="" method="post" class="addtocart text-center" style="float:left;margin-right:5px">
                                                            <input type="hidden" value="<?php echo $key['products_id'] ?>" name="pro_id">
                                                            <button type="submit" class="btn btn-lg btn-black-default-hover  addcart" style="margin-top:14px" >
                                                          Add To Cart
                                                               </button>
                                                            </form>
                                                             <!-- done -->
                                        </div>
                                    </div>
                                </div> <!-- End Product Variable Area -->
                             </div>
                              
                    </div></div>
          <!-- End Modal Quickview cart -->
            <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section "style="background-color:#4F6F52;height:100px;margin-bottom:20px">
        <div class="breadcrumb-wrapper"  style="height:10px; padding-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-12" >
                        <h1 class="breadcrumb-title" style="color:#FBFADA; font-family:Anton SC, sans-serif;font-size:40px">Related products</h1>
                      
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <div class="slider">
    <?php foreach($all as $key) {?>
        <div class="item">
        <div class="card">
  <div class="card-img">
  <?php $img=$categories->getproductsimg($key['products_id']);?>
 
        <img src="../assets/img/<?php echo $img[0]['url']?>" width="120%" height="120%"/></div>

  <div class="card-info">
    <p class="text-title"><?php echo($key['products_name'])?></p>
    <!-- <p class="text-body">Product description and details</p> -->
  </div>
  <div class="card-footer">
  <span class="text-title">$<?php echo($key['products_price'])?></span>
   <!-- add to cart -->
                                                         
   <form action="" method="post" class="addtocart text-center" style="float:left;margin-right:5px">
                                                            <input type="hidden" value="<?php echo $key['products_id'] ?>" name="pro_id">
                                                            <button type="submit" class="addcart" >
                                                            <svg class="svg-icon card-button" viewBox="0 0 20 20">
      <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
      <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
      <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
    </svg>
                                                               </button>
                                                            </form>
                                                             <!-- done -->
  </div>
</div></div>
      
    <?php }?>
    <button id="next">></button>
    <button id="prev"><</button>
</div></body></html>
    <style>
.slider{
    position: relative;
    width: 100%;
    height: 370px;
    overflow: hidden;
}
.item{
    position: absolute;
    width: 200px;
    height: 320px;
    text-align: justify;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    transition: 0.5s;
    left: calc(50% - 110px);
    top: 0;
}
#next, #prev{
    position: absolute;
    top: 40%;
    color: #4F6F52;
    background-color: transparent;
    border: none;
    font-size: xxx-large;
    font-family: monospace;
    font-weight: bold;
    left: 400px;
}
#next{
    left: unset;
    right: 400px;
}
.card {
 width: 190px;
 height: 254px;
 padding: .8em;
 background: #4F6F52;
 position: relative;
 overflow: visible;
 box-shadow: 2px 2px 5px 5px #4F6F52
}

.card-img {
 height: 40%;
 width: 100%;
 border-radius: .5rem;
 transition: .3s ease;
}

.card-info {
 padding-top: 10%;
}

svg {
 width: 40px;
 height: 40px;
}

.card-footer {
 width: 100%;
 display: flex;
 justify-content: space-between;
 align-items: center;
 padding-top: 10px;
 border-top: 1px solid #ddd;
}

/*Text*/
.text-title {
 
 font-size: 1.4em;
 line-height: 1.5;
 color:white;
 padding:5px;
 margin:2px;
 font-family: 'Times New Roman', Times, serif;
}

.text-body {
 font-size: .9em;
 padding-bottom: 10px;
}

/*Button*/
.card-button {
 border: 1px solid white;
 display: flex;
 padding: .3em;
 cursor: pointer;
 border-radius: 50px;
 transition: .3s ease-in-out;
 background-color: white;

}

/*Hover*/
.card-img:hover {
 transform: translateY(-25%);
 box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
}

.card-button:hover {
 border: 1px solid #4F6F52;
 background-color: #4F6F52;
}

    </style>
<script>
    let items = document.querySelectorAll('.slider .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    
    let active = 3;
    function loadShow(){
        let stt = 0;
        items[active].style.transform = `none`;
        items[active].style.zIndex = 1;
        items[active].style.filter = 'none';
        items[active].style.opacity = 1;
        for(var i = active + 1; i < items.length; i++){
            stt++;
            items[i].style.transform = `translateX(${120*stt}px) scale(${1 - 0.2*stt}) perspective(16px) rotateY(-1deg)`;
            items[i].style.zIndex = -stt;
            items[i].style.filter = 'blur(5px)';
            items[i].style.opacity = stt > 2 ? 0 : 0.6;
        }
        stt = 0;
        for(var i = active - 1; i >= 0; i--){
            stt++;
            items[i].style.transform = `translateX(${-120*stt}px) scale(${1 - 0.2*stt}) perspective(16px) rotateY(1deg)`;
            items[i].style.zIndex = -stt;
            items[i].style.filter = 'blur(5px)';
            items[i].style.opacity = stt > 2 ? 0 : 0.6;
        }
    }
    loadShow();
    next.onclick = function(){
        active = active + 1 < items.length ? active + 1 : active;
        loadShow();
    }
    prev.onclick = function(){
        active = active - 1 >= 0 ? active - 1 : active;
        loadShow();
    }
</script>
          <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


</html>

<style>@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap");
.modal-product-about-text{
    font-family: 'Times New Roman', Times, serif;
    
}
h4{
    font-family:'Anton SC', sans-serif;
    color:#4F6F52;
    font-size:30px;
}
img {
	max-width: 100%;
	border-radius: 1rem;
	cursor: pointer;
}



.image-container {
	display: flex;
	gap: 1rem;
	max-width: 900px;
	width: calc(100% - 100px);
	margin-inline: auto;
	padding: 0 1rem;
	overflow: hidden;
}

.image-container .image {
	position: relative;
	width: 60px;
	height: 400px;
	border-radius: 1rem;
	overflow: hidden;
	transition: 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95);
}

.image-container .image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95);
}


.image-container .active {
	width: 100%;
}

.image-container .active span {
	transform: scale(1);
}

@media (max-width: 576px) {
	.image-container {
		flex-direction: column;
		max-width: 2000px;
		width: 100%;
		height: 400px;
	}

	.image-container .image {
		width: 100%;
		height: 60px;
		transition: height 0.5s ease-in-out;
	}

	.image-container .image img {
		width: 100%;
		height: 100%;
	}

	.image-container .active {
		height: 400px;
	}
}
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const images = document.querySelectorAll(".image");

        // Add 'active' class to the first image container initially
        images[0].classList.add("active");

        // Handle click event to change active image
        images.forEach((image) => {
            image.addEventListener("click", () => {
                const active = document.querySelector(".active");
                active.classList.remove("active");
                image.classList.add("active");
            });
        });
    });
</script>

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
<?php require('./common/footer.php');?>