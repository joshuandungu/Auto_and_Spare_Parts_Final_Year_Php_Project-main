<?php
require_once('db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:admin_login.php");
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brand_title = mysqli_real_escape_string($con, $_POST["brand_title"]);
        $sql = mysqli_query($con, "SELECT *  FROM brands WHERE brand_title ='$brand_title' ");
        $count = mysqli_num_rows($sql);
        if ($count > 0) {
            echo '<script>alert("Brand already exist")</script>';
            header('location:add_brand.php');
        } else {
            $brand_id = mt_rand(1000000, 9999999);
            $sql = "INSERT INTO `brands`(`brand_id` ,`brand_title`) VALUES ( '$brand_id', '$brand_title')";
            $run_query = mysqli_query($con, $sql);
            if ($run_query == true) {
                echo '<script>alert("Barand created successfully");</script>';
                header('location:brands.php');
            } else {
                echo '<script>alert("Failed to create product brand please try again");</script>';
                header('location:add_brand.php');
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
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
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <ul>

                                <li>
                                    <eg href="brands.php">Brands</a>
                                </li>
                            </ul>


                        </div>
                        <h2 style="text-align: center; font-weight: bold;">Add Brand</h2>

                        <form action="add_brand.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="brand"> Brand Title</label>
                                    <input type="text" name="brand_title" id="brand" class="form-control" />
                                </div>
                                <br />
                                <div class="col-md-12">
                                    <button style="float: right;" type="submit" name="add_brand" value="submit"
                                        class="btn btn-success">Add
                                        category
                                    </button>
                                </div>
                        </form>
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