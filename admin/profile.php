<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:admin_login.php");
}


include 'includes/header.php'; ?>
</head>

<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>

    <!--offcanvas menu area end-->


    <?php
    include 'includes/header_area_menu.php';
    ?>

    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="profile.php">Update Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="login_page_bg">
        <div class="container">
            <div class="customer_login">
                <div class="row">
                    <!--login area start-->
                    <div class="col-lg-6 col-md-6 mx-auto">
                        <div class="">
                            <h2>Update Profile</h2>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8" id="signup_back_message">
                                        <!--Alert from signup form-->
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <?Php
                                require_once('db/db.php');

                                if (isset($_SESSION['uid'])) {
                                    $userid = $_SESSION['uid'];
                                }
                                $query = mysqli_query($con, " SELECT * FROM vendor WHERE vendor_id = '$userid'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>


                                    <form action="profile_update.php" enctype="multipart/formdata" method="POST">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="vendor">Vendor</label>
                                                <input type="text" id="vendor" name="vendor_name" class="form-control"
                                                    value="<?php echo  $row['vendor_name'] ?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="f_name">First Name</label>
                                                <input type="text" id="f_name" name="f_name" class="form-control"
                                                    value="<?php echo $row['first_name'] ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="f_name">Last Name</label>
                                                <input type="text" id="l_name" name="l_name" class="form-control"
                                                    value="<?php echo $row['last_name'] ?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" name="email" class="form-control"
                                                    value="<?php echo  $row['email'] ?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" id="mobile" name="mobile" class="form-control"
                                                    value="<?php echo $row['mobile'] ?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address1">Address</label>
                                                <input type="text" id="address1" name="address1" class="form-control"
                                                    value="<?php echo $row['address1'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address2">Address <small>(Optional)</small></label>
                                                <input type="text" id="address2" name="address2" class="form-control"
                                                    value="<?php echo $row['address2'] ?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <p><br /></p>
                                        <div class="row" style="margin-left: auto; margin-right: auto;">
                                            <div class="col-md-12">

                                                <button style="float:right;" type="submit" value="submit"
                                                    class="btn btn-success btn-lg">Update</button>

                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>

                            </div>

                        </div>
                    </div>
                    <!--login area start-->



                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->


    <?php
    //include'brandarea.php';
    ?>


    <!--brand area end-->


    <!--footer area start-->

    <?php
    include 'includes/footer.php';
    ?>
    <!--footer area end-->

    <!--footer area end-->



    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <script>
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>



</body>


</html>

<!-- JS
========================================== -->
<!-- Plugins JS -->
<script src="../assets/js/plugins.js"></script>
<!-- Main JS -->
<script src="../assets/js/main.js"></script>