<?php
    session_start();
    if(!isset($_SESSION['username']) OR isset($_POST['logOut'])) {
        session_unset();
        session_destroy();
        header("location:login.php");
    }
?>
<?php require_once("includes/functions.php"); ?>
<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>

<div id="main" class="page row">
  <!-- <div id="navigation">
    &nbsp;
  </div> -->
  <div id="page" class="add-post">
    <h1>Main Menu</h1>
    <p>Welcome to the admin area, <strong><?php echo htmlentities($_SESSION["username"]); ?></strong></p>
    <ul class="admin-list">
      <li><a href="manage_content.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage Website Content</a></li>
      <li><a href="manage_admins.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Manage Admin Users</a></li>
      <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
    </ul>
  </div>
</div>

<?php include("includes/layouts/footer.php"); ?>
