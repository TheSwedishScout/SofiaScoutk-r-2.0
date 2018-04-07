<?php

get_header();

/*start post*/
?><div class="main"><?php
	if (have_posts()){
		while (have_posts()) { the_post();

	/*
	get part template
	*/	
	get_template_part( 'post', 'part' );	//comon post
	};
	if(get_next_posts_link() || previous_posts_link()){
		?>

		<div class="nav-pages">
			<div class="nav-previous alignright"><?php next_posts_link( __('Older posts','sofiascoutkar') ); ?></div> 
			<div class="nav-next alignleft"><?php previous_posts_link( __('Newer posts','sofiascoutkar') ); ?></div>
		</div>
		<?php
	}	
}else {
	echo "<p>".__('no content found','sofiascoutkar')."</p>"; 
}
?>	</div><?php
// end of main div(the loop)
	

/*slut med post*/
get_sidebar();


get_footer();

?>