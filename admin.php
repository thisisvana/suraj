<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<div id="main">
  <!-- <div id="navigation">
    &nbsp;
  </div> -->
  <div id="page" class="page">
    <h2>Main Menu</h2>
    <p>Welcome to the admin area, <strong><?php echo htmlentities($_SESSION["username"]); ?></strong></p>
    <ul class="admin-list">
      <li><a href="manage_content.php">Manage Website Content</a></li>
      <li><a href="manage_admins.php">Manage Admin Users</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>

<?php include("includes/layouts/footer.php"); ?>
