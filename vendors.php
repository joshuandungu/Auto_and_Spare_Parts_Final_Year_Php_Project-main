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
    include 'includes/header_area_menu.php';
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
                                <h2><span>Gas </span> Vendors</h2>
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

                        $sql = mysqli_query($con, " SELECT * FROM vendor ");

                        if (mysqli_num_rows($sql) > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img"
                                            href="vendor_details_v.php?idp01=<?php echo $row['vendor_id']; ?>">
                                            <img src="seller/images/vendor_logo/<?php echo $row['vendor_logo'] ?>"
                                                alt="Vendor Logo Image" /></a>
                                        <div class="quick_button">
                                            <a href="vendor_details_v.php?<?php echo $row['vendor_id']; ?>"
                                                data-bs-toggle="modal" data-bs-target="#modal_box" title="quick 
view"><i class="icon-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_content_inner">
                                            <p class="manufacture_product"><a
                                                    href="vendor_details_v.php?idp01=<?php echo $row['vendor_id']; ?>">View
                                                    More</a>
                                            </p>
                                            <h4 class="product_name"><a
                                                    href="vendor_details_v.php?idp01=<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name']; ?></a>
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
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <?php }
                        } else { ?>
                        <h3 class="alert-danger"> Search results not found</h3>

                        <?php   }
                        ?>
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
    <script src="assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>