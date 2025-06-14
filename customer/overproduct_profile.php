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
                    $product_query2 = "SELECT * FROM products  ";
                    $run_query2 = mysqli_query($con, $product_query2);
                    if (mysqli_num_rows($run_query2) > 0) {
                        while ($roww = mysqli_fetch_array($run_query2)) {
                            $pro_id    = $roww['product_id'];
                            $pro_cat   = $roww['product_cat'];
                            $pro_brand = $roww['product_brand'];
                            $pro_title = $roww['product_title'];
                            $pro_price = $roww['product_price'];
                            $pro_image = $roww['product_image'];
                            $product_desc = $roww['product_desc'];
                            $su = ($pro_price * 5) / 100;
                            $per = $su + $pro_price;


                    ?>



                            <div class="col-lg-3">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img"
                                                href="product_details_v_profile.php?idp01=<?php echo $pro_id; ?>"> <img
                                                    src='../seller/images/products/<?php echo $pro_image ?>' /></a>
                                            <div class="label_product">
                                                <span class="label_sale">-52%</span>
                                            </div>
                                            <div class="quick_button">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                    title="quick view"><i class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner">
                                                <p class="manufacture_product"><a href="#">Parts</a></p>
                                                <h4 class="product_name"><a href="#"><?php echo $pro_title; ?></a></h4>
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
                                                    <span class="old_price">Rs <?php echo $per; ?></span>
                                                    <span class="current_price">Rs <?php echo $pro_price; ?></span>
                                                </div>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li>

                                                        <?php if ($status ==  '1') {
                                                        ?>
                                                            <button pid="<?php echo $pro_id; ?>" id="product"
                                                                class="btn btn-primary">Add To Cart </button>
                                                        <?php } else { ?>
                                                            <button id="product" class="btn btn alert-danger">Out of Stock
                                                            </button>
                                                        <?php } ?>


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