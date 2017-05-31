<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>


  <h1>Blog</h1>
  <div class="row">


<div class="blog-container">
    <?php
      $query = "SELECT * FROM blog_table ORDER BY id DESC";
      $result = mysqli_query($connection, $query);
      confirm_query($result);
      $totalNumberOfRows = mysqli_num_rows($result);
      $lim = 5;
      $numberOfPages = ceil($totalNumberOfRows/$lim);

      if(isset($_GET['page'])) {

          $start = ($_GET['page'] * $lim) - $lim;
          $query = "SELECT * FROM blog_table ORDER BY id DESC LIMIT $start, $lim";
          $queryResult = mysqli_query($connection, $query);
          $numberOfRows = mysqli_num_rows($queryResult);
      }

          $query = "SELECT *  FROM blog_table ORDER BY id DESC LIMIT 0, $lim";
          $queryResult = mysqli_query($connection, $query);
          $numberOfRows = mysqli_num_rows($queryResult);


      if($numberOfRows > 0) {

        while($row = mysqli_fetch_assoc($queryResult)) {

        ?>


  <div class="blog-items large-12 columns">
    <img class='blog-item' src="<?php echo $row['photo'];?>"/>
  </div>

   <div class="blog-info large-12 columns">


      <h2><?php echo $row['title'];?></h2>
      <p class='format-dt'><?php echo $row['date'];?>&nbsp;|&nbsp;<span class='author'>Author:&nbsp;<?php echo $row['author'];?></span></p>
      <p><strong>Category:<?php echo $row['category'];?></strong></p>
      <article><p><?php echo $row['content'];?></p></article>



        <a class='resp-sharing-button__link' href='https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io' target='_blank' aria-label='Share on Facebook'>
          <div class='resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large'>
              Share on Facebook
            </div>
        </a>

    </div>


<?php
    }
    if($numberOfPages > 1) {
        echo "<ul class='pagination-container' style='display:flex;justify-content:center;'>";
        for($i = 1; $i <= $numberOfPages; $i++) {
            echo "<a href='http://localhost/suraj/blog-page.php?page=$i'>";
                echo "<li style='color:#222;text-decoration:underline; padding:1rem;'>" . $i . "</li>";
            echo "</a>";
        }
        echo "</ul>";
    }
  }
?>


  </div>
  </div>

<?php include('partials/footer.php'); ?>
