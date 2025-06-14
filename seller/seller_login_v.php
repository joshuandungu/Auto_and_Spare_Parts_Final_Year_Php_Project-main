<?php
require_once "db/db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    // Prepare SQL statement using prepared statement
    $sql = "SELECT * FROM vendor WHERE email=? AND password=? ";
    $stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $email, SHA1($password));
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result->num_rows == 0) {
            '<script>alert("User Account does not exist. Please create a new account");script>';
            $error[] = 'User Account does not exist. Please create a new account';

            exit();
        }
        // Check if user exists
        else if ($row = mysqli_fetch_assoc($result)) {
            // echo '<script>alert("Login successful");</script>';
            $error[] = 'Login succcessful';
            // Start session and store user ID

            // Assuming 'user_id' is the primary key co your 'users' table
            $_SESSION["uid"] = $row['vendor_id'];
            $_SESSION["vendor"] = $row['vendor_name'];
            $_SESSION["name"] = $row['first_name'] . $row['last_name'];
            // Redirect to index.php after successful login
            header('Location: index.php');
            exit();
        } else {
            // Handle invalid credentials
            // echo '<script>alert("User email and password do not match");</script>';
            $error[] = 'User email and password do not much';
            header('Location: seller_login.php');
            exit();
        }
    } else {
        // Handle SQL statement preparation error
        echo "Error: " . mysqli_error($conn);
    }
}
