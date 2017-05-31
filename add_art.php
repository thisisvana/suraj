<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>

<?php

  if(isset($_POST['submit'])) {
    $targetDirectory = "img/";
    $targetFile = $targetDirectory . basename($_FILES['imageUploaded']['name']);
    $targetFile2 = $targetDirectory . basename($_FILES['imageUploaded2']['name']);
    $uploadOk = true;
    $name =  mysqli_real_escape_string($connection, $_POST['name']);

    $imageName = mysqli_real_escape_string($connection, $targetFile);
    $imageName2 = mysqli_real_escape_string($connection, $targetFile2);
    $check = getimagesize($_FILES['imageUploaded']['tmp_name']);
    $check2 = getimagesize($_FILES['imageUploaded2']['tmp_name']);

      if($check === false || $check2 === false) {
        echo "<script>alert('The file is not an image')</script>";
        $uploadOk = false;
      }
      if(file_exists($imageName) || file_exists($imageName2)) {
        echo "<script>alert('The File already exists')</script>";
        $uploadOk = false;
      }


      if ($_FILES["imageUploaded"]["size"] > 100000000 || $_FILES["imageUploaded2"]["size"] > 50000000) {
          echo "<script>alert('Image is too large')</script>";
          $uploadOk = false;
      }

      if($uploadOk === false) {
        echo "<script>alert('Image not uploaded')</script>";
      }
      else {
        if(move_uploaded_file($_FILES['imageUploaded']['tmp_name'], $targetFile) && move_uploaded_file($_FILES['imageUploaded2']['tmp_name'], $targetFile2)) {
          echo "<script>alert('The File ". basename($_FILES['imageUploaded']['name']) . " has been uploaded')</script>";

          $insert = "INSERT INTO art (image, thumbnail, name) VALUES ('" . $imageName . "', '" . $imageName2 . "', '".$name."')";
          $resultInsert = mysqli_query($connection, $insert);
        }
        else {
          echo "<script>alert('The File did not upload successfully')</script>";
        }

     }
  }
  if(isset($_GET["delete"])) {

      $delete = "DELETE FROM art WHERE id = '".$_GET["delete"]."'";
      $deleteResult = mysqli_query($connection, $delete);
      confirm_query($deleteResult);
  }
?>

    <div class="add-post row">
      <a href='manage_content.php'>Back</a>
        <h2>add image</h2>
        <form class="admin-form" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
          <label>Choose Image
          <input type="file" name="imageUploaded"></label><br>
          <label>Choose thumbnail
          <input type="file" name="imageUploaded2"></label><br>
          <input class="inp" type="text" name="name" id="title" placeholder="Name"><br>
          <input class="btn-admin" type="submit" name="submit" value="Upload">

        </form>
        <br>


    <div class="pack-form">
      <?php
        $query = "SELECT * FROM art ORDER BY id DESC";
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        $numberOfRows = mysqli_num_rows($result);
        $limit=5;
        if(isset($_GET["pagination"])){
           $start=($_GET["pagination"]*$limit)-$limit;
           $query="SELECT * FROM art ORDER BY id DESC LIMIT ".$start.",".$limit;
        }else{
           $query="SELECT * FROM art ORDER BY id DESC LIMIT 0,".$limit;
       }

        if($numberOfRows > 0) {
          echo "<table class='tab-admin'>";
          echo "<th>Image</th><th>Thumbnail</th><th>Name</th>";
          while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $imageSrc = $row["image"];
            $imageSrc2 = $row["thumbnail"];
            $name = $row["name"];


            echo "<tr>";
            echo "<td><img class='img-art' width=130 height=130 src='" . $imageSrc . "'/></td>";
            echo "<td><img class='thumb-art' width=100 height=100 src='" . $imageSrc2 . "'/></td>";
            echo "<td><h4>".$name."<h4></td>";
            echo "<td><a href='add_art.php?delete=". $id ."'/><h2>Delete</h2></a></td>";
            echo "</tr>";

          }
          echo "</table>";
        }


      ?>
    </div>


      </div>



<?php include("includes/layouts/footer.php"); ?>
