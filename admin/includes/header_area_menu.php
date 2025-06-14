<header>
    <div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-5">
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="header_top_links text-right">
                            <ul>

                                <?php
                                session_start();
                                if (!isset($_SESSION['uid'])) {
                                ?>
                                <li><a href="../index.php">
                                        <-- Back Home</a>
                                </li>
                                <li><a href="admin_login.php">Login</a></li>
                                <li><a href="admin_register.php">Register</a></li>';
                                <?php } else { ?>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="profile.php"><?php echo $_SESSION["name"]; ?></a></li>';
                                <li><a href="logout.php">Logout</a></li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->

        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                        <div class="logo">
                            <a href="index.php" style="color: white; font-size: 3em; font-weight: bold;">LARRY
                                <br>ENERGIES </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <div class="header_right_box">
                            <div class="search_container">
                                <form method="post" onsubmit="return false">

                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text" name="search" id="search">
                                        <button type="submit" id="search_btn">Search</button>
                                    </div>


                                </form>
                            </div>

                            <div class="header_configure_area">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class=" col-lg-3">
                        <div class="categories_menu">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main_menu menu_position text-left">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php">home</a></li>
                                    <li><a href="category.php">All Categories</a></li>
                                    <li><a href="brands.php">All Brands</a></li>
                                    <li><a href="gas_weight.php">Gas Weights</a></li>
                                    <li><a href="all_users.php">Customers</a></li>
                                    <li><a href="all_vendors.php">Vendors</a></li>
                                    <li><a href="all_products.php">Products</a></li>
                                    <li><a href="orders.php">Orders</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--header bottom end-->
    </div>
</header>