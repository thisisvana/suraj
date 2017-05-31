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
		$link = $_POST['link'];


		$connection->query("INSERT INTO compositions (`name`, `video`, `description`) VALUES('$name', '$link', '$post')") or die(mysqli_error());
	}
?>
<?php
	if(ISSET($_POST['res'])){
		$q_post = $connection->query("SELECT * FROM compositions ORDER BY `id` DESC") or die(mysqli_error($connection));
		while($f_post  = $q_post->fetch_array()){
?>
		<div class = "large-8 column content" style = "word-wrap:break-word; background-color:#fff; padding:20px;">
			<iframe width="100%" height="350" src="<?php echo $f_post['video'];?>" frameborder="0" allowfullscreen></iframe>
			<?php echo '<h4 class = "text-danger">'.$f_post['name'].'</h4>';?>
			<hr style = "border-top:1px solid #000;"/>
			<?php echo $f_post['description'];?><br><br style = "clear:both;"/><br>




		</div>
		<br style = "clear:both;"/>
		<br>
<?php
		}
	}
?>

</div>
