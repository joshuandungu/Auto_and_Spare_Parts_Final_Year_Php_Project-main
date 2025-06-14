<!DOCTYPE html>
<html lang="en">


<?php
require_once('db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:admin_login.php");
} else {
    if (isset($_GET['delid'])) {
        $delid = $_GET['delid'];

        $delete = mysqli_query($con, "DELETE  FROM orders WHERE order_id = '$delid'");
        if ($delete) {
            echo "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Order deleted successfully </b>
		</div>";
            echo "<script>window.location.href('orders.php')</script>";
            exit();
        } else {
            echo "<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Failed to delete order </b>
</div>";
            echo "<script>window.location.href('orders.php')</script>";
            exit();
        }
    }
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
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <ul>

                                <li><a href="orders.php">Orders</a></li>
                            </ul>

                            <div class="container-fluid gradl">
                                <div class="panel-body">

                                    <div class="coupon_area">
                                        <div class="row">
                                            <div class="coupon_code left">
                                                <h3>Order Track and Trace List</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order.No</th>
                                                                <th>Vendor</th>
                                                                <th>Product Image</th>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Customer <br>First Name</th>
                                                                <th>Customer <br>Last Name</th>
                                                                <th>Customer <br>Email</th>
                                                                <th>Customer <br>Mobile</th>
                                                                <th>Customer <br>Address</th>
                                                                <th>Payment Status</th>
                                                                <th>Order Status</th>
                                                                <th> Delivery</th>
                                                                <th> Delivery Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php


                                                            $query = mysqli_query(
                                                                $con,
                                                                "SELECT * FROM products"
                                                            );
                                                            while ($product = mysqli_fetch_array($query)) {
                                                                $cnt = 1;
                                                                $pro_id = $product['product_id'];
                                                                $vendor_name = $product['vendor_name'];
                                                                $product_title = $product['product_title'];
                                                                $product_image = $product['product_image'];
                                                            }



                                                            if (!empty($pro_id)) {
                                                                $order = mysqli_query(
                                                                    $con,
                                                                    "SELECT orders.order_id as order_id,orders.user_id as user_id,orders.product_id AS product_id,orders.qty AS qty, orders.payment_status as payment_status,orders.order_status AS order_status,orders.edit_status AS edit_status FROM orders WHERE product_id ='$pro_id'"
                                                                );
                                                                while ($row = mysqli_fetch_array($order)) {
                                                                    $order_id = $row['order_id'];
                                                                    $product_id = $row['product_id'];
                                                                    $user_id =  $row['user_id'];
                                                                    $qty = $row['qty'];
                                                                    $payment_status = $row['payment_status'];
                                                                    $order_status = $row['order_status'];
                                                                    $edit_status = $row['edit_status'];
                                                                }
                                                            }

                                                            if (!empty($user_id)) {
                                                                $customer = mysqli_query(
                                                                    $con,
                                                                    "SELECT * FROM user_info WHERE user_id ='$user_id' "
                                                                );
                                                                while ($cust = mysqli_fetch_array($customer)) {
                                                                    $first_name = $cust['first_name'];
                                                                    $last_name = $cust['last_name'];
                                                                    $email =  $cust['email'];
                                                                    $mobile = $cust['mobile'];
                                                                    $address = $cust['address1'];
                                                                }
                                                            }




                                                            ?>
                                                            <th scope="row"><?php echo $cnt; ?></th>
                                                            <td><?php echo $order_id; ?></td>
                                                            <td><?php echo $vendor_name; ?></td>
                                                            <td><img
                                                                    src="../seller/images/products/<?php echo $product_image; ?>">
                                                            </td>
                                                            <td><?php echo $product_title; ?></td>
                                                            <td><?php echo $qty; ?></td>
                                                            <td><?php echo $first_name; ?></td>
                                                            <td><?php echo $last_name; ?></td>
                                                            <td><?php echo $email; ?></td>
                                                            <td><?php echo $mobile; ?></td>
                                                            <td><?php echo $address; ?></td>
                                                            <td><?php echo $payment_status; ?></td>
                                                            <td><?php echo $order_status; ?></td>
                                                            <td><?php echo $edit_status; ?></td>
                                                            <td>
                                                                <?php if ($edit_status == 'uncomplete') {
                                                                ?>
                                                                    <button class="btn btn-primary"> <a
                                                                            href="orders.php?updateid=<?php echo $order_id; ?>"
                                                                            onclick="return confirm ('Approve delivery')">Uncomplete</a>
                                                                    </button>

                                                                <?php } else {
                                                                ?>
                                                                    <button class="btn btn-success btn-lg"> <a
                                                                            href="orders.php?completeid=<?php echo $order_id ?>"
                                                                            onclick="return confirm ('Complete delivery')">Delivered</a>
                                                                    </button>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn alert-danger"> <a
                                                                        href="orders.php?delid=<?php echo $order_id ?>"
                                                                        onclick="return confirm ('Are you sure you want to cancel this order')">Cancel
                                                                        Order</a></button>
                                                            </td>


                                                            <?php $cnt = $cnt + 1;
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


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


<?php

if (isset($_GET['updateid'])) {
    $update_id = $_GET['updateid'];
    $status = 'Out_for_delivery';
    $update = mysqli_query($con, "UPDATE orders SET edit_status = '$status'");
    if ($update) {
        echo "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Order updated successfully </b>
		</div>";
        exit();
    } else {
        echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Failed to update order </b>
		</div>";
        exit();
    }
}

if (isset($_GET['completeid'])) {
    $complete_id = $_GET['completeid'];
    $status = 'Completed_delivery';
    $complete = mysqli_query($con, "UPDATE orders SET edit_status = '$status'");
    if ($complete) {
        echo "<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Order delivered successfully </b>
</div>";
        exit();
    } else {
        echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Failed to update order </b>
		</div>";
        exit();
    }
}



?>