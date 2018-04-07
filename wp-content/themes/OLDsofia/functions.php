<?php

function sofiascoutkar_wordPress_resources(){
	
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_script( 'menuFlex', get_stylesheet_directory_uri() . '/js/menuFlex.js');
	
	
}
add_action('wp_enqueue_scripts' , 'sofiascoutkar_wordPress_resources');

function sofiascoutkar_theme_setup() {
	/*
	--- Add theme support---
	* Tityels to pages
	* Custom Background
	* Custom Logo
	* HTML5
	* Feed Links
	*/
	//Tityels to pages
	add_theme_support( 'title-tag' );

	//Custom Background
	$defaults = array(
	    'default-color'          => '',
	    'default-image'          => get_template_directory_uri().'/images/bg-body.jpg', //UNCOMENT SHULD WORK ONLINE
	    'wp-head-callback'       => '_custom_background_cb',
	    'admin-head-callback'    => '',
	    'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );

	//Custom Logo
	add_theme_support( 'custom-logo', array(
	    'height'      => 76,
	    'width'       => 200,
	    'flex-height' => true,
	    'flex-width'  => true,
	    'header-text' => array( 'site-title', 'site-description' ),
	) );

	//HTML5
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	//Feed Links
	add_theme_support( 'automatic-feed-links' );
}

add_action('after_setup_theme', 'sofiascoutkar_theme_setup');


//Navigation Menus

function sofiascoutkar_register_my_menus() {
  register_nav_menus(
    array(
      	'primary' => __( 'Primary menu','sofiascoutkar'), 
		'footer' => __( 'Footer menu','sofiascoutkar'), 
		'quick'=> __('Quick menu','sofiascoutkar'), 
		'scoutlinks' => __( 'Scout menu','sofiascoutkar'), 
    )
  );
}
add_action( 'init', 'sofiascoutkar_register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function sofiascoutkar_widgets_init() {

	register_sidebar( array(
		'name'          => __('Home right sidebar','sofiascoutkar'),
		'id'            => 'home_right_1',
		'before_widget' => '<li>',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget side">',
		'after_title'   => '</h4>',
		
		) );
	register_sidebar( array(
		'name'          => __('Footer'),
		'id'            => 'footer_1',
		'before_widget' => '<li>',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget footer">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'sofiascoutkar_widgets_init' );

include_once("costom_post_types.php");


function sofiascoutkar_load_textdomain() {
  load_theme_textdomain( 'sofiascoutkar', get_template_directory().'/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable( $locale_file ) ) {
	    require_once( $locale_file );
	} 
}
add_action( 'after_setup_theme', 'sofiascoutkar_load_textdomain' );
add_filter('widget_text','do_shortcode');
?>