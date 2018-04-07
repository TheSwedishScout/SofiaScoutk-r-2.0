<?php

get_header();
?>


<div class="main">

<?php
/* is it a page */
//Get top parent id
if( is_page() ) { 
        /* Get an array of Ancestors and Parents if they exist */
	$parents = get_post_ancestors( $post->ID );
        /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	/* Get the parent and set the $class with the page slug (post_name) */
        $parent = get_post( $id );
	
	?>
	<ul class="submenu">
		<?php
		wp_list_pages( array(
		    'title_li'    => '',
		    'child_of'    => $parent->ID,
		    
		) );
		?>
	</ul>

<?php
}

/*start post*/
if (have_posts()):

	while (have_posts()) : the_post();
	?>
    	<article class="post">
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
             <?php
            $tags = wp_get_post_tags($post->ID);
			$html = '<div class="post_tags">';
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
						
				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
				$html .= "{$tag->name}</a>";
			}
			$html .= '</div>';
			echo $html;
			?>
			
            <small><?php _e('Last modified','sofiascoutkar')?>: <?php the_modified_date(); ?></small>
			<?php get_template_part( 'html_includes/partials/social-share' ); ?>
        
<?php
	/*Komentarer med allt vad dett inebär*/
	
	?>
	<ul class="commentlist">
		<?php
			//Gather comments for a specific page/post 
			$comments = get_comments(array(
				'post_id' => get_the_ID(),
				'status' => 'approve' //Change this to the type of comments to be displayed
			));

			//Display the list of comments
			wp_list_comments(array(
				'per_page' => 10, //Allow comment pagination
				'reverse_top_level' => false //Show the latest comments at the top of the list
			), $comments);
		?>
	</ul>
	<?php comment_form(); ?>
</article>
<?php
	
	endwhile;
	
	else :

		echo "<p>".__('no content found','sofiascoutkar')."</p>";
	endif;
?></div><?php
/*slut med post*/
get_sidebar();

get_footer();

?>