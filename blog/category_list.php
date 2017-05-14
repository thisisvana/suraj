<?php
include_once('resources/init.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Category List</title>
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
	 <h2>Categories</h2>
     <?php
     foreach(get_categories() as $category){
     ?>
      <p><a href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a> -
      <a href="delete_category.php?id=<?php echo $category['id'];?>">Delete</a></p> 
     <?php  
     }
     ?>
    </body>
</html>