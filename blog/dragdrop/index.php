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
				<div class = "col-md-4">
					<form method = "POST" action = "image_upload.php" enctype = "multipart/form-data">	
						<label>Drag or click for image</label>
						<div id="uploader" onclick="$('#photo').click()">
						<img src=""/>
						</div>
						<input type="file" name="image"  id="photo"/>
						<div id = "file_name"></div>
						<button class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-download"></span> Save Image</button>
					</form>
				</div>	
				<a href= "result.php">List of image</a>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/upload.js"></script>
</html>