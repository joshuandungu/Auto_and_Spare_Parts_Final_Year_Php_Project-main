<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('loction:customer_login.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pro_id = $_POST["product_id"];
    $pro_name = $_POST["product_title"];
    $pro_qty = $_POST["qty"];
    $vendor_name = $_POST["vendor_name"];
    $pro_image = $_POST["product_image"];



    if (isset($_SESSION["uid"])) {

        $user_id = $_SESSION["uid"];

        $sql = "SELECT * FROM cart WHERE pro_id = '$pro_id' AND user_id = '$user_id'";
        $run_query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($run_query);
        if ($count > 0) {
            echo "
<div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Product is already added into the cart Continue Shopping</b>
</div>
"; //not in video
        } else {
            $cart_id = mt_rand(1000000, 9999999);
            $sql = "INSERT INTO `cart`
(`cart_id`, `vendor_name`, `pro_name`, `pro_id`, `user_id`, `pro_qty`, `pro_image`)
VALUES ('$cart_id', '$vendor_name', '$pro_name','$pro_id','$user_id','$pro_qty', '$pro_image')";
            if (mysqli_query($con, $sql)) {
                echo "
<div class='alert alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Product added to cart successfully</b>
</div>
";
            }
        }
    }
} else {
    echo "
<div class='alert alert-danger '>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Please First Login Your Account After Then Add Product To Cart </b><small><b>
            <i><a href='customer_login.php'>
                    <blink> Login Click Here </blink>
                </a></i> </b></small>
</div>";
    //exit();


}
