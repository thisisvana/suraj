<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>

<section>
    <div class="row">
      <?php
        $query = "SELECT * FROM compositions ORDER BY id DESC";
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        $numberOfRows = mysqli_num_rows($result);

        if($numberOfRows > 0) {

          while($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="video-container large-8 columns">

          <div class="video-items">

            <iframe width="100%" height="350" src="<?php echo $row['video'];?>" frameborder="0" allowfullscreen></iframe>
          </div>

        </div>
        <div class="vid-info large-4 columns">
          <h1><?php echo $row['name'];?></h1>
          <p><?php echo $row['description']; ?></p>

          <a class='resp-sharing-button__link' href='https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io' target='_blank' aria-label='Share on Facebook'>
            <div class='resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small'>
                Share on Facebook
              </div>
          </a>
        </div>
        <?php
          }
        }
        ?>
    </div>

</section>


<?php include('partials/footer.php'); ?>
