<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once('db/db.php');
if (!isset($_SESSION['uid'])) {
    header("location:admin_login.php");
} elseif (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $sql = mysqli_query($con, "DELETE FROM user_info WHERE user_id='$delid'");
    if ($sql) {
        echo "<script>alert('User account deleted successfully');</script>";
        unset($_GET['delid']);
        header('all_users.php');
    } else {
        echo "<script>alert('Failed to delete user account, please try again');</script>";
    }
} elseif (isset($_GET['activateId'])) {
    $activateId = $_GET['activateId'];
    $status = 1;
    $sql = mysqli_query($con, "UPDATE user_info SET status ='$status' WHERE user_id = '$activateId' ");
    if ($sql) {
        echo "<script>alert('User account activated successfully');</script>";
        header('all_users.php');
    } else {
        echo "<script>alert('Failed to activate user account, please try again');</script>";
    }
} elseif (isset($_GET['disableId'])) {
    $disableId = $_GET['disableId'];
    $status = 0;
    $sql = mysqli_query($con, "UPDATE user_info SET status ='$status' WHERE user_id = '$disableId' 
");
    if ($sql) {
        echo "<script>alert('User account disbaled successfully');</script>";
        header('all_users.php');
    } else {
        echo "<script>alert('Failed to disable user account, please try again');</script>";
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
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address 1</th>
                                            <th>Address 2</th>
                                            <th>Account Creation</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product_list">
                                        <?php
                                        require_once 'db/db.php';
                                        $vendor_id = $_SESSION['uid'];

                                        $query = mysqli_query($con, "SELECT * FROM user_info  ");
                                        $cnt = 1;

                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $cnt; ?></th>
                                                <td><?php echo $row['first_name']; ?></td>
                                                <td><?php echo $row['last_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['address1']; ?></td>
                                                <td><?php echo $row['address2']; ?></td>
                                                <td><?php echo $row['account_created']; ?></td>
                                                <td>
                                                    <?php if ($row['status'] ==   0) {
                                                    ?>

                                                        <button class="btn btn-success btn-lg"><a
                                                                href="all_users.php?activateId=<?php echo $row['user_id']; ?>"
                                                                onclick="return confirm('Are you sure you want activate this user account ')">Activate</a></button>

                                                    <?php } else { ?>
                                                        <button class="btn btn alert-danger btn-lg"><a
                                                                href="all_users.php?disableId=<?php echo $row['user_id']; ?>"
                                                                onclick="return confirm('Are you sure you want disable this user account ')">Disable</a></button>
                                                    <?php } ?>


                                                </td>

                                                <td>

                                                    <button class=" btn btn alert-danger btn-lg"><a
                                                            href="all_users.php?delid=<?php echo $row['user_id']; ?>"
                                                            onclick="return confirm('Are you sure you want to delete this user account')">Delete</a></button>
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