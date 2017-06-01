
<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>


<div class='container'>
  <header>
    <h1>Art</h1>

  </header>
  <main>
    <div class='items'>
      <?php
        $query = "SELECT * FROM art";
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        $numberOfRows = mysqli_num_rows($result);

        if($numberOfRows > 0) {

          while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $name = $row["name"];
            $backimg = $row["image"];
            // $img = $row["thumbnail"];




      ?>


      <div class='item'>
        <!-- <img class="art-" src="img/milkyway1.png" alt="drawings">
        <svg preserveAspectRatio='xMidYMid slice' viewBox='0 0 300 200'>
          <defs>
            <clipPath id='clip-0'>
              <circle cx='0' cy='0' fill='#000' r='150px'></circle>
            </clipPath>
          </defs>
          <text class='svg-text' dy='.3em' x='50%' y='50%'>
            Beauty
          </text>
          <g clip-path='url(#clip-0)'> -->

              <image height="100" alt="artistic drawings" src='<?php echo $row['image'];?>'/><span><img class="big-art" alt="artistic sketches" src='<?php echo $row['image'];?>'/></span>


            <!-- <text class='svg-masked-text' dy='.3em' x='50%' y='50%'>
              Beauty
            </text>
          </g>
        </svg> -->
      </div>

    <?php
  }
}
    ?>
    </div>
  </main>
</div>


<?php include('partials/footer.php'); ?>
