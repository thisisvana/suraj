<?php
if(isset($_POST['submit'])){
    // CONNECT TO DATABASE
	include("dbconfig.php");

	if(!$dbconfig){
		echo "Connection Failed";
	}
	else {
		$title = mysqli_real_escape_string($dbconfig,$_POST['title']);
		$category = mysqli_real_escape_string($dbconfig,$_POST['category']);
		$thumbnail = mysqli_real_escape_string($dbconfig,$_POST['thumbnail']);
		$comment = mysqli_real_escape_string($dbconfig,$_POST['editor1']);

		$postQuery = "INSERT INTO blog_table (title, category, photo, content, date) VALUES('".$title."','".$category."','".$thumbnail."','".$comment."','".date("Y-m-d")."')";
		$result = mysqli_query($dbconfig, $postQuery);

		// if post successful
		if($result) {
			header('Location: dashboard.php');
		}
		else {
			echo "Problem with posting";
		}
	}
}
?>
