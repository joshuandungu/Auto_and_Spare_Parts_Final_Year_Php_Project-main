<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../assets/B/js/jquery2.js"></script>

    <script src="../assets/functio/A_function.js"></script>

</head>

<body>

    <?php
    require_once('db/db.php');
    include 'includes/header.php';
    require_once('includes/header_profile.php');
    if (!isset($_SESSION['uid'])) {
        header("location:customer_login.php");
    }
    ?>

    <!-------header bar end--------------->

    <br>
    <hr>
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
                                        <th>Vendor Name</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th> Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <?php
                                if (isset($_SESSION['uid'])) {
                                    $id_us = $_SESSION['uid'];
                                }
                                $query = mysqli_query(
                                    $con,
                                    "SELECT 
                                        orders.order_id as order_id,
                                         orders.product_id AS product_id,
                                          orders.qty AS qty, 
                                          orders.payment_status as payment_status,
                                          orders.order_status AS order_status,
                                           orders.edit_status AS edit_status,
                                            products.vendor_name as vendor_name,
                                            products.product_title as product_title,
                                             products.product_image as product_image 
                                             FROM orders LEFT JOIN products ON orders.product_id = products.product_id where orders.user_id='$id_us'"
                                );
                                while ($row = mysqli_fetch_array($query)) {
                                    $cnt = 1;
                                    $order_id = $row['order_id'];
                                    $product_id = $row['product_id'];
                                    $vendor_name = $row['vendor_name'];
                                    $product_image = $row['product_image'];
                                    $product_name = $row['product_title'];
                                    $qty = $row['qty'];
                                    $payment_status = $row['payment_status'];
                                    $order_status = $row['order_status'];
                                    $edit_status = $row['edit_status'];

                                ?>
                                <tbody>
                                    <th scope="row"><?php echo $cnt; ?></th>
                                    <td><?php echo $order_id; ?></td>
                                    <td><?php echo $vendor_name; ?></td>
                                    <td><img src="../seller/images/products/<?php echo $product_image; ?>"></td>
                                    <td><?php echo $product_name; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $payment_status; ?></td>
                                    <td><?php echo $order_status; ?></td>
                                    <td><?php echo $edit_status; ?></td>
                                    <td>
                                        <button class="btn btn alert-danger"> <a href="<?php echo $order_id; ?>"
                                                onclick="return confirm ('Are you sure you want to cancel this order')">Cancel
                                                Order</a></button>
                                    </td>

                                    <?php $cnt++;
                                } ?>

                                </tbody>










                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <?php
            if (isset($_SESSION['uid'])) {
                $id_us = $_SESSION['uid'];
            }
            $a = 0;
            $ct_p = 0;
            $data = "SELECT * FROM orders where user_id = '$id_c' and payment_status='cash_on_delivery' and order_status='process_order' or order_status='uncomplete'   ";
            $view = mysqli_query($con, $data);
            while ($_view = mysqli_fetch_assoc($view)) {
                $id_c_pro = $_view['product_id'];
                $id_c_user = $_view['user_id'];
                $id_c_pro_qty = $_view['qty'];
                if (!empty($id_c_pro)) {
                    $data2 = "SELECT * FROM products where product_id = '$id_c_pro' ";
                    $view2 = mysqli_query($con, $data2);
                    while ($_view2 = mysqli_fetch_assoc($view2)) {
                        $rs_p = $_view2['product_price'];
                        $S_Price = $rs_p * $id_c_pro_qty;
                        if (!empty($S_Price)) {
                            $a += $S_Price;
                            $ct_p++;
                        }
                    }

                    //$S_Price = $rs_p*$id_c_pro_qty;
                    //$a=$S_Price++ ;
                }
            }

            echo "<table>
           <tr><br><hr>
           <td> 
           
           <div class='coupon_area'>
                            <div class='row'>
                                

                            <div class='col-lg-6 col-md-6'></div>

                                <div class='col-lg-20 col-md-20'>
                                    <div class='coupon_code right'>
                                        <h3><b>Product Details Of Process Order </b></h3>
                                        <div class='coupon_inner'>
                                           <div class='cart_subtotal'>
                                               <p>Total Product :</p>
                                               <p class='cart_amount'>$ct_p</p>
                                           </div>
                                           <hr>
                                           <div class='cart_subtotal'>
                                               <p>Total: </p>
                                               <p class='cart_amount'>RS  $a </p>
                                           </div>
                                           <div class='cart_subtotal '>
                                               <p>Shipping</p>
                                               <p class='cart_amount'>RS  00</p>
                                           </div>
                                          

                                           
                                           <div class='checkout_btn'>
                                               <a href='#'>
                                               
                                               <div class='cart_subtotal'>
                                               G . Total 
                                               RS  $a 
                                           </div>


                                               </a>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
           
           
           
           
           
           </tr>
           </table>";


            ?>


        </div>


    </div>




    <!---------------------------->
    <br>
    <hr>
    <BR>
    <?php include 'includes/footer.php'; ?>


    <script type="text/javascript" src="seller/dist/js/site.min.js"></script>

    <!-- <script> -->
    // $(document).ready(function() {

    // getCustomerOrdersView();

    // function getCustomerOrdersView() {
    // $.ajax({
    // url: 'customer_order_get.php',
    // method: 'POST',
    // data: {
    // GET_CUSTOMER_ORDERS_view: 1
    // },
    // success: function(response) {

    // console.log(response);
    // var resp = $.parseJSON(response);
    // if (resp.status == 202) {

    // var customerOrderHTML = "";

    // $.each(resp.message, function(index, value) {

    // customerOrderHTML += '<tr>' +
        // '<td>' + value.order_id + '</td>' +
        // '<td>' + value.product_title + '</td>' +
        // '<td>' + value.qty + '</td>' +
        // '<td>' + value.payment_status + '</td>' +
        // '<td>' + value.order_status + '</td>' +
        // '</tr>';

    // });

    // $("#customer_side_order_list_view").html(customerOrderHTML);

    // } else if (resp.status == 303) {
    // $("#customer_side_order_list_view").html(resp.message);
    // }

    // }
    // })

    // }



    // });
    // </script>


</body>

</html>