<?php
include "db/db.php";
session_start();
$userid = $_SESSION["uid"];
if (isset($_GET['proid'])) {
    $pro_id = $_GET['proid'];
}
$product_query = mysqli_query($con, "SELECT * FROM tbl_wish_list where  product_id='$pro_id' ");
if (mysqli_num_rows($product_query) > 0) {
    echo 'script>alert("Product already exists in the  wishlist");</script>';
    header('location:index.php');
} else {
    $id = mt_rand(1000000, 9999999);
    $sql = mysqli_query($con, "INSERT INTO tbl_wish_list (id, member_id, product_id) VALUES ('$id', '$userid','$pro_id')");
    if ($sql == true) {
        echo 'script>alert("Product  added to wishlist successfuly");</script>';
        header('location:wishlist_profile.php');
    } else {
        echo 'script>alert("Failed to add product to  wishlist");</script>';
        header('location: index.php');
    }
}
