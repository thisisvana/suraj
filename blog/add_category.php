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

<!DOCTYPE html>
<html>
    <head>
        <title>Add a Category</title>
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
     <h2>Add Category</h2>
     <p>
        <?php if(isset($error)){
            echo $error;
            } ?>
     </p>
     <div>
      <form action='' method='post'>
        <label for='name'>Name </label>
        <input type='text' name='name' />
        <input type='submit' value='Add Category' />
      </form>
      </div>
    </body>
</html>