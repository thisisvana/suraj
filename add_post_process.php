<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<div class="row">

<?php
	// require_once 'connection.php';
	if(ISSET($_POST['name'])){
		$post = addslashes($_POST['post']);
		$name = $_POST['name'];
		$author = $_POST['author'];
		$image = $_POST['image'];
		$category = $_POST['category'];
    $dt = date('Y/m/d');
		$connection->query("INSERT INTO `blog_table` (`content`, `title`, `author`, `photo`, `category`,`date`) VALUES('$post', '$name', '$author', '$image', '$category', '$dt')") or die(mysqli_error());
	}
?>
<?php
	if(ISSET($_POST['res'])){
		$q_post = $connection->query("SELECT * FROM `blog_table` ORDER BY `id` DESC") or die(mysqli_error($connection));
		while($f_post  = $q_post->fetch_array()){
?>
		<div class = "large-8 column content" style = "word-wrap:break-word; background-color:#fff; padding:20px;">
			<img style="width:50%;" src="<?php echo $f_post['photo'];?>"/>
			<?php echo '<h4 class = "text-danger">'.$f_post['title'].'</h4>';?>
			<hr style = "border-top:1px solid #000;"/>
			<?php echo $f_post['content'];?><br><br style = "clear:both;"/><br>
			<p>By:</p>
			<?php echo '<h4 class = "text-danger">'.$f_post['author'].'</h4>';?>
			<p>Category:</p>
			<?php echo '<h4 class = "text-danger">'.$f_post['category'].'</h4>';?>


		</div>
		<br style = "clear:both;"/>
		<br>
<?php
		}
	}
?>

</div>
