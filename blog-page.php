<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>
<?php
include_once('blog/resources/init.php');
//$posts = (isset($_GET['id'])) ? get_posts($_GET['id']) : get_posts();
$posts = get_posts((isset($_GET['id']))? $_GET['id'] : null);
?>

 <div class="blog-container large-10 column">

   <div class="blog-content">


     <?php
     foreach($posts as $post){
      ?>
     <h2><a href='blog_admin.php?id=<?php echo $post['post_id']; ?>' ><?php echo $post['title']; ?></a></h2>
     <p>
        Posted on <?php echo date('d-m-y h:i:s',strtotime($post['date_posted'])); ?><br>
        Category: <a class='blog-category' href='category.php?id=<?php echo $post['category_id']; ?>' ><?php echo $post['name']; ?></a>
     </p>
     <div class="blog-comment"><?php echo nl2br($post['contents']); ?></div>
     
     <?php
     }
     ?>
     </div>
     </div>
  <?php include('partials/footer.php'); ?>
