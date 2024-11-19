<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

require_once('./class/client.class.php');
$row=new client();
$countorders=$row->countorders();
$countcustomers=$row->countcustomers();
$countproducts=$row->countproducts();
$result=$row->getcategories();
$countmost=$row->getmost();
$recent=$row->getrecentorders();
$outofstock=$row->getoutofstock();

//  var_dump($countmost);exit;
// array(4) { [0]=> array(3) { ["products_id"]=> string(2) "61"
//    ["products_name"]=> string(8) "Loveseat" ["product_count"]=> string(1) "3" }
//     [1]=> array(3) { ["products_id"]=> string(2) "60"
//        ["products_name"]=> string(14) "Sectional Sofa"
//         ["product_count"]=> string(1) "2" } [2]=> array(3) { 
//           ["products_id"]=> string(2) "62" ["products_name"]=> string(12) "Sleeper sofa"
//            ["product_count"]=> string(1) "2" } [3]=> array(3) { ["products_id"]=> 
//   string(2) "63" ["products_name"]=> string(14) "Reclining Sofa" ["product_count"]=> string(1) "1" } }
$categories = [];
$productCounts = [];
$count=[];
$products=[];
foreach($countmost as$key){
   $count[]=$key['product_count'];
   $products[]=$key['products_name'];
}
foreach($result as $key) {
    $categories[] = $key['category'];
    $productCounts[] = $key['product_count'];
}
// var_dump($productCounts);exit;

// Encode PHP arrays as JSON
$categoriesJson = json_encode($categories);
$productCountsJson = json_encode($productCounts);
$productsJson=json_encode($products);
$countJson=json_encode($count);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('common/header.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>/*
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
*/

@media print {
 .table, .table__body {
  overflow: visible;
  height: auto !important;
  width: auto !important;
 }
}

/*@page {
    size: landscape;
    margin: 0; 
}*/


main.table {
    width: 100%;
    height: 100%;
    background-color: #fff5;

    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}


table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
  font-weight: lighter !important;
    position: sticky;
    top: 0;
    left: 0;
    color:white;
    background-color: #729762;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #729762;
}

thead th:hover {
    color: burlywood;
}

thead th.active span.icon-arrow{
    background-color: white;
    color: #729762;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}

.export__file {
    position: relative;
}

.export__file .export__file-btn {
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background: #fff6 url(images/export.png) center / 80% no-repeat;
    border-radius: 50%;
    transition: .2s ease-in-out;
}

.export__file .export__file-btn:hover { 
    background-color: #fff;
    transform: scale(1.15);
    cursor: pointer;
}

.export__file input {
    display: none;
}

.export__file .export__file-options {
    position: absolute;
    right: 0;
    
    width: 12rem;
    border-radius: .5rem;
    overflow: hidden;
    text-align: center;

    opacity: 0;
    transform: scale(.8);
    transform-origin: top right;
    
    box-shadow: 0 .2rem .5rem #0004;
    
    transition: .2s;
}

.export__file input:checked + .export__file-options {
    opacity: 1;
    transform: scale(1);
    z-index: 100;
}

.export__file .export__file-options label{
    display: block;
    width: 100%;
    padding: .6rem 0;
    background-color: #f2f2f2;
    
    display: flex;
    justify-content: space-around;
    align-items: center;

    transition: .2s ease-in-out;
}

.export__file .export__file-options label:first-of-type{
    padding: 1rem 0;
    background-color: #86e49d !important;
}

.export__file .export__file-options label:hover{
    transform: scale(1.05);
    background-color: #fff;
    cursor: pointer;
}

.export__file .export__file-options img{
    width: 2rem;
    height: auto;
}</style>
    <style> 
    #myChart {
      width: 100% !important;  /* Full width */
      height: auto !important; /* Automatic height */
    }
  </style>
    <style>/* === removing default button style ===*/
.buttonpma {
  margin: 0;
  height: auto;
  background: transparent;
  padding: 0;
  border: none;
  animation: r1 3s ease-in-out infinite;
 /*linear*/
  border: 7px #729762 solid;
  border-radius: 14px;
}
 /* Responsive Design */
 @media (max-width: 1200px) {
            .card {
                width: 100%;
                max-width: 300px; /* Slightly larger cards on medium screens */
            }
        }

        @media (max-width: 992px) {
            .card {
                width: 100%;
                max-width: 250px;
            }
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
                max-width: 200px;
                height: auto; /* Adjust height for smaller screens */
                margin: 10px;
            }

            .card h2 {
                font-size: 1.5em;
            }
        }

        @media (max-width: 576px) {
            .card {
                width: 100%;
                max-width: 100%;
                height: auto; /* Adjust height for very small screens */
                margin: 5px;
            }

            .card h2 {
                font-size: 1.2em;
            }
        }
/* button styling */
.buttonpma {
  --border-right: 6px;
  --text-stroke-color: #729762;
  --animation-color: #729762;
  --fs-size: 2em;
  letter-spacing: 3px;
  text-decoration: none;
  font-size: var(--fs-size);
  font-family: "Arial";
  position: relative;
  text-transform: uppercase;
  color: transparent;
  -webkit-text-stroke: 1px var(--text-stroke-color);
}
/* this is the text, when you hover on button */
.hover-text {
  position: absolute;
  box-sizing: border-box;
  content: attr(data-text);
  color: var(--animation-color);
  width: 0%;
  inset: 0;
  border-right: var(--border-right) solid var(--animation-color);
  overflow: hidden;
  transition: 1.5s;
  -webkit-text-stroke: 1px var(--animation-color);
  animation: r2 2s ease-in-out infinite;
}
/* hover */
.buttonpma:hover .hover-text {
  width: 100%;
  filter: drop-shadow(0 0 70px var(--animation-color))
}

@keyframes r1 {
  50% {
    /* transform: rotate(-2deg) ; */
  }
}

@keyframes r2 {
  50% {
    transform: rotateX(-65deg);
  }
}</style>
 
</head>
<body class="sb-nav-fixed" style="background-color:#E7F0DC">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#729762">
    <?php 

 require_once('./class/users.class.php');
 $users = new Users();
 $a= $users->getusersbyusername($_SESSION['username']);
// var_dump($result);exit;
    ?> 
  <a class="navbar-brand ps-3" href="../weblevel3/client/index.php">
<img src="./assets/img/logo.png-Photoroom.png" class="img-fluid" width="90px" height="60px" style="margin:50px"/></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <br><?php foreach($a as $key){?>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="./client/assets/images/<?php echo $key['image'];}?>" class="rounded-circle" height="50px" width="50px"></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <style>
/* Media query for phones */
@media (max-width: 576px) {
  .navbar {
    display: flex;
    justify-content: space-between; /* Align logo to the left and toggle to the right */
  }

  .navbar-brand {
    order: 1; /* Place the logo on the left */
  }

  .navbar-toggler {
    order: 2; /* Place the toggle button on the right */
  }

  .navbar-nav {
    order: 3; /* Place the user icon and menu on the right */
  }

  .navbar-nav .nav-item {
    margin-left: auto; /* Push the user icon to the far right */
  }
}</style>
    </nav>
    <div id="layoutSidenav">
        <?php require('common/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <p class="mt-1" style="color:#729762;text-align:center;text-shadow:2px 2px 5px white;" >
                    <button data-text="Awesome" class="buttonpma">
    <span class="actual-text">&nbsp;Dashboard&nbsp;</span>
    <span class="hover-text" aria-hidden="true">&nbsp;Dashboard&nbsp;</span>
</button><p>
                    
                    
                    <br>
                    <div class="countainer-fluid "style="box-shadow:5px 5px 5px 5px white" >
                        <div class="row">
                            <div class="col-4" >
                            <div class="card">
                                <h2> <span class="counter" data-target="<?php 
                                foreach($countorders as $key){echo($key['total']);};?>">0</span></h2>
    <h2>Orders</h2>
</div>
 </div>
 <div class="col-4" >
                            <div class="card">
                                <h2> <span class="counter" data-target="<?php 
                                foreach($countcustomers as $key){echo($key['total']);};?>">0</span></h2>
    <h2>Customers</h2>
</div>
 </div>
 <div class="col-4" >
                            <div class="card">
                                <h2> <span class="counter" data-target="<?php 
                                foreach($countproducts as $key){echo($key['total']);};?>">0</span></h2>
    <h2>Products</h2>
</div>
 </div>
 
 

                    </div>
<br>
                    <div class=" mb-3">
                      <div class="row"><div class="col-12">
  <div class=" p-3" >
 
  <canvas id="myChart"></canvas>

  </div></div></div>
</div>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">TOP 4 selled Products</h2>
                <div class="chart-container">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container-fluid">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1 style="color:#729762">Recent Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                 
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Customer <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Location <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Order Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Amount <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody> <?php foreach($recent as$key){?>
                    <tr>
                        <td><?php echo $key['customers_id']?> </td>
                        <td><?php echo $key['customers_first_name']?><?php echo $key['customers_last_name']?> </td>
                        <td> <?php echo $key['address']?>  </td>
                        <td><?php echo $key['dateorder']?> </td>
                        <td>
                            <p class="status delivered"><?php echo $key['status']?> </p>
                        </td>
                        <td> <strong> $<?php echo $key['total']?>  </strong></td>
                    </tr>
                    <?php }?>
                  
                </tbody>
            </table>
        </section>
    </main>
    </div>
    <br>
    <div class="container-fluid">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1 style="color:#729762">Out of stock products</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                 
                    <tr>
                        <th> Product name <span class="icon-arrow">&UpArrow;</span></th>
                       
                        <th> Edit quantity <span class="icon-arrow">&UpArrow;</span></th>
                       
                    </tr>
                </thead>
                <tbody> <?php foreach($outofstock as$key){?>
                    <tr>
                        <td><?php echo $key['products_name']?> </td>
                    
                        <td>
                           <a href="update_form_products.php?id=<?php echo $key['products_id']?> " ><p class="status delivered">Restock </p></a>
                        </td>
                     
                    </tr>
                    <?php }?>
                  
                </tbody>
            </table>
        </section>
    </main>
    </div>
  </div></div></main></div>
</div></body></html>
                    <style>
                     .card {
                        margin: 20px;
  width: 260px;
  height: 150px;
  background: white;
  position: relative;
  display: flex;
  place-content: center;
  place-items: center;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: 20px 20px 60px #729762, -20px -20px 60px #729762;
}

.card h2 {
  z-index: 1;
  color: white;
  font-size: 2em;
}

.card::before {
  content: '';
  position: absolute;
  width: 130px;
  background-image: linear-gradient(180deg,#729762,#729762);
  height: 190%;
  animation: rotBGimg 3s linear infinite;
  transition: all 0.2s linear;
}

@keyframes rotBGimg {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

.card::after {
  content: '';
  position: absolute;
  background: #729762;
  ;
  inset: 5px;
  border-radius: 15px;
}  
/* .card:hover:before {
  background-image: linear-gradient(180deg, rgb(81, 255, 0), purple);
  animation: rotBGimg 3.5s linear infinite;
} *//* Responsive Design: Stacking cards in a column for smaller screens */


/* Ensure the cards stack vertically on smaller screens */
@media (max-width: 768px) {
  .col-4{
  width:700px;
  }
  .row {
    flex-direction: column; /* Stack rows vertically */
  }
}


</style>

<script>
    
  
function startCounters(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const counterElement = entry.target;
      const targetValue = parseInt(counterElement.dataset.target);
      const duration = 2000; // Duration in milliseconds
      const stepTime = Math.floor(duration / targetValue);
      let currentValue = 0;
      const counterInterval = setInterval(() => {
        currentValue++;
        counterElement.textContent = currentValue;
        if (currentValue === targetValue) {
          clearInterval(counterInterval);
        }
      }, stepTime);
      observer.unobserve(counterElement);
    }
  });
}

const counterElements = document.querySelectorAll('.counter');
const observer = new IntersectionObserver(startCounters, { threshold: 0.5 });

counterElements.forEach(counterElement => {
  observer.observe(counterElement);
});
</script>
<script>
  // Assuming you have PHP variables for JSON data
  const categories = <?php echo $categoriesJson; ?>;
  const productCounts = <?php echo $productCountsJson; ?>;

  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: categories,
      datasets: [{
        label: 'Number of Products',
        data: productCounts,
        backgroundColor: '#729762',
        borderColor: '#4a5e43',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: '#e3e3e3',
            borderColor: '#e3e3e3',
            borderWidth: 1,
          },
          ticks: {
            color: '#333',
            font: {
              size: 14,
            }
          },
          title: {
            display: true,
            text: 'Number of Products',
            color: '#333',
            font: {
              size: 16,
              weight: 'bold'
            }
          }
        },
        x: {
          grid: {
            display: false,
          },
          ticks: {
            color: '#333',
            font: {
              size: 14,
            }
          },
          title: {
            display: true,
            text: 'Categories',
            color: '#333',
            font: {
              size: 16,
              weight: 'bold'
            }
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            color: '#333',
          }
        }
      }
    }
  });
</script>
<script>
// script.js

document.addEventListener('DOMContentLoaded', function () {
  // Assuming PHP variables for JSON data
  const products = <?php echo $productsJson; ?>;
  const count = <?php echo $countJson; ?>;
  
  var ctx = document.getElementById('myPieChart').getContext('2d');
  
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: products,
          datasets: [{
              label: 'Customer Distribution',
              data: count, // Replace with your data
              backgroundColor: [
                  '#729762', // Base color
                  '#6a8b4b', // Darker shade
                  '#8dbf6e', // Lighter shade
                  '#a9d09f'  // Even lighter shade
              ],
              borderColor: '#fff',
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'top',
              },
              tooltip: {
                  callbacks: {
                      label: function(tooltipItem) {
                          return tooltipItem.label + ': ' + tooltipItem.raw;
                      }
                  }
              }
          }
      }
  });
});
</script>

<?php require('common/script.php')?>

<script>
  /**
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ @Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
*/

const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

// 3. Converting HTML table to PDF

const pdf_btn = document.querySelector('#toPDF');
const customers_table = document.querySelector('#customers_table');


const toPDF = function (customers_table) {
    const html_code = `
    <!DOCTYPE html>
    <link rel="stylesheet" type="text/css" href="style.css">
    <main class="table" id="customers_table">${customers_table.innerHTML}</main>`;

    const new_window = window.open();
     new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
}

pdf_btn.onclick = () => {
    toPDF(customers_table);
}

// 4. Converting HTML table to JSON

const json_btn = document.querySelector('#toJSON');

const toJSON = function (table) {
    let table_data = [],
        t_head = [],

        t_headings = table.querySelectorAll('th'),
        t_rows = table.querySelectorAll('tbody tr');

    for (let t_heading of t_headings) {
        let actual_head = t_heading.textContent.trim().split(' ');

        t_head.push(actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase());
    }

    t_rows.forEach(row => {
        const row_object = {},
            t_cells = row.querySelectorAll('td');

        t_cells.forEach((t_cell, cell_index) => {
            const img = t_cell.querySelector('img');
            if (img) {
                row_object['customer image'] = decodeURIComponent(img.src);
            }
            row_object[t_head[cell_index]] = t_cell.textContent.trim();
        })
        table_data.push(row_object);
    })

    return JSON.stringify(table_data, null, 4);
}

json_btn.onclick = () => {
    const json = toJSON(customers_table);
    downloadFile(json, 'json')
}

// 5. Converting HTML table to CSV File

const csv_btn = document.querySelector('#toCSV');

const toCSV = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join(',');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join(',') + ',' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.replace(/,/g, ".").trim()).join(',');

        return data_without_img + ',' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

csv_btn.onclick = () => {
    const csv = toCSV(customers_table);
    downloadFile(csv, 'csv', 'customer orders');
}

// 6. Converting HTML table to EXCEL File

const excel_btn = document.querySelector('#toEXCEL');

const toExcel = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join('\t');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join('\t') + '\t' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.trim()).join('\t');

        return data_without_img + '\t' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'excel');
}

const downloadFile = function (data, fileType, fileName = '') {
    const a = document.createElement('a');
    a.download = fileName;
    const mime_types = {
        'json': 'application/json',
        'csv': 'text/csv',
        'excel': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    }
    a.href = `
        data:${mime_types[fileType]};charset=utf-8,${encodeURIComponent(data)}
    `;
    document.body.appendChild(a);
    a.click();
    a.remove();
}
</script>