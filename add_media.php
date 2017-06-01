<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/layouts/navbar.php"); ?>


    <div class="add-post row">
      <div class="add-post">

      <!-- <a href='manage_content.php'>Back</a> -->
        <h2>add file</h2>
        <form class="admin-form" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

          <input type="file" name="imageUploaded"><br>
          <!-- <label>Choose thumbnail
          <input type="file" name="imageUploaded2"></label><br> -->
          <!-- <input class="inp" type="text" name="name" id="title" placeholder="Name"><br> -->
          <input class="btn-admin" type="submit" name="submit" value="Upload">



        <?php

          if(isset($_POST['submit'])) {
            $targetDirectory = "img/uploads/";
            $targetFile = $targetDirectory . basename($_FILES['imageUploaded']['name']);
            // $targetFile2 = $targetDirectory . basename($_FILES['imageUploaded2']['name']);
            $uploadOk = true;
            // $name =  mysqli_real_escape_string($connection, $_POST['name']);

            $imageName = mysqli_real_escape_string($connection, $targetFile);
            // $imageName2 = mysqli_real_escape_string($connection, $targetFile2);
            $check = getimagesize($_FILES['imageUploaded']['tmp_name']);
            // $check2 = getimagesize($_FILES['imageUploaded2']['tmp_name']);

              if($check === false) {
                echo "<p>Not an image!</p>";
                $uploadOk = false;
              }
              if(file_exists($imageName)) {
                echo "<p>File exists";
                $uploadOk = false;
              }


              if ($_FILES["imageUploaded"]["size"] > 1000000000) {
                  echo "<p>Your image is too large.</p>";
                  $uploadOk = false;
              }

              if($uploadOk === false) {
                echo "<p>Image not uploaded</p>";
              }
              else {
                if(move_uploaded_file($_FILES['imageUploaded']['tmp_name'], $targetFile)) {
                  echo "<p>The File ". basename($_FILES['imageUploaded']['name']) . " has been uploaded.</p>";

                  $insert = "INSERT INTO photo (name) VALUES ('" . $imageName . "')";
                  $resultInsert = mysqli_query($connection, $insert);
                }
                else {
                  echo "<p>The File did not upload successfully</p>";
                }

             }
          }
          ?>
          <br>
          <p>Media Folder:</p>
          <select>

          <?php

              $sql = "SELECT * FROM photo";
              $result = mysqli_query($connection, $sql);

              if (mysqli_num_rows($result) > 0) {

                  while($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                  }

              }
          ?>
        </select>

    </form>
  </div>
</div>


<?php include("includes/layouts/footer.php"); ?>
