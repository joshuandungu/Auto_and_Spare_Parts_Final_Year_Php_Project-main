<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once('db/db.php');
if (!isset($_SESSION['uid'])) {
    header("location:admin_login.php");
} elseif (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $sql = mysqli_query($con, "DELETE FROM products WHERE product_id='$delid'");
    if ($sql) {
        echo "<script>alert('Products deleted successfully');</script>";
        unset($_GET['delid']);
        header('product.php');
    } else {
        echo "<script>alert('Failed to delete products, please try again');</script>";
    }
} elseif (isset($_GET['activateId'])) {
    $activateId = $_GET['activateId'];
    $status = 1;
    $sql = mysqli_query($con, "UPDATE products SET status ='$status' WHERE product_id = '$activateId' 
");
    if ($sql) {
        echo "<script>alert('Product activated successfully');</script>";
        header('all_products.php');
    } else {
        echo "<script>alert('Failed to activate product, please try again');</script>";
    }
} elseif (isset($_GET['disableId'])) {
    $disableId = $_GET['disableId'];
    $status = 0;
    $sql = mysqli_query($con, "UPDATE producst SET status ='$status' WHERE product_id = '$disableId' 
");
    if ($sql) {
        echo "<script>alert('Product disbaled successfully');</script>";
        header('all_products.php');
    } else {
        echo "<script>alert('Failed to disable product, please try again');</script>";
    }
}

?>
<!--header-->
<?php include 'includes/header.php'; ?>


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <!-- <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a> -->
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <?php
        include 'includes/header_area_menu.php';
        ?>


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">



                            <script src="../../assets/B/js/jquery2.js"></script>



                            <hr>
                            <!-- <div align="right"> -->
                            <!-- <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" -->
                            <!-- class="btn btn-info btn-lg">Add</button> -->
                            <!-- </div> -->
                            <div align="right">
                                <button type="button" id="add_button" class="btn btn-info btn-lg"> <a
                                        href="add_product.php">Add</a>
                                </button>
                            </div>


                            <hr>

                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Vendor Name</th>
                                            <th> Product Name</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Price Rs</th>
                                            <th>Quantity</th>
                                            <th>Key Words</th>
                                            <th>Date Created</th>
                                            <th>status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product_list">
                                        <?php
                                        require_once 'db/db.php';

                                        $query = mysqli_query($con, "SELECT * FROM products ");
                                        $cnt = 1;

                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $cnt; ?></th>
                                                <td><img src="../seller/images/products/<?php echo $row['product_image']; ?>"
                                                        width="100px" height="100px"></td>
                                                <td><?php echo $row['vendor_name']; ?></td>
                                                <td><?php echo $row['product_title']; ?></td>
                                                <td><?php echo $row['product_brand']; ?></td>
                                                <td><?php echo $row['product_cat']; ?></td>
                                                <td><?php echo $row['product_price']; ?></td>
                                                <td><?php echo $row['product_qty']; ?></td>
                                                <td><?php echo $row['product_keywords']; ?></td>
                                                <td><?php echo $row['date_created']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] ==  0) {
                                                    ?>
                                                        <button class="btn btn-success btn-lg"><a
                                                                href="all_products.php?activateId=<?php echo $row['product_id']; ?>"
                                                                onclick="return confirm('Are you sure you want to Activate this product')">Activate</a></button>
                                                    <?php } else { ?>
                                                        <button class="btn btn alert-danger btn-lg"><a
                                                                href="all_products.php?disableId=<?php echo $row['product_id']; ?>"
                                                                onclick="return confirm('Are you sure you want to disbale this product')">Disable</a></button>

                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <button class="btn btn alert-danger btn-lg"><a
                                                            href="all_products.php?delid=<?php echo $row['product_id']; ?>"
                                                            onclick="return confirm('Are you sure you want to delete this this product')">Delete</a></button>
                                                </td>

                                            <?php $cnt++;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>






                        </div>
                    </div>
                </div>




            </div>

        </div>

    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <div class=" footer">

    </div>
    <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
           Support ticket button start
        ***********************************-->

    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php
    include 'includes/footer.php';
    ?>


</body>

</html>

<!-- JS
========================================== -->
<!-- Plugins JS -->
<script src="../assets/js/plugins.js"></script>
<!-- Main JS -->
<script src="../assets/js/main.js"></script>