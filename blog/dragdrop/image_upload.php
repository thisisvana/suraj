<?php
	$connection = new mysqli('localhost', 'root', '', 'suraj');
	if(ISSET($_POST['save'])){
		if($_FILES['image']['name'] == ""){
				echo '<script>alert("Please Select an Image")</script>';
				echo '<script>window.location = "index.php"</script>';
		}else{
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "img/articles/". $_FILES["image"]["name"]);
			$location = $_FILES["image"]["name"];
			$stmt = $connection->prepare("INSERT INTO `photo` (name) VALUES(?)") or die(mysqli_error($connection));
			$stmt->bind_param("s", $location);
			if($stmt->execute()){
				$stmt->close();
				$connection->close();
				echo '<script>alert("Successfully Upload Image")</script>';
				echo '<script>window.location = "index.php"</script>';
			}else{
				echo '<script>alert("Error")</script>';
			}
		}
	}
?>
