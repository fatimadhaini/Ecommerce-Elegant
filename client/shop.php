<?php 
session_start();
require('../class/categories.class.php');
$categories = new categories();
$result= $categories->getallcategories();
// var_dump($result);exit;
$category = $result[0];

$row= $categories->getallproducts();

    ?>

<!DOCTYPE html>
<html lang="zxx">
    
   
<head>  
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Rubik+Mono+One&display=swap" rel="stylesheet"> <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./simple-bootstrap-paginator.js"></script>
    <script src="./simple-bootstrap-paginator.min.js"></script>


 
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Simple Pagination Plugin CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/simplePagination.css" integrity="sha512-emkhkASXU1wKqnSDVZiYpSKjYEPP8RRG2lgIxDFVI4f/twjijBnDItdaRh7j+VRKFs4YzrAcV17JeFqX+3NVig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <?php require('./common/head.php'); ?>
<style>

/* Pagination container styling */
.pagination-container {
    display: flex;
    justify-content: center;
    padding: 20px;
}

/* Pagination list styling */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Page item styling */
.page-item {
    margin: 0 5px;
}
.product-list-link,.product-list-price{
    font-family: "DM Serif Display", serif;
    color:#4F6F52
}

/* Page link styling */
.page-link {
    display: block;
    padding: 10px 15px;
    color: #4F6F52;
    text-decoration: none;
    border: 1px solid #4F6F52;
    border-radius: 4px;
    font-weight: bold;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}

/* Page link hover and active styling */
.page-link:hover, .page-link:focus {
    background-color: #4F6F52;
    color: #fff;
    border-color: #4F6F52;
}

/* Active page styling */
.page-item.active .page-link {
    background-color: #4F6F52;
    color: #fff;
    border-color: #4F6F52;
}

/* Disabled page item styling */
.page-item.disabled .page-link {
    color: #ccc;
    border-color: #ccc;
    cursor: not-allowed;
}

/* Hide default focus outline */
.page-link:focus {
    outline: none;
}


.category-list {
    list-style: none; /* Remove default list styling */
    padding: 0; /* Remove default padding */
    margin: 0; /* Remove default margin */
}

.category-list li {
    padding: 10px 0; /* Add padding to list items for spacing */
    border-bottom: 1px solid #ddd; /* Add a bottom border for separation */
}

.form-check-label {
    display: flex;
    align-items: center;
    font-weight: bold; /* Make the text bold */
    font-size: 16px; /* Adjust font size as needed */
    color: #4F6F52; /* Set text color */
    cursor: pointer;
    padding: 5px 10px; /* Add padding around the checkbox and text */
    border-radius: 4px; /* Slightly rounded corners for a modern look */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition effects */
}

.form-check-label input[type="checkbox"] {
    margin-right: 10px; /* Space between checkbox and text */
    cursor: pointer;
    appearance: none; /* Remove default checkbox styling */
    width: 20px; /* Set width */
    height: 20px; /* Set height */
    border: 2px solid #4F6F52; /* Border color */
    border-radius: 4px; /* Rounded corners for checkbox */
    background-color: #fff; /* Background color */
    position: relative; /* For positioning the checkmark */
    transition: background-color 0.3s, border-color 0.3s; /* Smooth transition effects */
}

.form-check-label input[type="checkbox"]:checked {
    background-color: #4F6F52; /* Background color when checked */
    border-color: #4F6F52; /* Border color when checked */
}

.form-check-label input[type="checkbox"]:checked::before {
    content: "✔"; /* Checkmark character */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff; /* Checkmark color */
    font-size: 14px; /* Size of the checkmark */
}

.form-check-label:hover {
    background-color: #e0e0e0; /* Light background on hover */
    color: #4F6F52; /* Change text color on hover */
}

.form-check-label:active {
    background-color: #d0d0d0; /* Darker background when clicked */
}
.d-flex {
            display: flex;
        }

        .gap-4 {
            gap: 1rem; /* Adjust gap between items */
        }

        .btn-group {
            display: flex;
            gap: 0.5rem; /* Space between buttons */
        }

        .btn-check {
            display: none; /* Hide the default radio button */
        }

        .btn-outline-primary {
            padding: 0.5rem 1rem; /* Add padding for better click area */
            border: 2px solid #4F6F52; /* Border color */
            border-radius: 4px; /* Rounded corners */
            color: #4F6F52; /* Text color */
            background-color: #fff; /* Background color */
            cursor: pointer; /* Pointer cursor on hover */
            font-weight: bold; /* Bold text */
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Smooth transition */
        }

        .btn-outline-primary:hover {
            background-color: #4F6F52; /* Background color on hover */
            color: #fff; /* Text color on hover */
            border-color: #4F6F52; /* Border color on hover */
        }

        .btn-check:checked + .btn-outline-primary {
            background-color: #4F6F52; /* Background color when checked */
            color: #fff; /* Text color when checked */
            border-color: #4F6F52; /* Border color when checked */
        }
        
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


    <!-- Start Offcanvas Search Bar Section -->
   <?php require('common/search.php');?>
    <!-- End Offcanvas Search Bar Section -->


    <div class="breadcrumb-section " style="background-image:url(../assets/img/shopnow.jpg);height:190px;margin-bottom:20px">
        <div class="breadcrumb-wrapper" style="padding-top:20px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
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
    </div>
   

    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">
                        <form id="filterForm" action="" method="get">
                            <input type="hidden" name="page" id="pageInput">
                            <div class="sidebar-single-widget"> 
                                <h6 class="sidebar-title">CATEGORIES</h6>
                                <div class="sidebar-content">
                                    <ul class="sidebar-menu">
                                        <?php foreach($result as $key): ?>
                                            <li>


                                            
                                            <label class="form-check-label">
                <input type="checkbox" value="<?= htmlspecialchars($key['categories_id']) ?>" name="categories[]" id="<?= htmlspecialchars($key['categories_id']) ?>">
                <?= htmlspecialchars($key['categories_name']) ?>
            </label>

                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">FILTER BY PRICE</h6>
                                <div class="sidebar-content">
                                    <div class="d-flex gap-4">
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" value="high-to-low" name="price_range" id="btnradio1" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio1">High to Low</label>

                                            <input type="radio" class="btn-check" value="low-to-high" name="price_range" id="btnradio2" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio2">Low to High</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <video width="100%" height="auto" autoplay loop muted style="margin-top:20px">
    <source src="./assets/images/videoplayback.mp4" type="video/mp4">
  
</video>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                              
                                <div id="results"></div>
                                <div id="productsContainer"></div>
                               
                                <div id="paginator"  class="pagination-container"></div>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br>
<?php require('./common/footer.php')?>

    <button class="material-scrolltop" type="button"></button>
    <!-- Include necessary scripts -->
    <script>
  AOS.init();
</script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        function sendAjaxRequest(page = 1) {
            $("#pageInput").val(page);
            $.ajax({
                url: "filter_products.php",
                type: "GET",
                data: $("#filterForm").serialize(),
                dataType: "json",
                success: function(response) {
                    console.log(response); // Check the response in the console
                    let productsContainer = $("#productsContainer");
                    productsContainer.empty(); // Clear existing products

                    if (response.products.length > 0) {
                        $('#paginator').show();
                        $('#paginator').simplePaginator('setTotalPages', parseInt(parseInt(response.total_pages, 10)/ 4));
            
                    let productsHTML = '<div class="row">';

$.each(response.products, function(index, product) {
    let imagesHTML = '';

    if (product.images && product.images.length > 0) {
        const limitedImages = product.images.slice(0, 2);
        $.each(limitedImages, function(index, image) {
        imagesHTML += `<img src="../assets/img/${image.url}" width="250px" height="180px" alt="product image ${index + 1}">`;
    });
    }
      // Determine the button text and class based on quantity and cart status
      let buttonText;
            let buttonClass;
    if (product.quantity == 0) {
                buttonText = 'Out of Stock';
                buttonClass = 'disabled';
            } else {
                buttonText = product.in_cart ? 'In Cart' : 'Add To Cart';
                buttonClass = product.in_cart ? 'disabled' : '';
            }

    productsHTML += `
        <div class="col-12" style="margin-top:20px">
            <div class="product-list-single product-color--golden" >
                <a href="" class="product-list-img-link">
                    ${imagesHTML}
                </a>
                <div class="product-list-content">
                    <h5 class="product-list-link">${product.products_name}</h5>
                    <ul class="review-star">
                        <li class="fill"><i class="ion-android-star"></i></li>
                        <li class="fill"><i class="ion-android-star"></i></li>
                        <li class="fill"><i class="ion-android-star"></i></li>
                        <li class="fill"><i class="ion-android-star"></i></li>
                        <li class="empty"><i class="ion-android-star"></i></li>
                    </ul>
                    <span class="product-list-price">$${product.price}</span>
                   
                    <div class="product-action-icon-link-list">
                        <form action="" method="post" class="addtocart text-center" style="float:left;margin-right:5px">
                            <input type="hidden" value="${product.products_id}" name="pro_id">
                            <button type="submit" class="btn btn-lg btn-black-default-hover add-to-cart-btn ${buttonClass}">
                                        ${buttonText}
                                    </button>
                        </form>
                     
                                                            <a href="viewpro.php?id=${product.products_id}>"
                                                                    class="btn btn-lg btn-black-default-hover" class="view"><i
                                                                        class="icon-magnifier"></i></a>
                        <form action="" method="post" class="addtowishlist text-center" style="float:left;margin-right:5px">
                            <input type="hidden" value="${product.products_id}" name="pro_id">
                            <button type="submit" class="btn btn-lg btn-black-default-hover add-to-wishlist-btn">
                                <i class="icon-heart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    `;
});

productsHTML += '</div>';
productsContainer.html(productsHTML);
                    } else {
                        $('#paginator').hide();
                        productsContainer.html("<h3>No products found.</h3>");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                }
            });
        }

        // Initial AJAX request
        sendAjaxRequest();

        // Trigger AJAX request on filter change
        $(document).on("change", "#filterForm input[type=checkbox], #filterForm input[type=radio]", function() {
            sendAjaxRequest();
        });
          $('#paginator').simplePaginator({
            totalPages: 1,
            pageChange: function(page) {
                sendAjaxRequest(page);
            },
            currentPage: 1
        });

        // Add to cart functionality
        $(document).on('submit', '.addtocart', function(e) {
            e.preventDefault();
            var form = new FormData(this);
            var $form = $(this);

            $.ajax({
                type: 'POST',
                url: 'addtocart.php',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: form,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#cart-count').text(response.cartCount);
                        $form.find('.add-to-cart-btn').prop('disabled', true);

                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn app_style',
                                confirmButtonColor: '#4f6f52'
                            }
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
                    }
                },
            });
        });

       });

</script>
<script>
$(document).ready(function() {
    // Add to Wishlist form submission event
    $(document).on('submit', '.addtowishlist', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var $form = $(this);
        var formData = new FormData(this);

        var clientId = "<?php echo isset($_SESSION['client_id']) ? $_SESSION['client_id'] : ''; ?>";
        
        if (clientId === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Please Login',
                text: 'You need to sign in before proceeding!',
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-golden',
                    cancelButton: 'btn btn-golden'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'signin.php'; // Redirect to login page
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: 'addtowishlist.php',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#wishlist-count').text(response.wishlistCount);
                        $form.find('.add-to-wishlist-btn').prop('disabled', true);
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'btn btn-golden',
                                confirmButtonColor: '#4f6f52'
                            }
                        });
                    } else if (response.status === 'error') {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'btn btn-golden',
                                confirmButtonColor: '#4f6f52'
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong',
                        text: 'Please try again later.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-golden',
                            confirmButtonColor: '#4f6f52'
                        }
                    });
                }
            });
        }
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

</body>
</html>
<!-- End Modal Quickview cart -->

<script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: 'search.php',
                        method: 'GET',
                        data: { q: query },
                        success: function(response) {
                            $('#results').html(response);
                        }
                    });
                } else {
                    $('#results').empty();
                }
            });
        });
    </script>