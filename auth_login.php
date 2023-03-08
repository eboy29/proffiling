<?php 
session_start();
include 'connection.php';
$conn = openCon();


if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);

	$select = "SELECT * FROM admin WHERE Username='$name' && Password='$pass'" or die($conn->error);

	$result = mysqli_query($conn, $select);

	if(mysqli_num_rows($result) > 0) {

		$_SESSION['auth'] = true;

		$userdata = mysqli_fetch_array($result);
		$username = $userdata['Username'];

		$_SESSION['auth_user'] = ['Username'=>$username];	


        $_SESSION['message'] = "Logged in Successfully";
		header('location:../dashboard.php');
	}

	else {
		echo '<script>alert("Incorrect username or password")</script>';
	}

}


?>