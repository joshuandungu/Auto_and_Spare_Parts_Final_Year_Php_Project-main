<?php include 'includes/header.php';
require_once('db/db.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header('location:seller_login.php');
} ?>
<?php include 'includes/header_area_menu.php'; ?>

<form action="add_product_v.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <label> Gas Name:</label>
            <input type="text" name="product_title" id="product_title" class="form-control" />
        </div>
        <br />
        <div class="col-md-6">
            <div class="form-group">
                <label>Brand Name</label>
                <select class="form-control brand_list" id="brand_id" name="brand_id">
                    <?php
                    $query0 = mysqli_query($con, "SELECT * FROM brands");
                    while ($row = mysqli_fetch_array($query0)) {
                        $brand_id = $row['brand_id'];
                        $brand_title = $row['brand_title'];
                    ?>
                    <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>
        <br />
        <div class="col-md-6">
            <div class="form-group">
                <label>Gas Weight </label>
                <select class="form-control" id="product_condition_id" name="gas_weight">
                    <?php
                    $query1 = mysqli_query($con, "SELECT * FROM gas_weight");
                    while ($row = mysqli_fetch_array($query1)) {
                        $weight_id = $row['weight_id'];
                        $gas_weight = $row['gas_weight'];
                    ?>
                    <option value="<?php echo $gas_weight; ?>"><?php echo $gas_weight; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br />
        <div class="col-md-6">
            <div class="form-group">
                <label>Category Name</label>
                <select class="form-control " id="category_id" name="category_id">
                    <?php
                    $query2 = mysqli_query($con, "SELECT * FROM categories");
                    while ($row = mysqli_fetch_array($query2)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                    ?>
                    <option value="<?php echo $cat_title; ?>"><?php echo $cat_title; ?></option>
                    <?php } ?>
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
                <input type="" id="product_price" name="product_price" class="form-control"
                    placeholder="Enter Product Price">
            </div>
        </div>
        <br />
        <div class="col-md-6">
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="product_desc" id="product_desc" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" />
            </div>
        </div>
        <hr>
        <br>
        <div class="col-md-6">
            <div class="form-group">
                <label>Select Image</label>
                <input type="file" name="upload_image" accept="image/*" class="form-control" id="user_image" />
                <span id="user_uploaded_image"></span>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <button style="float: right;" type="submit" name="submit" value="submit" class="btn btn-success">Add Product
            </button>
        </div>
</form>

<?php include 'includes/footer.php';
?>
<!-- JS
========================================== -->
<!-- Plugins JS -->
<script src="../assets/js/plugins.js"></script>
<!-- Main JS -->
<script src="../assets/js/main.js"></script>