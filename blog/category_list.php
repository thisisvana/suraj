<?php include('../partials/blog_header.php'); ?>
<?php include('../partials/blog_navbar.php'); ?>
<?php
include_once('resources/init.php');
?>

<div class="blog-container large-10 column">

 <div class="blog-content">

	 <h2>Categories</h2>
     <?php
     foreach(get_categories() as $category){
     ?>
      <p><a class='blog-category' href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a> <br>
      <a class="btn" href="delete_category.php?id=<?php echo $category['id'];?>">Delete</a></p>
     <?php
     }
     ?>
   </div>
  </div>
  </div>
  </body>
</html>
