<?php
session_start();

class sellerlogin
{

	private $con;

	function __construct()
	{
		require_once("db/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function loginAdmin($email, $password)
	{
		$qA = $this->con->query("SELECT * FROM admin WHERE email = '$email' and password='$password'  LIMIT 1");
		if ($qA->num_rows > 0) {
			$rowA = $qA->fetch_assoc();
			if (password_verify($password, $rowA['password'])) {
				$_SESSION['admin_name'] = $rowA['name'];
				$_SESSION['admin_id'] = $rowA['id'];
				return ['status' => 201, 'message' => 'Login Successful'];
			} else {
				return ['status' => 303, 'message' => 'Your Admin Account Password is wrong Please Try Again '];
			}
		} else {
			return ['status' => 303, 'message' => 'Account not created This Email'];
		}
	}
}

if (isset($_POST['admin_login'])) {
	extract($_POST);
	if (!empty($email) && !empty($password)) {
		$c = new sellerlogin();
		$result = $c->loginAdmin($email, $password);
		echo json_encode($result);
		exit();
	} else {
		echo json_encode(['status' => 303, 'message' => 'Empty fields']);
		exit();
	}
}
