<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>


        <div class="add-post row">
          <a href='manage_content.php'>Back</a>

            <h2>edit simulations</h2>
            <table class="large-12 columns">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Content</th>
                    </tr>
                </thead>
                    <?php
                          $sql = "SELECT * FROM compositions ORDER BY id DESC";
                          $result = mysqli_query($connection, $sql);

                          if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td><a href='http://localhost/suraj/edit_single_composition.php?id=" . $row['id'] . "'>" . $row['name'] . "<a/></td>";
                                    echo "<td>".$row['video']."</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                  echo "</tr>";
                              }
                          }

                    ?>
                </table>
        </div>


    <?php include("includes/layouts/footer.php"); ?>
