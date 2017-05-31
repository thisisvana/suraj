<?php
	if (!isset($layout_context)) {
		$layout_context = "public";
	}
?>
<!DOCTYPE html>

		<html class="no-js" lang="en">
		    <head>
		        <meta charset="utf-8">
		        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		        <title>Suraj Vadulas <?php if ($layout_context == "admin") { echo "Admin"; } ?></title>
		        <meta name="description" content="Suraj's Website - VFX Artist">
		        <meta name="viewport" content="width=device-width, initial-scale=1">
		        <link rel="stylesheet" href="stylesheets/public.css">
						<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">

						</script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

						<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				    <script src="https://use.fontawesome.com/983b5cbe32.js"></script>
		        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>

		    </head>

		    <body>
					<div class="row expanded">
						<div class="logo large-3 column">
							<a href="../../index.php"><img src="images/suraj-logo.svg" alt="suraj vodulas vfx logo"></a>
						</div>
					</div>

			    <div id="header">
			      <h1>Welcome <?php if ($layout_context == "admin") { echo "Admin"; } ?></h1>
			    </div>
