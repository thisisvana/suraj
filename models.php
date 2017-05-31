<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>

<section>
    <div class="row">
        <div class="slider-container large-12 columns">
            <div class="page-title">
                <h1>3D Models</h1>
            </div>
            <div class="slider-carousel">

                <a id="button-left"><i class="arrows fa fa-arrow-circle-o-left"  onClick="showSlides(-1)" aria-hidden="true"></i></a>
                <ul class="slider-list">
                  <?php
                    $query = "SELECT * FROM models";
                    $result = mysqli_query($connection, $query);
                    confirm_query($result);
                    $numberOfRows = mysqli_num_rows($result);

                    if($numberOfRows > 0) {

                      while($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <li class="slider-block">
                        <div class="slider-img">
                            <img src="<?php echo $row['image']; ?>" alt="image"/></div>
                        <article class="slider-article">
                            <p><i class="fa fa-quote-left" aria-hidden="true"></i>&nbsp;<?php echo $row['description']; ?>&nbsp;<i class="fa fa-quote-right" aria-hidden="true"></i></p>
                            <span class="slider-meta"><?php echo $row['name']; ?></span>
                        </article>
                    </li>

                    <?php
                      }
                    }
                    ?>
                </ul>
                <a id="button-right"><i class="arrows fa fa-arrow-circle-o-right" onClick="showSlides(1)" aria-hidden="true"></i></a>

            </div>
        </div>
    </div>
</section>


<?php include('partials/footer.php'); ?>
