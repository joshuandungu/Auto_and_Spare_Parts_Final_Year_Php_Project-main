<?php
require_once "../db/db.php";
session_start();

if (!isset($_SESSION["uid"])) {
    header('location: customer_login.php');
} elseif (isset($_SESSION["uid"])) {
    $id_c = $_SESSION["uid"];
}
//When user is logged in then we will count number of item in cart by using user session id
?>
<header>
    <div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-5">
                        <div class="header_account text-right">
                            <ul>
                                <li class="language"><a href="#" data-toggle="dropdown"><span
                                            class=" glyphicon glyphicon-user"></span><?php if (isset($_SESSION["uid"])) {
                                                                                            echo "Hi," . $_SESSION["name"];
                                                                                        } ?><i
                                            class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_language">

                                        <li><a href="customer_order_view.php"><b>Orders Track Process </b></a></li>
                                        <li class="divider"></li>
                                        <li><a href="Customer_pass_change.php"><b>Profile Update</b></a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php"><b>Logout</b></a></li>


                                    </ul>
                                </li>

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
                                ENERGIES</a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <div class="header_right_box">
                            <div class="search_container">
                                <form action="products.php" method="GET">

                                    <div class="search_box">
                                        <input type="text" placeholder="Search product..." type="text">
                                        <button type="submit" name="search">Search</button>
                                    </div>
                                </form>
                            </div>

                            <div class="header_configure_area">
                                <div class="header_wishlist">
                                    <a href="wishlist_profile.php"><i class="icon-heart"></i>
                                        <!--
                                            <span class="wishlist_count">3</span>
-->

                                    </a>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)">
                                        <i class="icon-shopping-bag2"></i>
                                        <?php
                                        $id_c = $_SESSION["uid"];
                                        $a = 0;
                                        $ct_p = 0;
                                        $data = "SELECT * FROM orders where user_id = '$id_c' and payment_status='cash_on_delivery' and order_status='process_order' or order_status='complete'  ";
                                        $view = mysqli_query($con, $data);
                                        while ($_view = mysqli_fetch_assoc($view)) {
                                            $id_c_pro = $_view['product_id'];
                                            $id_c_user = $_view['user_id'];
                                            $id_c_pro_qty = $_view['qty'];
                                            if (!empty($id_c_pro)) {
                                                $data2 = "SELECT * FROM products where product_id = '$id_c_pro' ";
                                                $view2 = mysqli_query($con, $data2);
                                                while ($_view2 = mysqli_fetch_assoc($view2)) {
                                                    $rs_p = $_view2['product_price'];
                                                    $S_Price = $rs_p * $id_c_pro_qty;
                                                    if (!empty($S_Price)) {
                                                        $a += $S_Price;
                                                        $ct_p++;
                                                    }
                                                }

                                                //$S_Price = $rs_p*$id_c_pro_qty;
                                                //$a=$S_Price++ ;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
                                        $query = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($query);
                                        $row["count_item"];

                                        ?>
                                        <span class="cart_count"><?php echo  $row['count_item']; ?></span>

                                        <span class="cart_price">RS <?php echo $a; ?> <i class="ion-ios-arrow-down"><a
                                                    class="active" href="Customer_cart.php">View Cart</a></i></span>

                                    </a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="mini_cart_inner">
                                            <div class="cart_close">
                                                <div class="cart_text">
                                                    <h3>cart</h3>
                                                </div>
                                                <div class="mini_cart_close">
                                                    <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                </div>
                                            </div>

                                            <hr><br>
                                            <div class="cart_button">
                                                <a class="active" href="Customer_cart.php">View Cart</a>


                                            </div>
                                            <hr>
                                            <div class="cart_button">
                                                <a href="customer_order_view.php"><b>Orders Track Process </b></a>
                                            </div>
                                            <br>
                                            <div class="cart_total">
                                                <span>Sub Total:</span>
                                                <span class="price">RS <?php echo $a;  ?></span>
                                            </div>

                                            <hr>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
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

                                    <?PHP
                                    include "db/db.php";
                                    //$selecte_id = $_SESSION["uid"];
                                    $data = "SELECT * FROM categories ";
                                    $view = mysqli_query($con, $data);
                                    while ($_view = mysqli_fetch_assoc($view)) {

                                        $cat_title = $_view['cat_title'];
                                        $cat_p_id = $_view['cat_id'];

                                    ?>

                                        <li>
                                            <a
                                                href="./products.php?category=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a>

                                        <?php
                                    }
                                        ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main_menu menu_position text-left">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php">home</a></li>
                                    <li><a class="active" href="products.php">Products</a></li>
                                    <li><a class="active" href="vendors.php">Vendors</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php"> Contact Us</a></li>
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
<script type="text/javascript" src="login/Seller/dist/js/site.min.js"></script>