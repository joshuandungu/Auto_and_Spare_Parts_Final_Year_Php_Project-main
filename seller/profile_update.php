<?php
require_once "db/db.php";
session_start();
$update_id = $_SESSION['uid'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	$vendor_name = mysqli_real_escape_string($con, $_POST["vendor_name"]);
	$f_name = mysqli_real_escape_string($con, $_POST["f_name"]);
	$l_name = mysqli_real_escape_string($con, $_POST["l_name"]);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$address1 = mysqli_real_escape_string($con, $_POST['address1']);
	$address2 = mysqli_real_escape_string($con, $_POST['address2']);
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if (
		empty($f_name) || empty($l_name) || empty($email) ||
		empty($mobile) || empty($address1) || empty($address2)
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

		$update = mysqli_query($con, "UPDATE vendor SET vendor_name = '$vendor_name', first_name = '$f_name', last_name = '$l_name', email = '$email', mobile = '$mobile', address1 = '$address1', address2 = '$address2' WHERE vendor_id = '$update_id' ");

		if (!empty($update)) {
			echo "
            <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Account info updated Successfully</b>
                </b><small><b>
                </b></small>
			</div>
            ";
			echo '<script>alert("Account updated successfully");</script>';
			header('location:profile.php');
			exit();
		} else {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Failed to update account info, Please try again</b>
			</div>
		";
			exit();
		}
	}
}