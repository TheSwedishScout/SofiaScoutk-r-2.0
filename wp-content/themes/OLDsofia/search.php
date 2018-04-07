<?php

get_header();
$postPrint = false;
$otherPrint = false;
$pagePrint = false;

/*start post*/
?><div class="main">
<?php
$i = 0;
	if (have_posts()){
		
		while (have_posts()) { the_post();
			//var_dump($post->post_type);
			if($post->post_type == "post"){
				if(!$postPrint){
					$postPrint = true;
					?>
					<h2><?php _e('posts', 'sofiascoutkar')?></h2>
					<?php
				}
			get_template_part( 'post', 'part' );	//comon post
		}
	};//end while
	rewind_posts();
	while (have_posts()) { the_post();
			//var_dump($post->post_type);
			if($post->post_type == "page"){
				if(!$pagePrint){
					$pagePrint = true;
					?>
					<h2><?php _e('Pages', 'sofiascoutkar')?></h2>
					<?php
				}
				//var_dump($post);
				get_template_part( 'post', 'part' );	//comon post
			}
	}
	rewind_posts();
	while (have_posts()) { the_post();
			//var_dump($post->post_type);
			if($post->post_type != "page" && $post->post_type != "post" ){
				if(!$otherPrint){
					$otherPrint = true;
					?>
					<h2><?php _e('Other', 'sofiascoutkar')?></h2>
					<?php
				}
				//var_dump($post);
				
		    	get_template_part( 'post', 'part' );	//comon post
			
			}
	}
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