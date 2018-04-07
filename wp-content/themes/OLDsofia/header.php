<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title();?></title>
        <meta name="viewport" content="width=device-width">
        
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php
    //Adds navigation to top class = menu-scout-container
    $args = array(
        'theme_location' => 'scoutlinks',
        'container'      => 'nav'
    );
    wp_nav_menu($args); 
?>
<div class="container">
	<!--site header-->
    <header class="site-header">
        <div class="siteName">
        <?php


        // No Custom Logo, just display the site's name
        if (!has_custom_logo()) {
            ?>
            
                <span class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></span>
                <span class="page-notation"><?php bloginfo('description'); ?></span>
            <?php
        }else{
            // Display the Custom Logo
            the_custom_logo();            
        }
        ?>
        
        </div>
        <div class="qick">
                
            <?php 
            $args = array(
                'theme_location' => 'quick'
            );
                wp_nav_menu($args);
                get_search_form(); 
            ?>
        </div>
        <a href="#" id="hamburger"><img src="<?php echo get_template_directory_uri(); ?>/images/burger.png" alt="meny knapp"/></a>
        <nav id="main-menu_scoutkar" class="site-nav">
            <?php
                $args = array(
                    'theme_location' => 'primary'
                );
                ?>
                    <div class="menu-serch"><?php get_search_form(); ?></div>
                <?php
                
                wp_nav_menu($args); 
            ?>
        </nav>
    </header><!--/site header-->
	<?php
	if ( shortcode_exists( 'wp-structuring-markup-breadcrumb' ) ) {
    	echo do_shortcode( '[wp-structuring-markup-breadcrumb id=breadcrumbs]' );
	}
	if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('
            <small id="breadcrumbs">','</small>
        ');
    }
	?>
	<main>
    <?php if ( ! isset( $content_width ) ) $content_width = 920; ?>	