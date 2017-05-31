<html>
<head>
	<style>
		img {
			width: 50%;
		}
	</style>
</head>
<body>
<section>
<?php
if(isset($_GET["id"])){
		include("dbconfig.php");
		if(!$dbconfig){
	        echo "Connection Failed";
	    }
	    else {
 			$blog_query = "SELECT * FROM blog_table WHERE id = '$_GET[id]'";
 			$blog_result = mysqli_query($dbconfig,$blog_query);
 			$blog_count=mysqli_num_rows($blog_result);
			if($blog_count > 0){

				while($blog_row = mysqli_fetch_assoc($blog_result)){
					$post_id = $blog_row["id"];
					$post_title = $blog_row["title"];
			  	$post_category = $blog_row["category"];
					$post_timg = $blog_row["photo"];
					$post_text = $blog_row["content"];
					$post_date = $blog_row["date"];

					echo '<h1>'.$post_title.'</h1>';
					echo '<h2>Post date: '.$post_date.'</h2>';
					echo '<h2>category: '.$post_category.'</h2>';
					echo '<img src="'.$post_timg.'">';
					echo '<div>'.$post_text.'</div>';
				}
			}
		}
	}
	else {
		echo "You do not belong here";
	}
?>
<a href="dashboard.php">back to dashboard</a>
</section>
</body>
</html>
