<?php 
session_start();
require_once('./class/customers.class.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
$customers = new Customers();
$result= $customers->getCustomersorders($id);}
// var_dump($result);exit;
 ?>
<!DOCTYPE html>
<html lang="en">
    <head><?php require('common/header.php');?>
    <style>/* Design Inspired by one of Stefan Devai's Design on Dribble */

.main_wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30em;
  height: 20em;
}

.main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 5em;
}

.antenna {
  width: 5em;
  height: 5em;
  border-radius: 50%;
  border: 2px solid black;
  background-color: #f27405;
  margin-bottom: -6em;
  margin-left: 0em;
  z-index: -1;
}
.antenna_shadow {
  position: absolute;
  background-color: transparent;
  width: 50px;
  height: 56px;
  margin-left: 1.68em;
  border-radius: 45%;
  transform: rotate(140deg);
  border: 4px solid transparent;
  box-shadow: inset 0px 16px #a85103, inset 0px 16px 1px 1px #a85103;
  -moz-box-shadow: inset 0px 16px #a85103, inset 0px 16px 1px 1px #a85103;
}
.antenna::after {
  content: "";
  position: absolute;
  margin-top: -9.4em;
  margin-left: 0.4em;
  transform: rotate(-25deg);
  width: 1em;
  height: 0.5em;
  border-radius: 50%;
  background-color: #f69e50;
}
.antenna::before {
  content: "";
  position: absolute;
  margin-top: 0.2em;
  margin-left: 1.25em;
  transform: rotate(-20deg);
  width: 1.5em;
  height: 0.8em;
  border-radius: 50%;
  background-color: #f69e50;
}
.a1 {
  position: relative;
  top: -102%;
  left: -130%;
  width: 12em;
  height: 5.5em;
  border-radius: 50px;
  background-image: linear-gradient(
    #171717,
    #171717,
    #353535,
    #353535,
    #171717
  );
  transform: rotate(-29deg);
  clip-path: polygon(50% 0%, 49% 100%, 52% 100%);
}
.a1d {
  position: relative;
  top: -211%;
  left: -35%;
  transform: rotate(45deg);
  width: 0.5em;
  height: 0.5em;
  border-radius: 50%;
  border: 2px solid black;
  background-color: #979797;
  z-index: 99;
}
.a2 {
  position: relative;
  top: -210%;
  left: -10%;
  width: 12em;
  height: 4em;
  border-radius: 50px;
  background-color: #171717;
  background-image: linear-gradient(
    #171717,
    #171717,
    #353535,
    #353535,
    #171717
  );
  margin-right: 5em;
  clip-path: polygon(
    47% 0,
    47% 0,
    34% 34%,
    54% 25%,
    32% 100%,
    29% 96%,
    49% 32%,
    30% 38%
  );
  transform: rotate(-8deg);
}
.a2d {
  position: relative;
  top: -294%;
  left: 94%;
  width: 0.5em;
  height: 0.5em;
  border-radius: 50%;
  border: 2px solid black;
  background-color: #979797;
  z-index: 99;
}

.notfound_text {
  background-color: black;
  padding-left: 0.3em;
  padding-right: 0.3em;
  font-size: 0.75em;
  color: white;
  letter-spacing: 0;
  border-radius: 5px;
  z-index: 10;
}
.tv {
  width: 17em;
  height: 9em;
  margin-top: 3em;
  border-radius: 15px;
  background-color: #d36604;
  display: flex;
  justify-content: center;
  border: 2px solid #1d0e01;
  box-shadow: inset 0.2em 0.2em #e69635;
}
.tv::after {
  content: "";
  position: absolute;
  width: 17em;
  height: 9em;
  border-radius: 15px;
  background: repeating-radial-gradient(#d36604 0 0.0001%, #00000070 0 0.0002%)
      50% 0/2500px 2500px,
    repeating-conic-gradient(#d36604 0 0.0001%, #00000070 0 0.0002%) 60% 60%/2500px
      2500px;
  background-blend-mode: difference;
  opacity: 0.09;
}
.curve_svg {
  position: absolute;
  margin-top: 0.25em;
  margin-left: -0.25em;
  height: 12px;
  width: 12px;
}
.display_div {
  display: flex;
  align-items: center;
  align-self: center;
  justify-content: center;
  border-radius: 15px;
  box-shadow: 3.5px 3.5px 0px #e69635;
}
.screen_out {
  width: auto;
  height: auto;

  border-radius: 10px;
}
.screen_out1 {
  width: 11em;
  height: 7.75em;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
}
.screen {
  width: 13em;
  height: 7.85em;
  font-family: Montserrat;
  border: 2px solid #1d0e01;
  background: repeating-radial-gradient(#000 0 0.0001%, #ffffff 0 0.0002%) 50% 0/2500px
      2500px,
    repeating-conic-gradient(#000 0 0.0001%, #ffffff 0 0.0002%) 60% 60%/2500px
      2500px;
  background-blend-mode: difference;
  animation: b 0.2s infinite alternate;
  border-radius: 10px;
  z-index: 99;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: #252525;
  letter-spacing: 0.15em;
  text-align: center;
}
@keyframes b {
  100% {
    background-position: 50% 0, 60% 50%;
  }
}

/* Another Error Screen to Use 

.screen {
  width: 13em;
  height: 7.85em;
  position: relative;
  background: linear-gradient(to right, #002fc6 0%, #002bb2 14.2857142857%, #3a3a3a 14.2857142857%, #303030 28.5714285714%, #ff0afe 28.5714285714%, #f500f4 42.8571428571%, #6c6c6c 42.8571428571%, #626262 57.1428571429%, #0affd9 57.1428571429%, #00f5ce 71.4285714286%, #3a3a3a 71.4285714286%, #303030 85.7142857143%, white 85.7142857143%, #fafafa 100%);
  border-radius: 10px;
  border: 2px solid black;
  z-index: 99;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: #252525;
  letter-spacing: 0.15em;
  text-align: center;
  overflow: hidden;
}
.screen:before, .screen:after {
  content: "";
  position: absolute;
  left: 0;
  z-index: 1;
  width: 100%;
}
.screen:before {
  top: 0;
  height: 68.4782608696%;
  background: linear-gradient(to right, white 0%, #fafafa 14.2857142857%, #ffe60a 14.2857142857%, #f5dc00 28.5714285714%, #0affd9 28.5714285714%, #00f5ce 42.8571428571%, #10ea00 42.8571428571%, #0ed600 57.1428571429%, #ff0afe 57.1428571429%, #f500f4 71.4285714286%, #ed0014 71.4285714286%, #d90012 85.7142857143%, #002fc6 85.7142857143%, #002bb2 100%);
}
.screen:after {
  bottom: 0;
  height: 21.7391304348%;
  background: linear-gradient(to right, #006c6b 0%, #005857 16.6666666667%, white 16.6666666667%, #fafafa 33.3333333333%, #001b75 33.3333333333%, #001761 50%, #6c6c6c 50%, #626262 66.6666666667%, #929292 66.6666666667%, #888888 83.3333333333%, #3a3a3a 83.3333333333%, #303030 100%);
}

  */

.lines {
  display: flex;
  column-gap: 0.1em;
  align-self: flex-end;
}
.line1,
.line3 {
  width: 2px;
  height: 0.5em;
  background-color: black;
  border-radius: 25px 25px 0px 0px;
  margin-top: 0.5em;
}
.line2 {
  flex-grow: 1;
  width: 2px;
  height: 1em;
  background-color: black;
  border-radius: 25px 25px 0px 0px;
}

.buttons_div {
  width: 4.25em;
  align-self: center;
  height: 8em;
  background-color: #e69635;
  border: 2px solid #1d0e01;
  padding: 0.6em;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  row-gap: 0.75em;
  box-shadow: 3px 3px 0px #e69635;
}
.b1 {
  width: 1.65em;
  height: 1.65em;
  border-radius: 50%;
  background-color: #7f5934;
  border: 2px solid black;
  box-shadow: inset 2px 2px 1px #b49577, -2px 0px #513721,
    -2px 0px 0px 1px black;
}
.b1::before {
  content: "";
  position: absolute;
  margin-top: 1em;
  margin-left: 0.5em;
  transform: rotate(47deg);
  border-radius: 5px;
  width: 0.1em;
  height: 0.4em;
  background-color: #000000;
}
.b1::after {
  content: "";
  position: absolute;
  margin-top: 0.9em;
  margin-left: 0.8em;
  transform: rotate(47deg);
  border-radius: 5px;
  width: 0.1em;
  height: 0.55em;
  background-color: #000000;
}
.b1 div {
  content: "";
  position: absolute;
  margin-top: -0.1em;
  margin-left: 0.65em;
  transform: rotate(45deg);
  width: 0.15em;
  height: 1.5em;
  background-color: #000000;
}
.b2 {
  width: 1.65em;
  height: 1.65em;
  border-radius: 50%;
  background-color: #7f5934;
  border: 2px solid black;
  box-shadow: inset 2px 2px 1px #b49577, -2px 0px #513721,
    -2px 0px 0px 1px black;
}
.b2::before {
  content: "";
  position: absolute;
  margin-top: 1.05em;
  margin-left: 0.8em;
  transform: rotate(-45deg);
  border-radius: 5px;
  width: 0.15em;
  height: 0.4em;
  background-color: #000000;
}
.b2::after {
  content: "";
  position: absolute;
  margin-top: -0.1em;
  margin-left: 0.65em;
  transform: rotate(-45deg);
  width: 0.15em;
  height: 1.5em;
  background-color: #000000;
}
.speakers {
  display: flex;
  flex-direction: column;
  row-gap: 0.5em;
}
.speakers .g1 {
  display: flex;
  column-gap: 0.25em;
}
.speakers .g1 .g11,
.g12,
.g13 {
  width: 0.65em;
  height: 0.65em;
  border-radius: 50%;
  background-color: #7f5934;
  border: 2px solid black;
  box-shadow: inset 1.25px 1.25px 1px #b49577;
}
.speakers .g {
  width: auto;
  height: 2px;
  background-color: #171717;
}

.bottom {
  width: 100%;
  height: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  column-gap: 8.7em;
}
.base1 {
  height: 1em;
  width: 2em;
  border: 2px solid #171717;
  background-color: #4d4d4d;
  margin-top: -0.15em;
  z-index: -1;
}
.base2 {
  height: 1em;
  width: 2em;
  border: 2px solid #171717;
  background-color: #4d4d4d;
  margin-top: -0.15em;
  z-index: -1;
}
.base3 {
  position: absolute;
  height: 0.15em;
  width: 17.5em;
  background-color: #171717;
  margin-top: 0.8em;
}

.text_404 {
  position: absolute;
  display: flex;
  flex-direction: row;
  column-gap: 6em;
  z-index: -5;
  margin-bottom: 2em;
  align-items: center;
  justify-content: center;
  opacity: 0.5;
  font-family: Montserrat;
}
.text_4041 {
  transform: scaleY(24.5) scaleX(9);
}
.text_4042 {
  transform: scaleY(24.5) scaleX(9);
}
.text_4043 {
  transform: scaleY(24.5) scaleX(9);
}
</style>

    <!-- Include SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
    <body class="sb-nav-fixed"  style="background-color:#E7F0DC">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#729762">
        <?php require('common/navbar copy.php');?>
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
                            <li class="breadcrumb-item acitve">Orders</li>
                        </ol>
                    
                    
                        </div>
                        

                        <?php if($result==null){?>
                            <div class="container-fluid">
                                    <div class="main_wrapper">
  <div class="main">
    <div class="antenna">
      <div class="antenna_shadow"></div>
      <div class="a1"></div>
      <div class="a1d"></div>
      <div class="a2"></div>
      <div class="a2d"></div>
      <div class="a_base"></div>
    </div>
    <div class="tv">
      <div class="cruve">
        <svg
          xml:space="preserve"
          viewBox="0 0 189.929 189.929"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          xmlns="http://www.w3.org/2000/svg"
          version="1.1"
          class="curve_svg"
        >
          <path
            d="M70.343,70.343c-30.554,30.553-44.806,72.7-39.102,115.635l-29.738,3.951C-5.442,137.659,11.917,86.34,49.129,49.13
        C86.34,11.918,137.664-5.445,189.928,1.502l-3.95,29.738C143.041,25.54,100.895,39.789,70.343,70.343z"
          ></path>
        </svg>
      </div>
      <div class="display_div">
        <div class="screen_out">
          <div class="screen_out1">
            <div class="screen">
              <span class="notfound_text"> NO ORDERS  FOUND</span>
            </div>
          </div>
        </div>
      </div>
      <div class="lines">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <div class="buttons_div">
        <div class="b1"><div></div></div>
        <div class="b2"></div>
        <div class="speakers">
          <div class="g1">
            <div class="g11"></div>
            <div class="g12"></div>
            <div class="g13"></div>
          </div>
          <div class="g"></div>
          <div class="g"></div>
        </div>
      </div>
    </div>
    <div class="bottom">
      <div class="base1"></div>
      <div class="base2"></div>
      <div class="base3"></div>
    </div>
  </div>
  <div class="text_404">
    <div class="text_4041">4</div>
    <div class="text_4042">0</div>
    <div class="text_4043">4</div>
  </div>
</div></div>

                               <?php }else{?>

                        <div class="card mb-4"  >
                            
                            <div class="card-body">
                               
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr>

                                            <th>Full Name</th> 
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Zipcode</th>
                                            <th>Address</th>
                                            <th>Date order</th>
                                      
                                            <th>Total</th>
                                          <th>Status</th>
                                          <th>Discount</th>
                                          <th>Shipping</th>
                                            <th>View orders information</th>
                                            <th>Update Status</th>
                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                   
                                
                                
                                </td>
                                        <?php 
                                       
                                        foreach($result as $key){
                                            ?>
                                           <tr>
                                           <td><?php echo $key['name'];?></td>
                                           <td><?php echo $key['country'];?></td>
                                           <td><?php echo $key['city'];?></td>
                                           <td><?php echo $key['zipcode'];?></td>
                                           <td><?php echo $key['address'];?></td>
                                           <td><?php echo $key['dateorder'];?></td>
                                        
                                           <td>$<?php echo $key['total'];?></td>
                                           <td><?php echo $key['status'];?></td>
                                           <td><?php echo $key['discount'];?>%</td>
                                           <td>$<?php echo $key['shipping'];?></td>
                                         
                                             

                                            <td><a href="customers_orders_items.php?id=<?php echo $key['orders_id']?>"><i class="fa-solid fa-eye" style="color:#729762"></i></a></td>
                                            
                                            <td>
                    <form class="update-status-form" id="updatestat" action="update_status.php">
                        <input type="hidden" name="order_id" value="<?php echo $key['orders_id']; ?>">
                        <select name="new_status" required>
                            <option value="In progress" <?php echo ($key['status'] == 'In progress') ? 'selected' : ''; ?>>In progress</option>
                            <option value="Shipped" <?php echo ($key['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                            <option value="Delivered" <?php echo ($key['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                            <option value="Cancelled" <?php echo ($key['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                        <button type="submit" class="update-status-btn">Update</button>
                    </form>
                </td>
                                            <?php }?>
                                          </tr>

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
     <?php }?>
    </body>
</html>


    <?php require('common/script.php')?>
  

    <script>
$(document).ready(function() {
    $('#updatestat').submit(function(e) {
        e.preventDefault();

        var form = new FormData(this);

        $.ajax({
          url: "actions/update_status.php",
           
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: form,
            success: function(response) {
                console.log(response); // Log the response for debugging

                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#739072',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    }).then(function() {
                        window.location.href = 'customers.php';
                    });
                } else {
                    Swal.fire({
                        icon: response.status === 'error' ? 'warning' : 'error',
                        title: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#739072',
                        customClass: {
                            confirmButton: '#739072'
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log the full error response
                Swal.fire({
                    icon: 'error',
                    title: 'An error occurred',
                    text: xhr.responseText,
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#739072',
                    customClass: {
                        confirmButton: '#739072'
                    }
                });
            }
        });
    });
});</script>