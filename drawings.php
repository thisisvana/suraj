
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

            // echo "<div class='item'><img src='img/".$img."' alt='drawings'>";
            // echo "<svg preserveAspectRatio='xMidYMid slice' viewBox='0 0 300 200'>";
            // echo "<defs>";
            // echo "<clipPath id='clip-0'><circle cx='0' cy='0' fill='#000' r='150px'></circle></clipPath>";
            // echo "</defs>";
            // echo "<text class='svg-text' dy='.3em' x='50%' y='50%'>".$name."</text>";
            // echo "<g clip-path='url(#clip-0)'>";
            // echo "<image height='100%' preserveAspectRatio='xMinYMin slice' width='100%' href='img/".$backimg."' data-fancybox='group'></image>";
            // echo "<text class='svg-masked-text' dy='.3em' x='50%' y='50%'>".$name."</text>";
            // echo "</g>";
            // echo "</svg>";
            // echo "</div>";


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
            <image height='100%'  src='<?php echo $row['image'];?>'></image>
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
<!-- <div class='options'>
  <button class='dark'></button>
  <button class='light'></button>
</div> -->
<?php include('partials/footer.php'); ?>
