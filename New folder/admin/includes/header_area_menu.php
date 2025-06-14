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
                                <?php if (!isset($_SESSION['name'])) {
                                ?>
                                    <li><a href="../index.php">
                                            <-- Back Home</a>
                                    </li>
                                    <li><a href="seller_login.php">Login</a></li>
                                    <li><a href="seller_register.php">Register</a></li>';
                                <?php } ?>
                                <?php
                                require_once('db/db.php');
                                if (isset($_SESSION['uid'])) {
                                    $userid = $_SESSION['uid'];
                                }

                                $query = mysqli_query($con, " SELECT * FROM vendor WHERE vendor_id = '$userid'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>


                                    <li><a href="profile.php"><?php echo $row['first_name'] . $row['last_name'] ?></a></li>
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
                            <div class="categories_title">
                                <h2 class="categori_toggle">ALL CATEGORIES</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li><a class="active" href="index.php">home</a></li>
                                    <li><a href="product.php">Products</a></li>
                                    <li><a href="orders.php">Orders</a></li>
                                    <li><a href="profile.php">Profile</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main_menu menu_position text-left">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php">home</a></li>
                                    <li><a href="product.php">Products</a></li>
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