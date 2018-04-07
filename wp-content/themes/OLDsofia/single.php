<?php

get_header();

/*start post*/
if (have_posts()){
	?><div class="main"><?php
	while (have_posts()) { the_post();
	
    get_template_part( 'post', 'part' );	//comon post	
	};
	get_template_part( 'html_includes/partials/social-share' );
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

	</div><?php // end of main div(the loop)
}else {
	echo "<p>".__('no content found','sofiascoutkar')."</p>"; 

}
/*slut med post*/
if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif;

get_footer();

?>