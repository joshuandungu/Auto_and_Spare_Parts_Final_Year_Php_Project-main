<?php
//session_start();
require_once "db/db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $vendor_name = mysqli_real_escape_string($con, $_POST["vendor_name"]);
    $f_name = mysqli_real_escape_string($con, $_POST["f_name"]);
    $l_name = mysqli_real_escape_string($con, $_POST["l_name"]);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repassword = mysqli_real_escape_string($con, $_POST['repassword']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $address1 = mysqli_real_escape_string($con, $_POST['address1']);
    $address2 = mysqli_real_escape_string($con, $_POST['address2']);
    $name = "/^[a-zA-Z ]+$/";
    $emailValidation = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

    // File Upload Handling
    $image = $_FILES['upload_image']; // Update to match form field name
    $tmp = $image['tmp_name'];
    // Check if a file is selected
    if (!empty($image['name'])) {
        // Proceed with file upload
        $newimage = mt_rand(1000000, 9999999) . '_' . basename($image['name']);
        $upload_dir = 'images/vendor_logo/';
        $target_path = $upload_dir . $newimage;
        if (move_uploaded_file($tmp, $target_path)) {
            // Check if a seller account with such email already exist
            $check_query = mysqli_query($con, "SELECT * FROM vendor WHERE email= '$email'");
            if (mysqli_num_rows($check_query) > 0) {
                echo "<script>alert('Email already associated with another email, try another email address');</script>";
            } else {
                $passwordm = SHA1($password);
                $register = mysqli_query($con, "INSERT INTO vendor( vendor_name, first_name, last_name, email, password, mobile, address1, address2, vendor_logo) VALUES( '$vendor_name', '$f_name', '$l_name', '$email', '$passwordm', '$mobile', '$address1','$address2', '$newimage')");
                if ($register) {
                    echo "<script>alert('Account created successfully, Please login  with your email and password');</script>";
                    header('Location: seller_login.php', true, 303);
                    exit();
                } else {
                    echo "<script>alert('Failed to create account, please try again or contact the admin for help');</script>";
                }
            }
        } else {
            echo "<script>alert('File upload failed');</script>";
            echo 'script>alert(window.location("seller_register.php"));</script>';
        }
    }
}