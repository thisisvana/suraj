<?php
	session_start();
	if(isset($_POST['usernamelogin']) AND isset($_POST['passwordlogin'])){
		// Connect to Database
		include("dbconfig.php");
		if(!$dbconfig){
			echo "Connection Failed";
		}
		else {
			// Recieved Login Information
			$username = mysqli_real_escape_string($dbconfig,$_POST['usernamelogin']);
			$password = mysqli_real_escape_string($dbconfig,$_POST['passwordlogin']);
			$sql_query = "SELECT id FROM sessions_table WHERE username='$username' and password='$password'";
			$result = mysqli_query($dbconfig,$sql_query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$count=mysqli_num_rows($result);
			// If username and password match and exist
			if($count == 1){
				$_SESSION['login_user'] = $username;
				header("location: dashboard.php");
			}
			else {
				$error = "Username or Password is invalid";
			}
		}
	}
?>
