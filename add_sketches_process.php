<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<div class="row">

<?php
	// require_once 'connection.php';
	if(ISSET($_POST['name'])){
		// $post = addslashes($_POST['post']);
		$name = $_POST['name'];

		$image = $_POST['image'];


		$connection->query("INSERT INTO `art` (`name`, `image`) VALUES('$name', '$image')") or die(mysqli_error());
	}
?>
<?php
	if(ISSET($_POST['res'])){
		$q_post = $connection->query("SELECT * FROM `art` ORDER BY `id` DESC") or die(mysqli_error($connection));
		while($f_post  = $q_post->fetch_array()){
?>
		<div class = "large-8 column content" style = "word-wrap:break-word; background-color:#fff; padding:20px;">
			<img style="width:50%;" src="<?php echo $f_post['image'];?>"/>
			<?php echo '<h4 class = "text-danger">'.$f_post['name'].'</h4>';?>
			


		</div>
		<br style = "clear:both;"/>
		<br>
<?php
		}
	}
?>

</div>
