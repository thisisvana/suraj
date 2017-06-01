<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>

<div class="add-post row" id="main-area">

 <div class="large-4 columns menu-admin add-post">
   <a href='admin.php'>Back</a>

    <ul><h2>Media</h2>
      <li>
          <a href="add_media.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;add</a>
      </li>
    </ul>
    <ul><h2>Blog</h2>
      <li>
        <a href="add_post.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;add</a>
      </li>
      <li>
          <a href="edit_post.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;edit</a>
      </li>
    </ul>

    <ul><h2>Artwork</h2>
      <li><a href="add_sketches.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;add</a></li>
      <li>
          <a href="edit_sketches.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;edit</a>
      </li>
    </ul>

    <ul><h2>3D Models</h2>
      <li>
          <a href="add_3dmodels.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;add</a>
      </li>
      <li>
          <a href="edit_models.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;edit</a>
      </li>
    </ul>
      <ul><h2>Simulations</h2>
        <li>
            <a href="add_simulations.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;add</a>
        </li>
        <li>
          <a href="edit_simulations.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;edit</a>
        </li>
      </ul>
      <ul><h2>Compositions</h2>
        <li>
            <a href="add_compositions.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;add</a>
        </li>
        <li>
          <a href="edit_compositions.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;edit</a>
        </li>
      </ul>
      <ul><h2>About Page</h2>
        <li>
          <a href="edit_about.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;edit</a>
        </li>
      </ul>
  </div>
  <div class="admin-bg">
    <h1>Suraj Vadulas' Content Management System</h1>
  </div>


</div>

<?php include("includes/layouts/footer.php"); ?>
