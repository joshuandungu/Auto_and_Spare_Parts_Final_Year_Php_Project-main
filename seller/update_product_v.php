<?php
require_once('db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:seller_login.php");
}

?>

<?php
//session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST")
    $vendor_name = $_SESSION['vendor'];
$update_id = mysqli_real_escape_string($con, $POST['update_id']);
$product_name = mysqli_real_escape_string($con, $_POST["product_title"]);
$brand_name = mysqli_real_escape_string($con, $_POST["brand_id"]);
$gas_weight = mysqli_real_escape_string($con, $_POST["gas_weight"]);
$category = mysqli_real_escape_string($con, $_POST["category_id"]);
$qty = mysqli_real_escape_string($con, $_POST["product_qty"]);
$price = mysqli_real_escape_string($con, $_POST["product_price"]);
$desc = mysqli_real_escape_string($con, $_POST["product_desc"]);
$keyw = mysqli_real_escape_string($con, $_POST["product_keywords"]);

$image = $_FILES['upload_image']; // Update to match form field name
$tmp = $image['tmp_name'];
// Check if a file is selected
if (!empty($image['name'])) {
    // Proceed with file upload
    $newimage = mt_rand(1000000, 9999999) . '_' . basename($image['name']);
    $upload_dir = 'images/products/';
    $target_path = $upload_dir . $newimage;
    if (move_uploaded_file($tmp, $target_path)) {

        $sql = mysqli_query($con, "UPDATE products SET 
        `vendor_name` = '$vendor_name
,        `product_cat` = '$product_id',
         `product_brand` = '$brand_name',
          `product_title`= '$product_name' 
          `product_price` = '$price', 
          `product_qty` = '$qty',
           `product_desc` = '$desc',
            `product_image` = '$newimage',
            `product_keywords`= '$keyw', 
            `gas_weight` = '$gas_weight'
            WHERE product_id = '$update_id' 
            ");

        if ($sql == true) {
            echo '<script>alert("Product updated successfully");</script>';
            header('location: product.php');
        } else {
            echo '<script>alert("Failed to create product please try again");</script>';
            header('location: add_product.php');
        }
    }
}

?>