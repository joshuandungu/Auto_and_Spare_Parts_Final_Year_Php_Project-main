<!doctype html>
<html class="no-js" lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />



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
    include 'includes/header.php';
    require_once 'db/db.php';
    include 'includes/header_profile.php';
    if (!isset($_SESSION["uid"])) {
        header("location:customer_login.php");
    }
    ?>


    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--wishlist area start -->
    <div class="wishlist_page_bg">
        <div class="container">
            <div class="wishlist_area">
                <div class="wishlist_inner">
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc wishlist">
                                    <div class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product_remove">Delete</th>
                                                    <th class="product_thumb">Image</th>
                                                    <th class="product_name">Product</th>
                                                    <th class="product_name">Vendor</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product_quantity">Stock Status</th>
                                                    <th class="product_total">Add To Cart</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                //where product_condition='old'
                                                //product_id	tbl_whish_list
                                                $Vr1 = $_SESSION["uid"];
                                                $product_query22 = "SELECT * FROM tbl_wish_list where  member_id='$Vr1' ";
                                                $run_query22 = mysqli_query($con, $product_query22);
                                                if (mysqli_num_rows($run_query22) > 0) {
                                                    while ($roww2 = mysqli_fetch_array($run_query22)) {
                                                        $pro_id2    = $roww2['product_id'];

                                                        //	echo $_SESSION["uid"];
                                                        //echo $pro_id2;
                                                        $product_query2 = "SELECT * FROM products where product_id='$pro_id2' ";
                                                        $run_query2 = mysqli_query($con, $product_query2);
                                                        if (mysqli_num_rows($run_query2) > 0) {
                                                            while ($roww = mysqli_fetch_array($run_query2)) {
                                                                $pro_id    = $roww['product_id'];
                                                                $pro_cat   = $roww['product_cat'];
                                                                $pro_brand = $roww['product_brand'];
                                                                $pro_title = $roww['product_title'];
                                                                $vendor_name = $roww['vendor_name'];
                                                                $pro_price = $roww['product_price'];
                                                                $pro_image = $roww['product_image'];
                                                                $product_desc = $roww['product_desc'];
                                                                $su = ($pro_price * 5) / 100;
                                                                $per = $su + $pro_price;


                                                                //echo $pro_image_2=$pro_image;
                                                ?>

                                                                <tr>
                                                                    <td class="product_remove"><a
                                                                            href="wishlist_del.php?value=<?php echo $pro_id; ?>">X</a>
                                                                    </td>
                                                                    <!-- <input type="hidden" name="product_id" id="product-id" value=""> -->
                                                                    <td class="cart_img"><a href="#"><img
                                                                                src="../seller/images/products/<?php echo $pro_image; ?>"
                                                                                alt=""></img></a></td>
                                                                    <td class="product_name"><a href="#"><?php echo $pro_title; ?></a>
                                                                    </td>
                                                                    <td class="product_name"><a href="#"><?php echo
                                                                                                            $vendor_name; ?></a>
                                                                    </td>

                                                                    <td class="product-price"><span class="old_price">
                                                                            <?php //echo $per; 
                                                                            ?></span>
                                                                        <span class="current_price">Rs <?php echo $pro_price; ?></span>
                                                                    </td>
                                                                    <td class="product_quantity">In Stock</td>
                                                                    <td class="product_total">
                                                                        <a
                                                                            href="wishlist_add.php?values=<?php echo $pro_id; ?>?value_user=<?php echo $Vr1; ?>">
                                                                            Add To Cart
                                                                        </a>
                                                                    </td>

                                                                </tr>





                                                <?php    }
                                                        }
                                                    }
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--wishlist area end -->



    <!--footer area start-->


    <?php
    include 'includes/footer.php';
    ?>
    <!--footer area end-->



    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="../assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>



</body>


</html>