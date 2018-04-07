<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>
<body <?php echo 'class="' . join( ' ', str_replace("custom-background", "", get_body_class())) . '"'; ?>>
<header class="main-header" style="background-image: url(<?php header_image(); ?>);">
	
	<?php 
	the_kårnamn();
	?>
	
	<!--<button>action</button>-->
	
	<nav id="topMeny">
	  <?php wp_nav_menu('main'); ?>
	</nav>
</header>