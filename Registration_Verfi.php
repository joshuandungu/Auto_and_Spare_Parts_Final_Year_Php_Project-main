<?php
//session_start();
require_once "db/db.php";
if (isset($_POST["f_name"])) {

	$f_name = mysqli_real_escape_string($con, $_POST["f_name"]);
	$l_name = mysqli_real_escape_string($con, $_POST["l_name"]);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$repassword = mysqli_real_escape_string($con, $_POST['repassword']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$address1 = mysqli_real_escape_string($con, $_POST['address1']);
	$address2 = mysqli_real_escape_string($con, $_POST['address2']);
	$user_type = mysqli_real_escape_string($con, $_POST['user_type']);
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if (
		empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
		empty($mobile) || empty($address1) || empty($user_type)
	) {

		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if (!preg_match($name, $f_name)) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>This $f_name is not valid </b>
			</div>
		";
			exit();
		}
		if (!preg_match($name, $l_name)) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>This $l_name is not valid</b>
			</div> <br>
		";
			exit();
		}
		if (!preg_match($emailValidation, $email)) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid Email Address </b>
			</div>
		";
			exit();
		}
		if (strlen($password) < 9) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
			exit();
		}
		if (strlen($repassword) < 9) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
			exit();
		}
		if ($password != $repassword) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>password is not same</b>
			</div>
		";
			exit();
		}
		if (empty($user_type)) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Pleace select only one option : <i>Customer  OR  Seller </i></b>
			</div>
		";
			exit();
		}
		if (!preg_match($number, $mobile)) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
			exit();
		}
		if (!(strlen($mobile) == 10)) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b><i><strong>For Example : 0797 184 321 </strong></i>
			</div>
		";
			exit();
		}



		//existing email address in our database
		$customer = "SELECT * FROM user_info WHERE email = '$email' LIMIT 1";
		$seller = "SELECT * FROM seller_info WHERE email = '$email' LIMIT 1";
		$check_customer = mysqli_query($con, $customer);
		$check_seller = mysqli_query($con, $seller);
		$count_email_customer = mysqli_num_rows($check_customer);
		$count_email_seller = mysqli_num_rows($check_seller);


		if ($count_email_customer > 0) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				
				<b>Email Address is already available Try Another email address Er1</b>
			</div>
		";
			exit();
		} elseif ($count_email_seller > 0) {
			echo "
	<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		
		<b>Email Address is already available Try Another email address Er1</b>
	</div>
";
			exit();
		} else {


			$passwordm = SHA1($password);

			if ($user_type == 'customer') {

				$sqlAB = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`, `user_type`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$passwordm', '$mobile', '$address1', '$address2', '$user_type')";
				$run_query = mysqli_query($con, $sqlAB);

				if (!empty($run_query)) {
					echo "
            <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Your Customer Account is Register Successfully</b>
                </b><small><b>
				<i><a href='customer/customer_login.php'><blink> Click here to login as a customer  </blink></a></i>
				<i><a href='seller/seller_login.php'><blink>Click here to login as a seller </blink></a></i>
                </b></small>
			</div>
            ";
					exit();
				} else {
					echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b># Not Register Customer Account Connect to Admin</b>
			</div> ";
					exit();
				}
			}


			if ($user_type == 'seller') {

				$sql = "INSERT INTO `seller_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`, `user_type`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$passwordm', '$mobile', '$address1', '$address2', '$user_type')";

				$run_query = mysqli_query($con, $sql);



				if (!empty($run_query)) {
					$u_id = 0;
					$data = "SELECT * FROM user_info";
					$view = mysqli_query($con, $data);
					while ($_view = mysqli_fetch_assoc($view)) {
						$u_id = $_view['user_id'];
					}
					$m = $u_id;

					exit();
				}
			} else {
				echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Unable to register you as a seller.Please contact the adminfor more guidance</b>
			</div> ";
				exit();
			}
		}

		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Your Account is Not Register Please Connect To Admin</b>
			</div>
		";
		exit();
	}
}
