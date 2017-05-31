<?php include('../partials/blog_header.php'); ?>
<?php include('../partials/blog_navbar.php'); ?>
<?php
include_once('resources/init.php');
$posts = get_posts(null,$_GET['id']);
?>

<div class="blog-container large-8 column">

  <div class="blog-content">

     <?php
     foreach($posts as $post){

     ?>
     <h2><a href='blog_admin.php?id=<?php echo $post['post_id']; ?>' ><?php echo $post['title']; ?></a></h2>
     <p>
        Posted on <?php echo date('d-m-y h:i:s',strtotime($post['date_posted'])); ?><br>
        Category: <a class='blog-category' href='category.php?id=<?php echo $post['category_id']; ?>' ><?php echo $post['name']; ?></a>
     </p>
     <div><p><?php echo nl2br($post['contents']); ?></p></div>
     <menu class="post-options">
        <ul class="post-ctrl">
            <li><a class='btn' href='delete_post.php?id=<?php echo $post['post_id']; ?>' >Delete</a></li>
            <li><a class='btn' href='edit_post.php?id=<?php echo $post['post_id']; ?>' >Edit</a></li>
        </ul>
     </menu>
     <?php
     }
     ?>
    </div>
   </div>
  </div>
  </body>
</html>
