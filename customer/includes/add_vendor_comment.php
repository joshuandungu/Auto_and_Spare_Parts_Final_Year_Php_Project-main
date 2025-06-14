<?php

require_once('../db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ./customer_login.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
        $vendor_id = mysqli_real_escape_string($con, $_POST['vendor_id']);
        $comment =  mysqli_real_escape_string($con, $_POST['comment']);
    }
    $customer_id = $_SESSION['uid'];
    $query = mysqli_query($con, "SELECT * FROM user_info WHERE user_id = '$customer_id'");
    while ($row = mysqli_fetch_array($query)) {
        $customer_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
    }

    $query1 = mysqli_query($con, "SELECT * FROM vendor_reviews WHERE vendor_id = '$vendor_id' AND customer_id = '$$customer_id' ");
    if (mysqli_num_rows($query1) > 0) {
        echo '<script>alert("Similar comment already exists")</script>';
        echo "<script>window.location.href ='../vendors.php'</script>";
    } else {
        $review_id = mt_rand(1000000, 9999999);
        $insert = mysqli_query($con, "INSERT INTO vendor_reviews(review_id, customer_id, vendor_id,customer_fname, customer_lname, comment) VALUES('$review_id', '$customer_id', '$vendor_id', '$first_name', '$last_name', '$comment'  )");
        if ($insert = true) {
            echo '<script>alert("Comment added successfully")</script>';
            echo "<script>window.location.href ='../vendors.php'</script>";
        } else {
            echo '<script>alert("Failed to add comment")</script>';
            echo "<script>window.location.href ='../vendors.php'</script>";
        }
    }
}
mysqli_close($con);