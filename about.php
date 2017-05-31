<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>

<div class="about works row expanded">

    <div class="panel front-left about-container show-for-large large-6 column">
      <div class="front card box">
        <h1>Suraj Vadulas <br>VFX Artist</h1>
      </div>

      <div class="back card box about-left-back">
        <div class="resume">
          <h5>Read / Print / Save / Download</h5>
          <?php
          $query = "SELECT * FROM about_table";
          $result = mysqli_query($connection, $query);
          confirm_query($result);
          $numberOfRows = mysqli_num_rows($result);


          if($numberOfRows > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              $id = $row["id"];
              $file = $row["name"];
              $desc = $row["about"];


            echo "<a href='".$file."' target='_blank'><button type='button' class='btn' name='button'><h4>Resume</h4></button></a>";
          ?>
        </div>
      </div>
    </div>


    <div class="panel about-container small-12 medium-12 large-6 column">
      <!-- <div class="front card box">
        <h1>About <br> me</h1>
      </div> -->
      <div class="box about-right-back">
        <?php

            echo "<p class='about-desc'>".$desc."</p>";

            }
          }
        ?>

        <a href="contact.php"><button type='button' class='btn' name='button'><h4>Contact</h4></button></a>

      </div>
    </div>

  </div>

<!-- </div>
</div> -->

<?php include('partials/footer.php'); ?>
