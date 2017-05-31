<?php
session_start();
if(!isset($_SESSION['login_user'])){
	header("Location: login.php");
}
else{
	$login_session=$_SESSION['login_user'];
	// CONNECT TO DATABASE
    include("dbconfig.php");
    if(!$dbconfig){
        echo "Connection Failed";
    }
    else {
	?>
	<!doctype html>
	<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Open Heart Reiki</title>
		<link rel="stylesheet" href="../css/app.css">
	</head>
	<body id="dashboard" class="cms">
		<div id="tabs">
			<div class="side-tabs medium-1 columns">
				<ul>
					<li><a href="#tabs-1">home</a></li>
					<li><a href="#tabs-2">media</a></li>
					<li><a href="#tabs-3">about page</a></li>
					<li><a href="#tabs-4">services page</a></li>
					<li><a href="#tabs-5">blog page</a></li>
					<li><a href="logout.php">log out</a></li>
				</ul>
			</div>
			<div class="tab-content medium-11 columns">
				<!-- HOME TAB -->
				<div id="tabs-1">
					<section>
						<h1>Welcome <?php echo $login_session;?></h1>
					</section>
					<!-- <section>
						<h2>My Recent Updates</h2>
					</section> -->
				</div>
				<!-- MEDIA -->
				<!-- <div id="tabs-2">
					<div class="medium-12 columns">
						<form action="file_Upload.php" class="dropzone" id="my-awesome-dropzone" method="post" enctype="multipart/form-data">
						</form>
					</div>
					<div class="medium-12 columns">
						<?php
						$files_query = "SELECT * FROM blog_table";
						$files_result = mysqli_query($dbconfig,$files_query);

						$files_count=mysqli_num_rows($files_result);
						if($files_count > 0){
							while($files_row = mysqli_fetch_assoc($files_result)){
								$fileName = $files_row["photo"];
								$uploaded = $files_row["date"];
								// file url (change)
								$url = "http://localhost/suraj/img/";
								echo '<div class="upload-preview medium-4 columns">';
								echo '<img src="../img/'.$fileName.'">';
								echo '<p class="medium-10 columns">uploaded on '.$uploaded.'</p>';
								echo '<a class="medium-2 columns"href="delete.php">delete</a>';
								echo '<button id="clip-btn" class="clip button expanded" data-clipboard-text="'.$url.$fileName.'">
										Copy URL to clipboard
										</button></div>';
							}
						}
						else {
							echo '<p>0 file uploaded</p>';
						}
						?> -->
					</div>
				</div>
				<!-- ABOUT PAGE -->
				<div id="tabs-3">
					<h2>about page</h2>
					<div>
						<?php
							$about_query = "SELECT * FROM about_table";
							$about_result = mysqli_query($dbconfig,$about_query);


							if (mysqli_num_rows($about_result) > 0){

								// echo blog table content
								while($about_row = mysqli_fetch_assoc($about_result)) {
									$about_id = $about_row["id"];
									// $about_title = $about_row["title"];
									$about_img = $about_row["file"];
									$about_text = $about_row["about"];
									// $about_btn = $about_row["button"];
									echo '<div class="medium-4 columns">';
									echo '<h3 class="medium-10 columns">section '.$about_id.'</h3>';
									echo '<h3 class="medium-2 columns"><a data-open="add-blog">edit</a></h3>';
									// echo '<h3>title: '.$about_title.'</h3>';
									echo '<textarea style="height: 250px; width: 100%; margin: 2rem auto;" name="content" id="area1"> '.$about_text.'</textarea></div>';
									// echo '<div class="edit-cta">'.$about_btn.'</div></div>';
								}
							}
							else {
								echo '<p>Please upload a post</p>';
							}
						?>
					</div>
					<!-- ADD BLOG MODAL BOX -->
					<div class="reveal" id="add-blog" data-reveal>
						<h2>write a new blog</h2>
						<!-- BLOG POST FORM -->
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<label>title</label>
							<input type="text" name="title" required>
							<label>categories</label>
							<input type="radio" name="category" value="blog" checked> blog
							<input type="radio" name="category" value="testimonial"> testimonial <br>
							<label>thumbnail image</label>
							<input type="text" name="thumbnail" placeholder="image url">
							<textarea name="editor1" required></textarea>
							<input type="submit" name="post-blog" value="post">
						</form>
						<?php
						// When Blog is submitted
						if(isset($_POST['post-blog'])){
							$title = mysqli_real_escape_string($dbconfig,$_POST['title']);
							$category = mysqli_real_escape_string($dbconfig,$_POST['category']);
							$thumbnail = mysqli_real_escape_string($dbconfig,$_POST['thumbnail']);
							$comment = mysqli_real_escape_string($dbconfig,$_POST['editor1']);
							// Check if title and comment post exists
							if(isset($_POST['title']) AND isset($_POST['editor1'])){
								$dbconfig->query("INSERT INTO blog_table (title, category, thumbnail, comment, uploaded) VALUES('".$title."','".$category."','".$thumbnail."','".$comment."','".date("Y-m-d")."')");
							}
						}
						?>
						<!-- MODAL CLOSE -->
						<button class="close-button" data-close aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				</div>
				<!-- SERVICES PAGE -->
				<div id="tabs-4">
					<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
					<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
				</div>
				<!-- BLOG PAGE -->
				<div id="tabs-5">
					<h2>blog page</h2>
					<div class="top-bar edit">
						<div class="top-bar-left">
							<ul class="menu">
								<li><a data-open="add-blog"><i class="fa fa-plus" aria-hidden="true"></i> add blog</a></li>
							</ul>
						</div>
						<div class="top-bar-right">
							<ul class="menu">
							</ul>
						</div>
					</div>
					<!-- BLOG TABLE -->
					<table class="hover stack">
						<thead>
							<tr>
								<th>id</th>
								<th>title</th>
								<th>categories</th>
								<th>date</th>
								<th>edit</th>
								<th>delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$blog_query = "SELECT * FROM blog_table";
								$blog_result = mysqli_query($dbconfig,$blog_query);

								// $blog_count=mysqli_num_rows($blog_result);
								if (mysqli_num_rows($blog_result) > 0){

								while($blog_row = mysqli_fetch_assoc($blog_result)) {
									$post_id = $blog_row["id"];
									$post_title = $blog_row["title"];
									$post_category = $blog_row["category"];
									$post_timg = $blog_row["photo"];
									$post_text = $blog_row["content"];
									$post_date = $blog_row["date"];

									echo '<td>'.$post_id.'</td>';
									echo '<td><a href="postDetail.php?id='.$post_id.'">'.$post_title.'</a></td>';
									echo '<td>'.$post_category.'</td><td>'.$post_date.'</td>';
									echo '<td><a data-open="edit-blog'.$post_id.'"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a></td>';
									echo '<td><a href="edit-delete-process.php?id='.$post_id.'" class="delete"><i class="fa fa-trash" aria-hidden="true"></i> delete</a></td></tr>';

									echo '<div class="reveal" id="edit-blog'.$post_id.'" data-reveal><h2>edit a blog</h2>';
									echo '<form action="edit-delete-process.php" method="get">';
									echo '<input class="hidden" type="text" name="id" value="'.$post_id.'">';
									echo '<label>title</label><input type="text" name="title" value="'.$post_title.'">';
									echo '<label>thumbnail image</label><input type="text" name="thumbnail" value="'.$post_timg.'">';
									echo '<textarea name="editor1">'.$post_text.'</textarea>';
									echo '<button type="submit" name="edit">edit</button></form></div>';
									}
							}
							else {
								echo '<p>Please upload a post</p>';
							}
							?>
							<!-- EDIT BLOG -->
							<div class="reveal" id="blog" data-reveal>
								<h2>write a new blog</h2>
								<!-- BLOG POST FORM -->
								<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
									<label>title</label>
									<input type="text" name="title" required>
									<label>categories</label>
									<input type="radio" name="category" value="simulations" checked>simulations
									<input type="radio" name="category" value="compositions" >compositions
									<input type="radio" name="category" value="3D models">3D models
									<input type="radio" name="category" value="art"> art <br>
									<label>image</label>
									<input type="text" name="thumbnail" placeholder="image url">
									<textarea name="editor1" required></textarea>
									<input type="submit" name="post-blog" value="post">
								</form>
							</div>
						</tbody>
					</table>
					<!-- ADD BLOG MODAL BOX -->
					<div class="reveal" id="add-blog" data-reveal>
						<h2>write a new blog</h2>
						<!-- BLOG POST FORM -->
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<label>title or name</label>
							<input type="text" name="title" required>
							<label>categories</label>
							<input type="radio" name="category" value="tip" checked> tips
							<input type="radio" name="category" value="testimonial"> testimonial <br>
							<label>thumbnail image</label>
							<input type="text" name="thumbnail" placeholder="image url">
							<textarea name="editor1" required></textarea>
							<input type="submit" name="post-blog" value="post">
						</form>
						<?php
						// When Blog is submitted
						if(isset($_POST['post-blog'])){
							$title = mysqli_real_escape_string($dbconfig,$_POST['title']);
							$category = mysqli_real_escape_string($dbconfig,$_POST['category']);
							$thumbnail = mysqli_real_escape_string($dbconfig,$_POST['thumbnail']);
							$comment = mysqli_real_escape_string($dbconfig,$_POST['editor1']);
							// Check if title and comment post exists
							if(isset($_POST['title']) AND isset($_POST['editor1'])){
								$dbconfig->query("INSERT INTO blog_table (title, category, photo, content, date) VALUES('".$title."','".$category."','".$thumbnail."','".$comment."','".date("Y-m-d")."')");
							}
						}
						?>
						<!-- MODAL CLOSE -->
						<button class="close-button" data-close aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		</div>

		<script src="../bower_components/jquery/dist/jquery.min.js"></script>
		<script src="../bower_components/what-input/what-input.js"></script>
		<script src="../bower_components/foundation-sites/dist/foundation.min.js"></script>
		<!-- JQUERY UI -->
		<script
		src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
		integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
		crossorigin="anonymous"></script>
		<!-- FONT AWESOME -->
		<script src="https://use.fontawesome.com/a2ca25c584.js"></script>
		<script src="../js/dropzone.js"></script>
		<!-- CKEDITOR -->
		<script src="../bower_components/ckeditor/ckeditor.js"></script>
		<!-- CLIPBOARD JS -->
		<script src="../bower_components/clipboard/dist/clipboard.min.js"></script>
		<script src="js/app.js"></script>

	</body>
	</html>
	<?php
	} // Database Connection
	mysqli_close($dbconfig);
} // SESSION
?>
