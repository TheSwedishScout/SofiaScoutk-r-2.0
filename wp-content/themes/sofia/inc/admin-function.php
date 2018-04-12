
<?php
function sofia_max_admin_page(){
	add_menu_page( "Theme settings", "Scouterna", "manage_options", "Scout_max", 'sofia_max_theme_create_page', '', 110 );
	add_submenu_page( 'Scout_max', 'Theme options', 'generaloptions', 'manage_options', 'scout_max_options', 'sofia_max_theme_create_page');
	//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, '' );
	add_action( 'admin_init', 'sofia_max_cusom_settings' );
}
add_action( 'admin_menu', 'sofia_max_admin_page' );

function sofia_max_cusom_settings(){
	register_setting( 'Scout_settings_group', 'facebook' );
	register_setting( 'Scout_settings_group', 'instagram' );
	add_settings_section( 'sofia-max-social-media', 'Sociala medier', 'sofia_max_sociala_medier_options', 'Scout_max' );
	add_settings_field( 'facebook-link', 'facebook', 'sofia_max_facebook_link', 'Scout_max', 'sofia-max-social-media', array( 'for' => 'facebook', 'type'=>"text" ));
	add_settings_field( 'instagram-link', 'instagram', 'sofia_max_facebook_link', 'Scout_max', 'sofia-max-social-media', array( 'for' => 'instagram', 'type'=>"text" ));



}

function sofia_max_sociala_medier_options()
{
	echo "string";
}
function sofia_max_facebook_link($args){
	$info = esc_attr( get_option( $args['for'] ) );
	?>
	<input type="text" name="<?= $args['for'] ?>" placeholder="<?= $args['for'] ?> link" value="<?= $info; ?>">
	<?php
}


function sofia_max_theme_create_page(){
	?>
	<h1>Theme Options</h1>
	<?php settings_errors(); ?>
	<form method="POST" action="options.php">
		<?php
			settings_fields( 'Scout_settings_group' );
			do_settings_sections( "Scout_max" );
			submit_button();
		 ?>
		
	</form>
	<?php
}
?>