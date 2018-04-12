<?php
include 'inc/admin-function.php';
// Add Shortcode
function sofia_max_infobar( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'rubrik' => 'Rubrik',
			'img' => '',
			'color' =>"",
		),
		$atts,
		'Infobar'
	);

	/*kåd här*/
	
	/*KOLLA efter bilder i content och se till att de hamnar för sigkälva så de hamnar i höger */
	$tor = "<div class='clear-action-box'></div>
			<div class='action-box' style='background-color:{$atts['color']}'>
				<div>
					<div>
					<h3>{$atts['rubrik']}</h3>
					<p>{$content}</p>
					</div>
					<img src='{$atts['img']}'>
				</div>
			</div>";
	return $tor;

}
add_shortcode( 'Infobar', 'sofia_max_infobar' );

function sofia_max_additional_custom_styles() {

    /*Enqueue The Styles*/
    wp_enqueue_style( 'Null', get_template_directory_uri() . '/css/null.css' );
    wp_enqueue_style( 'SofiaScoutkår', get_template_directory_uri() . '/css/main.css' );

    wp_enqueue_script("jquery");
    wp_enqueue_script( 'SofiaScoutkårjs', get_template_directory_uri() . '/js/main.js' );
    

}

add_action( 'wp_enqueue_scripts', 'sofia_max_additional_custom_styles' );

/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*
* Add a menu location
*/
register_nav_menu('main', 'The Main menu' );
/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -**/
function sofia_max_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sid panel', 'sofiascoutkar' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets i denna sidpanel visas på alla sidor förutom start sidan', 'sofiascoutkar' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar(array(
    	'name' 			=> __('action', 'sofiascoutkar' ),
        'id'            => 'action',
        'description'   => __( 'Action knapp i under kår namn. Ska bara vara en knapp!', 'sofiascoutkar' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>', 
    ));
}
add_action( 'widgets_init', 'sofia_max_widgets_init' );





add_action( 'after_setup_theme', 'sofia_max_theme_setup' );
function sofia_max_theme_setup() {
	add_image_size( 'logo_size', 100, 100, false );  
	add_image_size( 'wallsize', 258 );  
	add_image_size( 'pageHeader', 1920, 250, true );  


    /* Add theme support for:
	 * automatic title tags
	 * featured images
	 * title-tags
	 * Costum logo
	 * costum header
	*/
	//add_theme_support( 'custom-background');// Enable admin to set custom background images in 'appearance > background'
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
	    'height'      => 100,
	    'width'       => 100,
	    'flex-height' => true,
	    'flex-width'  => true,
	    'header-text' => array( 'site-title', 'site-description' ),
	) );
	$defaults = array(
	    'video' => false,
	);
	add_theme_support( 'custom-header', $defaults );
}

function the_kårnamn()
{
	//$karnamn = str_replace("scoutkår", "", get_bloginfo( 'name' )); 
	$karnamn = explode("scoutkår", utf8_encode(strtolower(utf8_decode(get_bloginfo( 'name' )))));
	?>
	<a href="<?= get_home_url(); ?>" class="karnamn logo"><?= $karnamn[0]?> <?php
		if(has_custom_logo()){
			
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo_image = wp_get_attachment_image_src( $custom_logo_id , 'logo_size' );
			
			?><img src="<?= $logo_image[0] ?>"><?php
		}else{
			/*echo "Scoutemblem";*/
			?><img src="<?= get_template_directory_uri() . '/images/Scoutsymbolen_rgb.png' ?>"><?php
			

		}
	?> Scoutkår <?php //echo $karnamn[1]; ?></a><?php
}

?>