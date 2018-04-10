<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	$post = get_post();
 wp_head() ?>
</head>
<body>
	<header class="main-header" style="background-image: url(<?= the_post_thumbnail_url('pageHeader'); ?>)">
		<nav id="topMeny">
		  <?php wp_nav_menu('main'); 
			$post = get_post();
			if( is_page() ) { 
			        /* Get an array of Ancestors and Parents if they exist */
				$parents = get_post_ancestors( $post->ID );
			        /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
				$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
				/* Get the parent and set the $class with the page slug (post_name) */
			        $parent = get_post( $id );
				
			//var_dump($id);
		  ?>
		  <ul class="submenu">
			<?php
			wp_list_pages( array(
			    'title_li'    => '',
			    'child_of'    => $parent->ID,
			    
			) );
			}

			?>
		</ul>

		</nav>

		  <?php the_kårnamn(); ?>
	</header>
	<?php 
	
	?>