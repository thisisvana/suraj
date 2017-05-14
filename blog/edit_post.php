<?php include('../partials/blog_header.php'); ?>
<?php include('../partials/blog_navbar.php'); ?>
<?php
include_once('resources/init.php');
$post = get_posts($_GET['id']);
if(isset($_POST['title'],$_POST['contents'],$_POST['category'])){

    $errors = array();

    $title      = trim($_POST['title']);
    $contents   = trim($_POST['contents']);

    if(empty($title)){
     $errors[] = 'You need to supply a title';
    }
    else if(strlen($title)>255){
     $errors[] = 'The title can not be longer than 255 characters';
    }

    if(empty($contents)){
     $errors[] = 'You need to supply some text';
    }
    if(!category_exists('id',$_POST['category'])){
    $errors[] = 'That category does not exists';
    }

    if(empty($errors)){
        edit_post($_GET['id'],$title,$contents,$_POST['category']);

        header("Location:blog_admin.php?id={$post[0]['post_id']}");
        die();
    }
}
?>
<?php include('../partials/blog_header.php'); ?>

<div class="blog-container large-10 column">

<div class="blog-content">

        <h2>Edit Post</h2>
        <?php
        if(isset($errors) && !empty($errors)){
            echo"<ul><li>",implode("</li><li>",$errors),"</li></ul>";
        }
        ?>
        <form class="post-form" action='' method='post'>

        <label for='title'><p>Title</p></label>
         <input class='text-input' type='text' name='title' value='<?php echo $post[0]['title']; ?>' />


         <label for='contents'>Content</label>
         <textarea name='contents' cols=20 rows=10><?php echo $post[0]['contents']; ?></textarea>

       <label for='category'>Category</label>
       <select name='category'>
        <?php
        foreach(get_categories() as $category){
         $selected = ($category['name'] == $post[0]['name']) ? 'selected' : '';
         ?>
         <option value='<?php echo $category['id'] ?>' <?php echo $selected; ?> ><?php echo $category['name'] ?></option>
         <?php
        }
        ?>
       </select>

     <p><input class="btn" type='submit' value='Add Post' /></p>
     </form>
    </div>
   </div>
  </div>
  </body>
</html>
