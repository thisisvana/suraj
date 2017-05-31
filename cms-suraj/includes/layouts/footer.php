    <div id="footer">Copyright <?php echo date("Y"); ?>, Suraj Vadulas</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</body>
</html>
<?php
  // Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
