
<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>


  <div class="works row expanded">
    <a href="drawings.php">
      <div class="panel works-container top-left small-12 medium-6 large-6 column">
        <div class="front card box">
          <h1>Art</h1>
        </div>

        <div class="back top-left-back card box">
          <h4>Check out recent <br> drawings</h4>
        </div>
      </div>
    </a>
    <a href="models.php">
      <div class="panel works-container top-right small-12 medium-6 large-6 column">
        <div class="front card box">
          <h1>3D Models</h1>
        </div>
        <div class="back top-right-back card box">
          <h4>Check out recent <br> 3D models</h4>
        </div>
    </div>
  </a>
  </div>
  <div class="works row expanded">
    <a href="simulations.php">
      <div class="panel works-container bottom-left small-12 medium-6 large-6 column">
        <div class="front card box">
          <h1>Simulations</h1>
        </div>
        <div class="back bottom-left-back card box">
          <h4>Check out recent <br>simulations</h4>
        </div>

      </div>
    </a>
    <a href="compositions.php">
      <div class="panel works-container bottom-right small-12 medium-6 large-6 column">
        <div class="front card box">
          <h1>Compositions</h1>
        </div>
        <div class="back bottom-right-back card box">
          <h4>Check out recent <br>compositions</h4>
        </div>
      </div>
    </a>
  </div>
  <div class="overlayDiv" >
      <div class="modalDiv">
        <h1>Did you have a chance to check out my latest works? </h1>
        <a href="simulations.php"><h3 class="btn">Click to see</h3>
          <!-- <h1><i class="fa fa-frown-o" aria-hidden="true"></i></h1> -->
      </div>
  </div>

  <script>
    $('body').one("mouseleave", function(e){
        $(".overlayDiv").fadeIn(500);
    });

    $(".overlayDiv").click(function() {
        $(this).fadeOut(500);
    });
  </script>

<?php include('partials/footer.php'); ?>
