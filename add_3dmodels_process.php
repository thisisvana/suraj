<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<div class="page row">

<?php
	// require_once 'connection.php';
	if(ISSET($_POST['name'])){
		$post = addslashes($_POST['post']);
		$name = $_POST['name'];

		$image = $_POST['image'];


		$connection->query("INSERT INTO `models` (`description`, `name`, `image`) VALUES('$post', '$name', '$image')") or die(mysqli_error());
	}
?>
<?php
	if(ISSET($_POST['res'])){
		$q_post = $connection->query("SELECT * FROM `models` ORDER BY `id` DESC") or die(mysqli_error($connection));
		while($f_post  = $q_post->fetch_array()){
?>
		<div class = "large-8 column content" style = "word-wrap:break-word; background-color:#fff; padding:20px;">
			<img style="width:50%;" src="<?php echo $f_post['image'];?>"/>
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
