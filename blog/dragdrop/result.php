<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"/>
		<meta charset = "UTF-8" name= "viewport" content = "width=device-width, initial-scale=1" />
	</head>
<body>
	<nav class = "navbar navbar-default">
		<div class = "container-fluid">
			<a class = "navbar-brand" href = "https://www.sourcecodeter.com">Sourcecodester</a>
		</div>
	</nav>
	<div class = "row">
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well" style = "z-index:99999;">
			<h3 class = "text-primary">Drag and Drop Image Upload with MySQLi</h3>
			<hr style = "border-top: 1px dotted #8c8b8b;"/>
			<a href = "index.php">Back</a>
			<table class = "table table-bordered table-hover">
				<thead>
					<tr>
						<th>Image Name</th>
						<th>Image</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$connection = new mysqli('localhost', 'root', '', 'suraj') or die(mysqli_error());
						$stmt= $connection->prepare("SELECT * FROM `photo`") or die(mysqli_error($connection));
						if($stmt->execute()){
							$result = $stmt->get_result();
						}
						while($fetch = $result->fetch_array()){
					?>
					<tr>
						<td><?php echo $fetch['name']?></td>
						<td><center><img src = "img/articles/<?php echo $fetch['name'];?>" height = "50px" width = "50px"/></center></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/upload.js"></script>
</html>
