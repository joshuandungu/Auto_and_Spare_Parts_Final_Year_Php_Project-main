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
    include "db/db.php";
    if (isset($_GET['pro_id'])) {
        $id_p = $_GET['pro_id'];
    }
    //where product_condition='old'
    $product_query2 = "SELECT * FROM products where product_id='$id_p' ";
    $run_query2 = mysqli_query($con, $product_query2);
    if (mysqli_num_rows($run_query2) > 0) {
        while ($row = mysqli_fetch_array($run_query2)) {
            $pro_id    = $row['product_id'];
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
            <!--product details start-->
            <div class="product_details">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="../seller/images/products/<?php echo $row['product_image'] ?>"
                                        data-zoom-image="../seller/images/products/<?php echo $row['product_image'] ?>"
                                        alt="big-1">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                            <form action="#">

                                <h3><a href="#"><?php echo $row['product_title']; ?></a></h3>
                                <h3>Vendor:<b><a
                                            href="vendor_details_v.php?vendor_id=<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name']; ?></a></b>
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
                                <div class="price_box">
                                    <h3>Price(Ksh)</h3>
                                    <span class="price"><?php echo $row['product_price'];  ?></span>
                                </div>
                                <div class="product_desc">
                                    <h3>Details</h3>
                                    <p><?php echo $row['product_desc']; ?></p>
                                </div>
                                <?php if ($row['status'] == '1') {
                                        ?>
                                <!-- <form action="add_cart.php" method="POST">

                                                <input type="hidden" value="<?php echo $row['product_id']; ?>" name="product_id">
                                                <input type="hidden" value="<?php echo $row['product_image']; ?>"
                                                    name="product_image">
                                                <input type="hidden" value="<?php echo $row['vendor_name']; ?>" name="vendor_name">
                                                <input type="hidden" value="<?php echo $row['product_title']; ?>" name="pro_name">
                                                <input type="number" name="qty" placeholder="Enter quantity">
                                                <button type="submit" value="submit" class="btn btn-primary">Add To
                                                    Cart </button>

                                            </form> -->

                                <ul>
                                    <button pid="<?php echo $row['product_id']; ?>" id="product"
                                        class="btn btn-primary">Add To Cart </button>

                                    <li><a class="wishlist"
                                            href="wishlist_add.php?proid=<?php echo $row['product_id']; ?>"
                                            title="Add to wishlist">+ Add to Wishlist</a>
                                    </li>
                                    <?php } else { ?>
                                    <button id="product" class="btn btn alert-danger">
                                        Out of Stock
                                        </a>
                                    </button>

                                    <?php } ?>

                                </ul>
                        </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php }
    } ?>

        <!--product details end-->

        <!-- Customer reviews and comments start -->
        <h2>Customer Reviews</h2>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Fist Name</th>
                        <th>Last Name</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="product_list">
                    <?php
                    require_once('db/db.php');
                    $query1 = mysqli_query($con, "SELECT * FROM product_reviews WHERE product_id = '$pro_id' ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($query1)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $cnt; ?></th>
                        <td><?php echo $row['customer_fname']; ?></td>
                        <td><?php echo $row['customer_lname']; ?></td>
                        <td><textarea><?php echo $row['comment']; ?></textarea></td>
                        <?php $cnt++;
                    } ?>
                </tbody>
            </table>
            <form action="includes/comment_class.php" method="post">
                <label for="comment">Add Comment</label>
                <input type="hidden " name="product_id" value="<?php echo $pro_id;  ?>">
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