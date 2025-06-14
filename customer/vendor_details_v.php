<!doctype html>
<html class="no-js" lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php include 'includes/header.php'; ?>


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

    <!--breadcrumbs area end-->
    <?php
    if (isset($_GET['vendor_id'])) {
        $id_p = $_GET['vendor_id'];
    }
    $vendor = "SELECT * FROM vendor where vendor_id='$id_p' ";
    $run_query2 = mysqli_query($con, $vendor);
    if (mysqli_num_rows($run_query2) > 0) {
        while ($row = mysqli_fetch_array($run_query2)) {
            $vendor_id    = $row['vendor_id'];
            // $pro_cat   = $roww['product_cat'];
            // $pro_brand = $roww['product_brand'];
            // $pro_title = $roww['product_title'];
            // $pro_price = $roww['product_price'];
            // $pro_image = $roww['product_image'];
            // $product_desc = $roww['product_desc'];
            // $su = ($pro_price * 5) / 100;
            // $per = $su + $pro_price;


    ?>




    <div class="row">
        <div class="col-md-6 col-xs-6" id="product_msg">
        </div>
    </div>



    <div class="product_page_bg">
        <div class="container">
            <!--vendor details start-->
            <div class="product_details">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="../seller/images/vendor_logo/<?php echo $row['vendor_logo'] ?>"
                                        data-zoom-image="../seller/images/vendor_logo/<?php echo $row['vendor_logo'] ?>"
                                        alt="big-1">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                            <form action="#">

                                <h3>Vendor:<b><a href="#"><?php echo $row['vendor_name']; ?></a></b>
                                </h3>
                                <div class="product_nav">


                                </div>
                                <div class="product_rating">
                                    <ul>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li class="review"><a href="#">(1 customer review )</a></li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="product_name">
                                    <h3>Owner</h3>
                                    <span>
                                        <?php echo $row['first_name']; ?>
                                        <?php echo  $row['last_name']; ?>
                                    </span>
                                </div>
                                <hr>
                                <div class="product_name">
                                    <h3>Email</h3>
                                    <span>
                                        <a href="mailto:<?php echo $row['email']; ?>">
                                            <?php echo $row['email']; ?> </a>

                                    </span>
                                </div>
                                <hr>
                                <div class="product_name">
                                    <h3>Telephone Number</h3>
                                    <span>
                                        <a
                                            href="tel:+254<?php echo $row['mobile']; ?>"><?php echo $row['mobile']; ?></a>
                                    </span>
                                </div>
                                <hr>
                                <div class="product_name">
                                    <h3>Address 1</h3>
                                    <span>
                                        <?php echo $row['address1']; ?>
                                    </span>
                                </div>
                                <hr>
                                <div class="product_name">
                                    <h3>Address 2</h3>
                                    <span>
                                        <?php echo $row['address2']; ?>
                                    </span>
                                </div>
                                <hr>

                                </ul>
                        </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php }
    } ?>

        <!--Vendor details end-->

        <!-- A collection of  products for each vendor start -->

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
                            if (isset($_GET['vendor_id'])) {
                                $vendor_id = $_GET['vendor_id'];
                                $sql = mysqli_query($con, "SELECT * FROM products WHERE vendor_id = '$vendor_id'");
                            }

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
                                                <a href="product_details_v.php?pro_id=<?php echo $row['product_id']; ?>"
                                                    data-bs-toggle="modal" data-bs-target="#modal_box" title="quick 
view"><i class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner">
                                                <p class="manufacture_product"><a
                                                        href="product_details_v.php?pro_id=<?php echo $row['product_id']; ?>">View
                                                        More</a>
                                                </p>
                                                <h4 class="product_name"><a
                                                        href="product_details_v.php?pro_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a>
                                                </h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></
                                                                li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></
                                                                li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></
                                                                li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></
                                                                li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></
                                                                li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="old_price">Rs
                                                        <?php echo $su; ?></span>
                                                    <span class="current_price">Rs
                                                        <?php echo $pro_price; ?></span>
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
                                                    <li class="wishlist"><a href="customer/wishlist_add.php"
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

                            <?php   }  ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <!-- A collection of products fro each vendor end -->

        <!-- Customer reviews and comments start -->
        <h2>Customer Reviews</h2>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> First Name</th>
                        <th>Last Name</th>
                        <th>Date Created</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="product_list">
                    <?php
                    require_once('db/db.php');
                    $query1 = mysqli_query($con, "SELECT * FROM vendor_reviews WHERE vendor_id = '$vendor_id' ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($query1)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $cnt; ?></th>
                        <td><?php echo $row['customer_fname']; ?></td>
                        <td><?php echo $row['customer_lname']; ?></td>
                        <td><textarea><?php echo $row['date_created']; ?></textarea></td>
                        <td><textarea><?php echo $row['comment']; ?></textarea></td>

                        <?php $cnt++;
                    } ?>
                </tbody>
            </table>
            <form action="includes/add_vendor_comment.php" method="post">
                <label for="comment">Add Comment</label>
                <input type="hidden " name="vendor_id" value=<?php echo $vendor_id;  ?> hidden>
                <textarea type="text" style="width: 300px;" id="comment" class="form-control" name="comment"></textarea>
                <button type="submit" class="btn btn-success" value="submit" aria-placeholder="Add Comment">Add
                    Comment</button>

            </form>
        </div>

        <!-- Customer reviews and comments end -->
        <!--footer area start-->

        <?php
        include 'includes/footer.php';
        ?>
        <!--footer area end-->



        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src=" ../assets/js/plugins.js"></script>

        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>



</body>


</html>