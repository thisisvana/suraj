<?php include('partials/header.php'); ?>
<?php include('partials/navbar.php'); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<section>
  <!-- <h1>Contact</h1> -->
  <div class="blog-container row">

      <div class="contact-info large-6 columns">
        <h1>Contact form</h1>
        <form action="process/email_process.php" method="post" class="form-container small-12 medium-12 large-12 columns">

          <p>Name</p>
          <input type="text" name="name" required/>
          <p>Email</p>
          <input type="email" name="email" required/>
          <p>Telephone</p>
          <input type="tel" name="telephone" />
          <p>Subject</p>
          <input type="text" name="subject" required/>
          <p>Message</p>
          <textarea name="message" required></textarea><br>
          <input class="btn" type="submit" name="submit" value="Submit" class="cta"/>
      </form>
      </div>
      <div class="contact-items large-6 columns">
        <img class="contact-item" src="img/suraj.jpg"/>
      </div>

  </div>

</section>


<?php include('partials/footer.php'); ?>
