<?php
/**
* Template Name: Events Page
*/
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
	
}

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
$now = date("U",strtotime("-1 days"));
query_posts( array(
	'post_type'=>'events',
	'meta_key'=>'_event_start',
	'orderby' => 'meta_value_num',
	'order'=>'ASC',
	'posts_per_page' => -1,
	'meta_query'=> array(
		array(
			'key'=>'_event_start',
			'value' => $now,
			'compare' => '>'
			)
		)
	)
);

$months = array(
	'jan' => 31,
	'feb' => 28,
	'mar' => 31,
	'apr' => 30,
	'may' => 31,
	'jun' => 30,
	'jul' => 31,
	'aug' => 30,
	'sep' => 31,
	'Oct' => 30,
	'nov' => 31,
	'dec' => 30,
	);

/*start post*/
foreach ($months as $month => $days) {
	$date= date("M");
	if ($month == $date){
		for ($i=0; $i <= $days ; $i++) {
			//var_dump($i); 
		}
	}
}
if (have_posts()):

	while (have_posts()) : the_post();
	$group = get_post_meta($post->ID, '_event_group', true);
	?>
    	<article class="post event <?php echo $group; ?>">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <p class="group"><?php _e($group, 'sofiascoutkar'); ?></p>
            <?php								
			$dateStart = get_post_meta($post->ID, '_event_start', true);
			$dateEnd = get_post_meta($post->ID, '_event_end', true);
			$location = get_post_meta($post->ID, '_event_location', true);
			$start = date ( 'o-m-d', $dateStart );
			$start = "<b>".$start."</b>";
			$end = date ( 'o-m-d', $dateEnd );
			$end = "<b>".$end."</b>";
			$startTime = date ( 'o-m-d H:i', $dateStart );
			$startTime = "<b>".$startTime."</b>";
			$endTime = date ( 'o-m-d H:i', $dateEnd );
			$endTime = "<b>".$endTime."</b>";
			$startTid = date ( 'H:i', $dateStart );
			$startTid = "<b>".$startTid."</b>";
			$endTid = date ( 'H:i', $dateEnd );
			$endTid = "<b>".$endTid."</b>";
			if($start == $end){
				//en dag
				?>

					<p><?php
						printf( __('Will be held %1$s at %2$s between %3$s and %4$s', 'sofiascoutkar'), $start, $location, $startTid, $endTid); 
						
						?>
						</p>
				<?php
			}else{
				//more then one day
				?>
				<p>
				<?php
				printf( __( 'Will be between %1$s and %2$s at %3$s', 'sofiascoutkar' ), $startTime, $endTime, $location );
				?>
				</p>
				
				<?php
			}

			?>
            
            
            <p><small><?php _e('Last modified','sofiascoutkar')?>: <?php the_modified_date(); ?></small> </p>
        </article>
	<?php	
	endwhile;
	
	else :

		echo "<p>".__('No Events incoming','sofiascoutkar')."</p>";
	endif;
?></div><?php
/*slut med post*/
get_sidebar();

get_footer();

?>