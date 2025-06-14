<?php include 'includes/header.php';
require_once('db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header('location:seller_login.php');
} ?>
<?php include 'includes/header_area_menu.php'; ?>

<?php
if (isset($_GET['updateid'])) {
    $update_id = $_GET['updateid'];
}
$query = mysqli_query($con, "SELECT * FROM products where product_id = '$update_id'");
while ($row = mysqli_fetch_array($query)) {

?>

    <form action="update_product_v.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" name="update_id" value="<?php echo $row['product_id']; ?>">
            <div class="col-md-6">
                <label> Gas Name:</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    value="<?php echo $row['product_title']; ?>" />
            </div>
            <br />
            <div class="col-md-6">
                <div class="form-group">
                    <label>Brand Name</label>
                    <select class="form-control brand_list" id="brand_id" name="brand_id">
                        <option value="">Select Gas Brand </option>
                        <option value="pro">Pro Gas</option>
                        <option value="total">Total Gas</option>
                        <option value="lake">Lake Gas</option>
                        <option value="hash">HashGas</option>
                        <option value="men">Men Gas</option>
                    </select>
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gas Weight </label>
                    <select class="form-control" id="product_condition_id" name="gas_weight">
                        <option value="">Select Gas Weight </option>
                        <option value="6">6 Kg </option>
                        <option value="13">13 Kg </option>
                        <option value="25">25 Kg </option>
                        <option value="45">45 Kg </option>
                        <option value="100">100 Kg </option>
                    </select>
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <div class="form-group">
                    <label>Category Name</label>
                    <select class="form-control " id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        <option value="gas_cylinders">Gas Cylinders </option>
                        <option value="gas_accessories">Gas Accessories</option>
                    </select>
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product Qty</label>
                    <input type="number" id="product_qty" name="product_qty" class="form-control"
                        placeholder=" Enter Product Quantity">
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" id="product_price" name="product_price" class="form-control"
                        placeholder="Enter Product Price" value="<?php echo $row['product_price']; ?>">
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="product_desc" id="product_desc" class="form-control"
                        value="<?php echo $row['product_desc']; ?>">
                    </textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                        value="<?php echo $row['product_keywords']; ?>" />
                </div>
            </div>
            <hr>
            <br>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Image</label>
                    <img src="images/products/<?php echo $row['product_image'] ?>" height="100px" width="100px">
                    <input type="file" name="upload_image" accept="image/*" class="form-control" id="user_image" />
                    <span id="user_uploaded_image"></span>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                <button style="float: right;" type="submit" name="submit" value="submit" class="btn btn-success">Add
                    Product
                </button>
            </div>
    </form>
<?php } ?>

<?php include 'includes/footer.php';
?>
<!-- JS
========================================== -->
<!-- Plugins JS -->
<script src="../assets/js/plugins.js"></script>
<!-- Main JS -->
<script src="../assets/js/main.js"></script>