<!DOCTYPE html>
<html lang="en">


<?php
session_start();
if (!isset($_SESSION["uid"])) {
    header("location:seller_login.php");
}


?>

<!--header-->
<?php
include 'includes/header.php';
?>


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

        <h1
            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 600; font-weight: bold; text-align: center;">
            Vendor Dashboard</h1>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <?php
                            // create a connection to the database
                            require_once('db/db.php');
                            if (isset($_SESSION["uid"])) {
                                // Get vendor_id from session
                                $vendor_id = $_SESSION["uid"];

                                // Fetch all products where vendor_id = $_SESSION['uid'];
                                $Totalproducts = 0;
                                $data11 = "SELECT * FROM products WHERE vendor_id = '$vendor_id' ";
                                $view11 = mysqli_query($con, $data11);
                                while ($_view11 = mysqli_fetch_assoc($view11)) {
                                    $Totalproducts++;
                                }
                            }

                            // Select all from categories
                            $TotalCategories = 0;
                            $data9 = "SELECT * FROM categories ";
                            $view9 = mysqli_query($con, $data9);
                            while ($_view9 = mysqli_fetch_assoc($view9)) {
                                $TotalCategories++;
                            }
                            // Select all from brands
                            $Totalbrands = 0;
                            $data10 = "SELECT * FROM brands ";
                            $view10 = mysqli_query($con, $data10);
                            while ($_view10 = mysqli_fetch_assoc($view10)) {
                                $Totalbrands++;
                            }

                            // Fetch all orders where vendor_id = $_SESSION['uid'];
                            // if (isset($_SESSION['uid'])) {
                            // $vendor_id = $_SESSION["uid"];
                            // $TotalOrder = 0;
                            // $data8 = "SELECT * FROM orders WHERE vendor_id = '$vendor_id' ";
                            // $view8 = mysqli_query($con, $data8);
                            // while ($_view8 = mysqli_fetch_assoc($view8)) {
                            // $TotalOrder++;
                            // }
                            // }


                            ?>




                            <!-- Total Customers -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="product.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total Products </div>
                                                <div class="stat-digit"><?php echo $Totalproducts; ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success w-85" role="progressbar"
                                                    aria-valuenow="<?php echo $Totalproducts; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Total products -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="#">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total brands </div>
                                                <div class="stat-digit"><?php echo $Totalbrands; ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning w-50" role="progressbar"
                                                    aria-valuenow="<?php echo $Totalbrands; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Total brands -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="#">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total categories </div>
                                                <div class="stat-digit"><?php echo $TotalCategories; ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning w-50" role="progressbar"
                                                    aria-valuenow="<?php echo $Totalbrands; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>




                            <!-- Total gas categories -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="orders.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total orders </div>
                                                <div class="stat-digit"></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-75" role="progressbar"
                                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
    <div class="includes/footer.php">
        <?php include('includes/footer.php'); ?>

    </div>
    <!-- JS
========================================== -->
    <!-- Plugins JS -->
    <script src="../assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
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



</body>

</html>