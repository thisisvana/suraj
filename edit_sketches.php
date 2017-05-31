<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>


        <div class="add-post row">
          <a href='manage_content.php'>Back</a>

            <h2>edit sketches</h2>
            <table class="large-12 columns">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                    </tr>
                </thead>
                    <?php
                          $sql = "SELECT * FROM art ORDER BY id DESC";
                          $result = mysqli_query($connection, $sql);

                          if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";

                                      echo "<td><a href='http://localhost/suraj/edit_single_sketch.php?id=" . $row['id'] . "'>" . $row['name'] . "<a/></td>";
                                      echo "<td><img style='width:50%' src='".$row['image']."'/></td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                  echo "</tr>";
                              }
                          }

                    ?>
                </table>
        </div>


    <?php include("includes/layouts/footer.php"); ?>
