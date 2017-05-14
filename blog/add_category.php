<?php include('../partials/blog_header.php'); ?>
<?php include('../partials/blog_navbar.php'); ?>
<?php
include_once('resources/init.php');
if(isset($_POST['name'])){
    $name = trim($_POST['name']);

    if(empty($name)){
        $error = 'You must submit the category name';
    }
    else if(category_exists('name',$name)){
        $error = 'That category already exists';
    } else if(strlen($name)> 24){
        $error = 'The category name only be up to 24 characters only';
    }

    if(!isset($error)){
        add_category($name);
        header("Location:add_post.php");
        die();
    }
}

?>

<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Add a Category</title>
		<style>
            ul{list-style: none;}
            li{display: inline; margin-right: 20px;}
        </style>
    </head>
    <body> -->
<div class="blog-container large-10 column">

  <div class="blog-content">

	<!-- <nav>
        <ul>
            <li><a href='blog_admin.php' >Home</a></li>
            <li><a href='add_post.php' >Add a Post</a></li>
            <li><a href='add_category.php' >Add Category</a></li>
            <li><a href='category_list.php' >Category List</a></li>

        </ul>
     </nav>
     <h1>Suraj's Blog</h1> -->
     <h2>Add Category</h2>
     <p>
        <?php if(isset($error)){
            echo $error;
            } ?>
     </p>
     <div>
      <form class='cat-form' action='' method='post'>
        <label for='name'>Name </label>
        <input class='text-input' type='text' name='name' /><br>
        <input type='submit' class='btn' value='Add Category' />
      </form>
      </div>
     </div>
    </div>
   </div>
  </body>
</html>
