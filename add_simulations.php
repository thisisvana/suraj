<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/layouts/navbar.php"); ?>

    <div class = "add-post row">
      <!-- <a href='manage_content.php'>Back</a> -->
      <h2>add simulations</h2>
      <div class = "col-md-3"></div>
      <div class = "col-md-6 well">
        <hr style = "border-top:1px dotted #000;"/>
        <button class = "btn  btn-primary" id = "btn_post"><span><i class="fa fa-caret-down" aria-hidden="true"></i></span>&nbsp; Add Post</button>
        <button style = "display:none;" class = "btn  btn-danger" id = "btn_close"><span><i class="fa fa-caret-up" aria-hidden="true"></i></span>&nbsp; Close</button>
        <br><br>
        <div  style = "display:none;" id = "post_form" class = "col-md-12">
          <form action="add_simulations_process.php" method="post" enctype="multipart/form-data">

            <label>Title</label>
            <input type = "text" class = "form-control" placeholder = "Title" id = "name"/><br><br>
            <label>Url link</label>
            <input type = "text" class = "form-control" placeholder = "Url link here..." id = "link"/><br><br>

            <label>Description</label><br>
            <textarea name = "content" style = "resize:none;" id = "post"  class = "form-control" placeholder = "Enter your description here..."></textarea>
            <br>

            <button type = "button" name="submit" id = "add_post">Post</button>
          </form>
          <br><br>
        </div>
        <div id = "result">

        </div>
      </div>
    </div>
    </body>
    <script type = "text/javascript">
    $(document).ready(function(){
    displayResult();
    /*	ADDING POST	*/
      $('#btn_post').on('click', function(){
        $('#post_form').slideDown();
        $('#btn_close').show();
        $(this).hide();
        $('#post').val('');
      });

      $('#btn_close').on('click', function(){
        $('#post_form').slideUp();
        $('#btn_post').show();
        $(this).hide();
      });

      $('#add_post').on('click', function(){
        if($('#name').val() == "" || $('#name').val() == ""){
          alert('Please enter something first');
        }else{
          $('#post_form').slideUp();
          $('#btn_post').show();
          $('#btn_close').hide();
          $post = $('#post').val();
          $name = $('#name').val();
          $link = $('#link').val();


          $.ajax({
            type: "POST",
            url: "add_simulations_process.php",
            data: {
              post: $post,
              name: $name,
              link: $link

            },
            success: function(){
              $('#name').val('');
              displayResult();
            }
          });
        }
      });
    /*****	*****/
    });

    function displayResult(){
      $.ajax({
        url: 'add_simulations_process.php',
        type: 'POST',
        async: false,
        data:{
          res: 1
        },
        success: function(response){
          $('#result').html(response);
        }
      });
    }

    </script>
<?php include("includes/layouts/footer.php"); ?>
