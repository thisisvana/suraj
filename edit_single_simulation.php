<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<?php
  if(ISSET($_GET['submit'])){
    $id = $_GET['id'];
    $post = mysqli_real_escape_string($connection,$_GET['content']);
    $video = mysqli_real_escape_string($connection,$_GET['video']);

    $title = mysqli_real_escape_string($connection,$_GET['title']);

    $updateQuery = "UPDATE simulations SET description='$post', video='$video', name='$title' WHERE id=$id";
    $result = mysqli_query($connection, $updateQuery);

    // if delete successful
    if($result) {
      // send to data display page
      echo "<script>alert('Update successful')</script>";
    }
    else {
      echo "<script>alert('Problem with the update')</script>";
    }
  }
  else if(ISSET($_GET['delete'])){
    $deleteQuery = "DELETE FROM simulations WHERE id = '$_GET[id]'";
    $result = mysqli_query($connection, $deleteQuery);

    // if delete successful
    if($result) {
        echo "<script>alert('Delete successful')</script>";

    }
    else {
      echo "Could not delete";
    }
  }
 ?>


        <div class="add-post row">
          <a href="edit_simulations.php">Back</a>
            <h2>edit simulation</h2>
            <form class="form-admin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                  <?php

                      $id = $_GET['id'];
                      $sql = "SELECT * FROM simulations WHERE id = $id";
                      $result = mysqli_query($connection, $sql);

                      if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result)) {
                              echo "<label><span>ID:</span></label>";
                              echo "<input type='number' name='id' value='" . $row['id'] . "' readonly/><br></br>";
                              echo "<label><span>Title:</span></label>";
                              echo "<input type='text' name='title' value='" . $row['name'] . "' required /><br><br>";
                              echo "<label><span>Url link:</span></label>";
                              echo "<input type='text' name='video' value='" . $row['video'] . "' required /><br><br>";

                              echo "<label><span>Content:</span></label>";
                              echo "<textarea style='width:100%' name='content' id='area1'>" . $row['description'] . "</textarea>";
                          }
                      }

                ?>
                <div class="action-btn">
                  <input type="submit" name="submit" value="Update" class="btn-admin edit-blog-submit" />
                  <input type="submit" name="delete" value="Delete" class="btn-admin" id="del-btn" onclick="return confirm('Are you sure?');"/>

                </div>

        </form>

      </div>
      <?php include("includes/layouts/footer.php"); ?>
