<?php

require_once('db/db.php');
function add_cat($con)
{
    if (isset($_POST['add_cat'])) {

        $cat_title = mysqli_real_escape_string($con, $_POST["pro_cat"]);

        $sql = mysqli_query($con, "SELECT *  FROM categories WHERE cat_title ='$cat_title' ");
        if ($sql == true) {
            echo '<script>alert("Category already exist")</script>';
            header('location:category.php');
        } else {
            $cat_id = mt_rand(1000000, 9999999);
            $sql = "INSERT INTO `categories`(`cat_id` ,`cat_title`) VALUES ( '$cat_id', '$cat_title')";

            $run_query = mysqli_query($con, $sql);
            if ($run_query == true) {
                echo '<script>alert("Category created successfully");</script>';
                header('location:add_category.php');
            } else {
                echo '<script>alert("Failed to create product please try again");</script>';
                header('location:add_category.php');
            }
        }
    }
}

function add_brand($con)
{
    if (isset($_POST['add_brand']))

        $brand_title = mysqli_real_escape_string($con, $_POST["brand_title"]);

    $sql = mysqli_query($con, "SELECT *  FROM brands WHERE brand_title ='$brand_title' ");
    if ($sql == true) {
        echo '<script>alert("Brand already exist")</script>';
        header('location:brands.php');
    } else {

        $brand_id = mt_rand(1000000, 9999999);
        $sql = "INSERT INTO `brands`(`brand_id` ,`brand_title`) VALUES ( '$brand_id', '$brand_title')";

        $run_query = mysqli_query($con, $sql);
        if ($run_query == true) {
            echo '<script>alert("Barand created successfully");</script>';
            header('location:add_brand.php');
        } else {
            echo '<script>alert("Failed to create product brand please try again");</script>';
            header('location:add_brand.php');
        }
    }
}

add_cat($con);
add_brand($con);