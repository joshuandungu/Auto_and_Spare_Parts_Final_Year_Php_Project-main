<?php
require_once('db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
  header("location:seller_login.php");
}

?>

<?php
//session_start();
$vendor_id = $_SESSION['uid'];
$vendor_name = $_SESSION['vendor'];
if ($_SERVER['REQUEST_METHOD'] == "POST")

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

    $sql = "INSERT INTO `products`(`vendor_id`, `vendor_name`,  `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`, `gas_weight`) VALUES ( '$vendor_id', '$vendor_name',  '$category', '$brand_name', '$product_name', '$price', '$qty', '$desc', '$newimage', '$keyw', '$gas_weight')";

    $run_query = mysqli_query($con, $sql);
    if ($run_query == true) {
      echo '<script>alert("Product created successfully");</script>';
      echo "<script>window.location.href = 'product.php'</script>";
    } else {
      echo '<script>alert("Failed to create product please try again");</script>';
      echo "<script>window.location.href = 'add-product.php'</script>";
    }
  }
}

?>