<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/layouts/navbar.php"); ?>

    <div class = "add-post page row">
      <!-- <a href='manage_content.php'>Back</a> -->
      <h2>add sketches</h2>

      <div class = "col-md-3"></div>
      <div class = "col-md-6 well">
        <hr style = "border-top:1px dotted #000;"/>
        <button class = "btn  btn-primary" id = "btn_post"><span><i class="fa fa-caret-down" aria-hidden="true"></i></span>&nbsp; Add Post</button>
        <button style = "display:none;" class = "btn  btn-danger" id = "btn_close"><span><i class="fa fa-caret-up" aria-hidden="true"></i></span>&nbsp; Close</button>
        <br><br>
        <div  style = "display:none;" id = "post_form" class = "col-md-12">
          <form action="add_sketches_process.php" method="post" enctype="multipart/form-data">

            <label for="">Choose image</label>
            <select id='image'>

            <?php

                $sql = "SELECT * FROM photo";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                    }

                }
            ?>
          </select><br><br>



            <label>Enter Name</label>
            <input type = "text" class = "form-control" placeholder = "Title" id = "name"/><br><br>


            <!-- <label>Description</label><br> -->
            <!-- <textarea name = "content" style = "resize:none; height: 15rem; width:100%;" id = "post"  class = "form-control" placeholder = "Enter your post here..."></textarea> -->
            <br>

            <button type = "button" name="submit" id = "add_post">Post</button>
          </form>
          <br /><br />
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
        if($('#name').val() == ""){
          alert('Please enter something first');
        }else{
          $('#post_form').slideUp();
          $('#btn_post').show();
          $('#btn_close').hide();
          // $post = $('#post').val();
          $name = $('#name').val();

          $image = $('#image').val();


          $.ajax({
            type: "POST",
            url: "add_sketches_process.php",
            data: {
              // post: $post,
              name: $name,

              image: $image

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
        url: 'add_sketches_process.php',
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
