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

    <!--slider area start-->
    <section class="slider_section mb-80">
        <div class="slider_area slider_carousel owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>Big sale off <span>Gas Orders</span></h1>
                                <p>Exclusive Offer -30% Off This Week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content center">
                                <h1> Free Delivery <span>Exclusive Country Wide</span></h1>
                                <p>Free Delivery Offer for every products purchased </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>High-end <span>New Gas Orders</span> </h1>
                                <p>Exclusive Offer -20% Off This Week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--banner area start-->
    <div class="banner_area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="welcome_title">
                        <h3>WELCOME TO LARRY ENERGIES</h3>
                        <h2>CUSTOM <span>SHOPPING GAS STORE ONLINE</span></h2>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--banner area end-->

    <!--search box -->
    <div class="panel-body">
        <div id="show_p">

        </div>

    </div>



    <?php
    //include'paglink.php';
    ?>



    <!--home section bg area start-->

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
                        //where product_condition='old'
                        $product_query2 = " SELECT * FROM products ";
                        $run_query2 = mysqli_query($con, $product_query2);
                        if (mysqli_num_rows($run_query2) > 0) {
                            while ($row = mysqli_fetch_array($run_query2)) {
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
                                            href="product_details_v.php?idp01=<?php echo $row['product_id']; ?>">
                                            <img src="seller/images/products/<?php echo $row['product_image'] ?>"
                                                alt="Product Image" /></a>
                                        <div class="label_product">
                                            <span class="label_sale"><?php echo $percent; ?>%</span>
                                        </div>
                                        <div class="quick_button">
                                            <a href="product_details_v.php?<?php echo $row['product_id']; ?>"
                                                data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"><i
                                                    class="icon-eye"></i></a>
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
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <div class="price_box">
                                                    <span class="old_price">Rs <?php echo $su; ?></span>
                                                    <span class="current_price">Rs <?php echo $pro_price; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li>
                                                    <?php if ($row['status'] ==  '1') {
                                                            ?>
                                                    <button pid="<?php echo $pro_id; ?>" id="product"
                                                        class="btn btn-primary">Add To Cart </button>
                                                    <?php } else { ?>
                                                    <button id="product" class="btn btn alert-danger">Out of Stock
                                                    </button>
                                                    <?php } ?>

                                                <li class="wishlist"><a href="customer/wishlist_add.php"
                                                        title="Add to Wishlist"><i class="icon-heart"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>

                        <?php    }
                        }   ?>



                    </div>
                </div>
            </section>







        </div>
    </div>


    <!--home section bg area end-->

    <!--brand area start-->

    <?php
    include 'customer/brandarea.php';
    ?>


    <!--brand area end-->


    <!--footer area start-->

    <?php
    include 'includes/footer.php';
    ?>
    <!--footer area end-->



    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



</body>


</html>