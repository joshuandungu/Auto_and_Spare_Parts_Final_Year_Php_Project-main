<!DOCTYPE html>
<html lang="en">


<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:admin_login.php");
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
            Admin Dashboard</h1>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <?php
                            // create a connection to the database
                            require_once('db/db.php');

                            $Totalsellercustomer = 0;

                            $data = "SELECT * FROM user_info ";
                            $view = mysqli_query($con, $data);
                            while ($_view = mysqli_fetch_assoc($view)) {
                                $Totalsellercustomer++;
                            }

                            $Totalseller = 0;
                            $data2 = "SELECT * FROM vendor  ";
                            $view2 = mysqli_query($con, $data2);
                            while ($_view2 = mysqli_fetch_assoc($view2)) {
                                $Totalseller++;
                            }

                            $TotalsellerActive = 0;
                            $data3 = "SELECT * FROM vendor where status = '1' ";
                            $view3 = mysqli_query($con, $data3);
                            while ($_view3 = mysqli_fetch_assoc($view3)) {
                                $TotalsellerActive++;
                            }

                            $TotalsellerDisactive = $Totalseller - $TotalsellerActive;


                            $TotalCustomer = 0;
                            $data5 = "SELECT * FROM user_info  ";
                            $view5 = mysqli_query($con, $data5);
                            while ($_view5 = mysqli_fetch_assoc($view5)) {
                                $TotalCustomer++;
                            }

                            // $TotalAdmin = 0;
                            // $data6 = "SELECT * FROM admin where seller_or_admin='admin' ";
                            // $view6 = mysqli_query($con, $data6);
                            // while ($_view6 = mysqli_fetch_assoc($view6)) {
                            // $TotalAdmin++;
                            // }


                            // $TotalManager = 0;
                            // $data7 = "SELECT * FROM admin where seller_or_admin='manager' ";
                            // $view7 = mysqli_query($con, $data7);
                            // while ($_view7 = mysqli_fetch_assoc($view7)) {
                            // $TotalManager++;
                            // }
                            // 
                            $TotalOrder = 0;

                            $data8 = "SELECT * FROM orders ";
                            $view8 = mysqli_query($con, $data8);
                            while ($_view8 = mysqli_fetch_assoc($view8)) {
                                $TotalOrder++;
                            }

                            $TotalCategories = 0;

                            $data9 = "SELECT * FROM categories ";
                            $view9 = mysqli_query($con, $data9);
                            while ($_view9 = mysqli_fetch_assoc($view9)) {
                                $TotalCategories++;
                            }
                            $Totalbrands = 0;

                            $data10 = "SELECT * FROM brands ";
                            $view10 = mysqli_query($con, $data10);
                            while ($_view10 = mysqli_fetch_assoc($view10)) {
                                $Totalbrands++;
                            }
                            $Totalproducts = 0;

                            $data11 = "SELECT * FROM products ";
                            $view11 = mysqli_query($con, $data11);
                            while ($_view11 = mysqli_fetch_assoc($view11)) {
                                $Totalproducts++;
                            }



                            ?>




                            <!-- Total Customers -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="all_users.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total Customers </div>
                                                <div class="stat-digit"><?php echo $TotalCustomer; ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success w-85" role="progressbar"
                                                    aria-valuenow="<?php echo $TotalCustomer; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Total products -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="all_products.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total Products </div>
                                                <div class="stat-digit"><?php echo $Totalproducts; ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning w-50" role="progressbar"
                                                    aria-valuenow="<?php echo $Totalproducts; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Total brands -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="brands.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total Brands </div>
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




                            <!-- Total gas categories -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="category.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total Gas Categories </div>
                                                <div class="stat-digit"><?php echo $TotalCategories ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-75" role="progressbar"
                                                    aria-valuenow="<?php echo $TotalCategories; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <!-- Total orders -->
                            <div class="col-lg-3 col-sm-6">
                                <a href="orders.php">
                                    <div class="card">
                                        <div class="stat-widget-two card-body">
                                            <div class="stat-content">
                                                <div class="stat-text">Total Orders </div>
                                                <div class="stat-digit"><?php echo $TotalOrder; ?></div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success w-85" role="progressbar"
                                                    aria-valuenow="<?php echo $TotalOrder; ?>" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
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