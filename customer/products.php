<!doctype html>
<html class="no-js" lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />



<?php

include 'includes/header.php';

?>


<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>

    <?php
    //include'top_menu_bar_login.php';
    ?>
    <!--offcanvas menu area end-->

    <?php
    include 'includes/header_profile.php';
    if (!isset($_SESSION["uid"])) {
        header("location:customer_login.php");
    }
    ?>

    <!--header area end-->

    <div class="product_page_bg">
        <div class="container">
            <script src="assets/functio/A_function.js"></script>
            <section class="product_area upsell_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title title_style2">
                            <div class="title_content">
                                <h2><span>Upsell</span> Products</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6" id="product_msg">
                    </div>
                </div>
                <div class="row">
                    <div class="product_carousel product_details_column5 owl-carousel">
                        <?php
                        include "db/db.php";
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $sql = mysqli_query($con, "SELECT * FROM products WHERE product_title LIKE '%$search%' OR product_cat LIKE '%$search%' OR product_brand LIKE '%$search%' OR vendor_name LIKE '%$search'  OR product_qty LIKE '%$search' OR product_price LIKE '%$search' ");
                        } elseif (isset($_GET['category'])) {
                            $cat_title = $_GET['category'];
                            $sql = mysqli_query($con, "SELECT * FROM products WHERE product_cat = '$cat_title' ");
                        } else {
                            //where product_condition='old'
                            $sql = mysqli_query($con, " SELECT * FROM products ");

                            if (mysqli_num_rows($sql) > 0) {
                                while ($row = mysqli_fetch_array($sql)) {
                                    $pro_id    = $row['product_id'];
                                    $pro_cat   = $row['product_cat'];
                                    $pro_brand = $row['product_brand'];
                                    $pro_title = $row['product_title'];
                                    $pro_price = $row['product_price'];
                                    $pro_image = $row['product_image'];
                                    $product_desc = $row['product_desc'];
                                    $su = ($pro_price * 105) / 100;
                                    $percent = ($su - $pro_price) / $pro_price * 100;
                        ?>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img"
                                            href="product_details_v.php?pro_id=<?php echo $row['product_id']; ?>">
                                            <img src="../seller/images/products/<?php echo $row['product_image'] ?>"
                                                alt="Product Image" /></a>
                                        <div class="label_product">
                                            <span class="label_sale"><?php echo $percent; ?>%</span>
                                        </div>
                                        <div class="quick_button">
                                            <a href="product_details_v.php?<?php echo $row['product_id']; ?>"
                                                data-bs-toggle="modal" data-bs-target="#modal_box" title="quick 
view"><i class="icon-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_content_inner">
                                            <p class="manufacture_product"><a
                                                    href="product_details_v.php?idp01=<?php echo $row['product_id']; ?>">View
                                                    More</a>
                                            </p>
                                            <h4 class="product_name"><a
                                                    href="product_details_v.php?idp01=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a>
                                            </h4>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></ li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></ li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></ li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></ li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></ li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="old_price">Rs <?php echo $su; ?></span>
                                                <span class="current_price">Rs <?php echo $pro_price; ?></span>
                                            </div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li>
                                                    <?php if ($row['status'] == '1') {
                                                                ?>
                                                    <button pid="<?php echo $pro_id; ?>" id="product"
                                                        class="btn btn-primary">Add To Cart </button>
                                                    <?php } else { ?>
                                                    <button id="product" class="btn btn alert-danger">Out of Stock
                                                    </button>
                                                    <?php } ?>
                                                <li class="wishlist"><a
                                                        href="wishlist_add.php?proid=<?php echo $row['product_id']; ?>"
                                                        title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <?php }
                            } else { ?>
                        <h3 class="alert-danger"> Search results not found</h3>

                        <?php   }
                        }   ?>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <!--footer area start-->
    <?php
    include 'includes/footer.php';
    ?>
    <!--footer area end-->
    <!-- JS
========================================= -->
    <!-- Plugins JS -->
    <script src="../assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>