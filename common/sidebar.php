<style>
    .nav-link.active{
        background-color:#658147;
    }
</style>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <br>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='index.php' ? 'active' : '';?> " href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='categories.php' ? 'active' : '';?> " href="categories.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                               Categories
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='coupon.php' ? 'active' : '';?> " href="coupon.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Coupon code
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='products.php'|| basename($_SERVER['PHP_SELF'])=='update_form_products.php' ? 'active' : '';?> " href="products.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                               Products
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='users.php' ? 'active' : '';?> " href="users.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                              Users
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='home.php' || basename($_SERVER['PHP_SELF'])=='update_form_home.php' ? 'active' : '';?> " href="home.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney"></i></div>
                            Home page
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='about.php' || basename($_SERVER['PHP_SELF'])=='update_form_about.php' ? 'active' : '';?> " href="about.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                            About page
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='team.php' || basename($_SERVER['PHP_SELF'])=='update_form_team.php' ? 'active' : '';?> " href="team.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                            Team page
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='contact.php' || basename($_SERVER['PHP_SELF'])=='contact.php' ? 'active' : '';?> " href="contact.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cloud"></i></div>
                            Contact page
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='customers.php' || basename($_SERVER['PHP_SELF'])=='customers_orders.php' || basename($_SERVER['PHP_SELF'])=='customers_orders_items.php' ? 'active' : '';?> " href="customers.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                             Customers
                            </a>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='orders.php' || basename($_SERVER['PHP_SELF'])=='orders_items.php'  ? 'active' : '';?> " href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                             Orders
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                
                </nav>
            </div>
          
                      