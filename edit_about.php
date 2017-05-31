<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>

<?php

  if(ISSET($_GET['submit'])){
    $post = mysqli_real_escape_string($connection,$_GET['content']);
    $name = mysqli_real_escape_string($connection,$_GET['file']);

    $updateQuery = "UPDATE about_table SET about='$post', name='$name'";
    $result = mysqli_query($connection, $updateQuery);

    // if delete successful
    if($result) {
      // send to data display page
      echo "<script>alert('Update successful')</script>";
    }
    else {
      echo "Problem with the update";
    }
  }
?>
  <div class="add-post row">
      <a href='manage_content.php'>Back</a>

        <h2>Edit About</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="admin-form">
            <?php

                $sql = "SELECT * FROM about_table";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<textarea style='height: 250px; width: 100%; margin: 2rem auto;' name='content' id='area1'>" . $row['about'] . "</textarea>";
                        echo "<p>Resume:</p><input tupe='text' name='file' value='" . $row['name'] . "'></input>";
                    }

                }
            ?>
            <br><br>
            <input type="submit" name="submit" value="Publish" class="btn-admin" />
        </form>

    </div>

<?php include("includes/layouts/footer.php"); ?>
