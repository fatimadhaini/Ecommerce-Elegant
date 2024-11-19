<?php 
require_once('./class/customers.class.php');
$id=$_GET['id'];
$customers = new Customers();
$result= $customers->getCustomersordersitems($id);
//  var_dump($result);exit;
 ?>
<!DOCTYPE html>
<html lang="en">
    <head><?php require('common/header.php');?>
  
    </head>
    <body class="sb-nav-fixed"  style="background-color:#E7F0DC">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#729762">
        <?php require('common/navbar.php');?>
        </nav>
        <div id="layoutSidenav">
          <?php require('common/sidebar.php');?>
          <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Orders</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item ">
                                <a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item ">
                                <a href="categories.php">Categories</a></li>
                                <li class="breadcrumb-item ">
                                <a href="products.php">Products</a></li>
                                <li class="breadcrumb-item ">
                                <a href="users.php">Users</a></li>
                                <li class="breadcrumb-item ">
                                <a href="home.php">Home</a></li>
                                <li class="breadcrumb-item ">
                                <a href="about.php">About</a></li>
                                <li class="breadcrumb-item ">
                                <a href="customers.php">Customers</a></li>
                                <li class="breadcrumb-item ">
                                <a href="customers_orders.php">Order</a></li>
                            <li class="breadcrumb-item acitve">Orders details</li>
                        </ol>
                    
                    
                        </div>
                        


                        <div class="card mb-4"  >
                            
                            <div class="card-body">
                               
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr>

                                            <th>Product name</th> 
                                            <th>Products_price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                           
                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                   
                                
                                
                                </td>
                                        <?php 
                                       
                                        foreach($result as $key){
                                            ?>
                                           <tr>
                                           <td><?php echo $key['name'];?></td>
                                           <td><?php echo $key['price'];?></td>
                                           <td><?php echo $key['quantity'];?></td>
                                           <td><?php echo $key['sub_total'];?></td>

                                            <?php }?></tr>

                                    </tbody>
                                </table>
                            </div></div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                 <?php require('common/footer.php')?>
                </footer>
            </div>
        </div>
    </body>
</html>


    <?php require('common/script.php')?>
  