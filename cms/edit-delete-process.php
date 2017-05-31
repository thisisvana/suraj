<?php
	if(isset($_GET["edit"])) {
		include("dbconfig.php");
		if(!$dbconfig){
	        echo "Connection Failed";
	    }
	    else {
	    	$id = mysqli_real_escape_string($dbconfig,$_GET["id"]);
	    	$title = mysqli_real_escape_string($dbconfig,$_GET['title']);
			//$category = mysqli_real_escape_string($dbconfig,$_GET['category']);
			$thumbnail = mysqli_real_escape_string($dbconfig,$_GET['thumbnail']);
			$comment = mysqli_real_escape_string($dbconfig,$_GET['editor1']);

 			$updateQuery = "UPDATE blog_table SET title='$title', thumbnail='$thumbnail', comment='$comment' WHERE id=$id";
 			$result = mysqli_query($dbconfig, $updateQuery);

 			// if delete successful
 			if($result) {
 				// send to data display page
 				header('Location: dashboard.php');
 			}
 			else {
 				echo "Problem with the update";
 			}
		}
	}
	else if(isset($_GET["id"])){
		include("dbconfig.php");
		if(!$dbconfig){
	        echo "Connection Failed";
	    }
	    else {
 			$deleteQuery = "DELETE FROM blog_table WHERE id = '$_GET[id]'";
 			$result = mysqli_query($dbconfig, $deleteQuery);

 			// if delete successful
 			if($result) {
 				// send to data display page
 				header('Location: dashboard.php');
 			}
 			else {
 				echo "Could not delete";
 			}
		}
	}
	else {
		echo "You do not belong here";
	}
?>