<?php
require_once "db/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    // Prepare SQL statement using prepared statement
    $sql = "SELECT * FROM admin WHERE email=? AND password=?";
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
            echo '<script>alert("Login successful");</script>';
            // Start session and store user ID
            session_start();
            // Assuming 'user_id' is the primary key co your 'users' table
            $_SESSION["admin_id"] = $row['id'];
            $_SESSION["name"] = $row['name'];
            // Redirect to index.php after successful login
            header('Location: dashboard.php');
            exit();
        } else {
            // Handle invalid credentials
            echo '<script>alert("User email and password do not match");</script>';
            echo '<script>window/location("admin_login.php");</script>';
        }
    } else {
        // Handle SQL statement preparation error
        echo "Error: " . mysqli_error($conn);
    }
}