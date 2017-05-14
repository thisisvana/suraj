<?php
include_once('resources/init.php');
//$posts = (isset($_GET['id'])) ? get_posts($_GET['id']) : get_posts();
$posts = get_posts((isset($_GET['id']))? $_GET['id'] : null); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <style>
            ul{list-style: none;}
            li{display: inline; margin-right: 20px;}
        </style>
    </head>
    <body>
     <nav>
        <ul>
            <li><a href='index.php' >Index</a></li>
            <li><a href='add_post.php' >Add a Post</a></li>
            <li><a href='add_category.php' >Add Category</a></li>
            <li><a href='category_list.php' >Category List</a></li>
            <!--li><a href='' ></a></li-->
        </ul>
     </nav>
     <h1>Yethroy's Simple Blog</h1>
     
     <?php
     foreach($posts as $post){
      ?>
     <h2><a href='index.php?id=<?php echo $post['post_id']; ?>' ><?php echo $post['title']; ?></a></h2>
     <p>
        Posted on <?php echo date('d-m-y h:i:s',strtotime($post['date_posted'])); ?>
        In <a href='category.php?id=<?php echo $post['category_id']; ?>' ><?php echo $post['name']; ?></a>
     </p>
     <div><?php echo nl2br($post['contents']); ?></div>
     <menu>
        <ul>
            <li><a href='delete_post.php?id=<?php echo $post['post_id']; ?>' >Delete This Post</a></li>
            <li><a href='edit_post.php?id=<?php echo $post['post_id']; ?>' >Edit This Post</a></li>
        </ul>
     </menu>
     <?php   
     }
     ?>
    </body>
</html>