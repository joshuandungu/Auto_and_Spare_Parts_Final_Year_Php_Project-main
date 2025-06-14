<!DOCTYPE html>
<html lang="en">

<head>

    <script src="../assets/B/js/jquery2.js"></script>

    <script src="../assets/functio/A_function.js"></script>

</head>

<body class="gradl">

    <?php
    include 'includes/header.php';
    include 'includes/header_area_menu.php';

    ?>
    <p><br /></p>

    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-4"></div>
            <div class="col-md-4">


                <h1>
                    <center><b>Admin Account</b></center>
                </h1>
                <hr>
                <div id="e_msg"></div>
                <div id="e_msg2"></div>
                <form action="admin_login_v.php" method='POST'>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($_POST['email'])) {
                                                                                                echo $email;
                                                                                            } ?>" required />
                    <label for="email">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?php if (isset($_POST['password'])) {
                                                                                                            echo $password;
                                                                                                        } ?>"
                        required />

                    <hr>
                    <p><br /></p>

                    <a href="forgot.php" style="color:#333; list-style:none;">Forgotten Password</a> <br>
                    <hr>
                    <button class="btn btn-primary"> <a href="admin_register.php"
                            style="color:white; list-style:none;">I
                            don't have an Account</a> </button>
                    <button type="submit" name="submit" class="btn btn-lg btn-success" Placeholder="Login"
                        style="float:right;" Value="login">Login</button>
                    <!---
							<div><a href="Registration_C_S.php">Create a new account</a></div>
                            --->
                </form>

                <br>
                <br>
                <p>
                    <a href="../index.php">
                        <button class="btn btn-sm btn-success"> Back to Site </button>
                    </a>
                </p>


            </div>

            <div class="col-md-4"></div>

        </div>
    </div>

    <!------
        <div class="container-fluid ">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">

			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer Login Form</div>
					<div class="panel-body">
                        <div id="e_msg"></div>

						<form onsubmit="return false" id="login">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<label for="email">Password</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<p><br/></p>

							<a href="#" style="color:#333; list-style:none;">Forgotten Password</a>
                            <input type="submit" class="btn btn-success" style="float:right;" Value="Login" onclick="reloadPage();">

							<div><a href="Registration_C_S.php">Create a new account</a></div>
						</form>
				</div>

			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
    </div>
       ------------->

</body>
<?php include 'includes/footer.php'; ?>