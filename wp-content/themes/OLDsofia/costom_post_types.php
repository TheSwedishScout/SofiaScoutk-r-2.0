<?php
add_action('init', 'sofiascoutkar_events_init');

function sofiascoutkar_events_init() {
	$args = array(
		'labels' => array(
			'name' => __('Events','sofiascoutkar'),
			'singular_name' => __('Event','sofiascoutkar'),
		),
		'public' => true,
		'rewrite' => array("slug" => "events"), 
		'supports' => array('thumbnail','editor','title','custom-fields')
	);

	register_post_type( 'events' , $args );
}




// Start

function sofiascoutkar_add_meta_boxes() {
	// needs to output the metabox
	add_meta_box('lecture_hero', 'Start', 'sofiascoutkar_hero_html', 'events' );
}

add_action('add_meta_boxes', 'sofiascoutkar_add_meta_boxes');

function sofiascoutkar_hero_html( $post ) {

	wp_nonce_field('hero_update_'.$post->ID, 'hero_update_input'); 
	if (get_post_meta($post->ID, '_event_start', true)){
		$start = str_replace(" ", "T", date( "o-m-d H:i", get_post_meta($post->ID, '_event_start', true)));
	}else{
	 	$start = ""; 
	};
	if (get_post_meta($post->ID, '_event_end', true)){
		$end = str_replace(" ", "T", date( "o-m-d H:i", get_post_meta($post->ID, '_event_end', true)));
	}else{
	 	$end = ""; 
	};
	if (get_post_meta($post->ID, '_event_location', true)){
		$location = get_post_meta($post->ID, '_event_location', true);
	}else{
	 	$location = ""; 
	};
	?>
	
	<p><strong><?php _e('Start time', 'sofiascoutkar'); ?>:</strong></p>
	<input type="datetime-local" value="<?php echo $start; ?>" name="event_start" style="width: 100%;"/>
	<p><strong><?php _e('End time', 'sofiascoutkar'); ?>:</strong></p>
	<input type="datetime-local" value="<?php echo $end; ?>" name="event_end" style="width: 100%;"/>
	<p><strong><?php _e('Location', 'sofiascoutkar'); ?>:</strong></p>
	<input type="text" value="<?php echo $location; ?>" name="event_location" style="width: 100%;"/>
	<p><strong><?php _e('For', 'sofiascoutkar');?>:</strong></p>
	<select name="event_group">
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Beavers'){ echo "selected";} ?> value="Beavers" ><?php _e("Beavers",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Cubs'){ echo "selected";} ?> value="Cubs" ><?php _e("Cubs",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Scouts'){ echo "selected";} ?> value="Scouts" ><?php _e("Scouts",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Explorer'){ echo "selected";} ?> value="Explorer" ><?php _e("Explorer",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Network'){ echo "selected";} ?> value="Network" ><?php _e("Network",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Rover'){ echo "selected";} ?> value="Rover" ><?php _e("Rover",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Leaders'){ echo "selected";} ?> value="Leaders" ><?php _e("Leaders",'sofiascoutkar') ?></option>
		<option <?php if (get_post_meta($post->ID, '_event_group', true) == 'Troop'){ echo "selected";} ?> value="Troop" ><?php _e("Troop",'sofiascoutkar') ?></option>
	</select>


<?php }

function sofiascoutkar_save_hero_data( $post_id )  {
	// do we have an valid nonce
	// do we have a nonce at all

	if( !isset($_POST['event_start']) || !wp_verify_nonce( $_POST['hero_update_input'], 'hero_update_'.$post_id ) ) {
		return $post_id;
	}

	$post_type_object = get_post_type_object( get_post_type( $post_id ) );

	// if the user has capability to save this post?
	if( !current_user_can( $post_type_object->cap->edit_post, $post_id ) ) {
		return $post_id;
	}

	$field = array('event_start', 'event_end', 'event_group', 'event_location');

	for ($i=0; $i < count($field); $i++) {

		// look at the data from the form and compare it to the old data
		$key = '_'.$field[$i];
		$old = get_post_meta( $post_id, $key, true );
		if($field[$i] == 'event_group' || $field[$i] == 'event_location'){
			$new = isset($_POST[$field[$i]]) ? $_POST[$field[$i]] : '';
		}else{
			$new = isset($_POST[$field[$i]]) ? $_POST[$field[$i]] : '';
			if (!empty($new)) {
				$new = strtotime($new);
				# code...
			}
		}
		// do we need to add a row?
		if( !$old && $new ) {
			add_post_meta( $post_id, $key, $new, true );
		} elseif( $old && $new && $old != $new ) {
			// do we nned to update a row?
			update_post_meta( $post_id, $key, $new, $old );
		} elseif( $old && !$new ) {
			// do we need to delete a row?
			delete_post_meta( $post_id, $key, $old );
		}

		
	}

}

add_action('save_post', 'sofiascoutkar_save_hero_data');
?>