    </main>
</div><!--container-->
    <footer class="site-footer">
        <nav class="site-nav">
                <?php
                    $args = array(
                        'theme_location' => 'footer',
			
                    );
                ?>
            
                <?php wp_nav_menu($args); ?>
               <a href="<?php echo bloginfo('atom_url'); ?>"><img class="rss-widget-icon" style="border:0" width="14" height="14" src="http://www.sofiascoutkar.se/wp/wp-includes/images/rss.png" alt="RSS"></a>
        </nav>
        <?php
        if ( is_active_sidebar( 'footer_1' ) ) : ?>
            <ul id="primary-footer-widget" class="primary-footer widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer_1' ); ?>
            </ul><!-- #primary-sidebar -->
        <?php endif;?>
        <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); echo " - "; _e('This site uses Cookies', 'sofiascoutkar');?> </p>
    
    </footer>



<?php wp_footer(); ?>
</body>
</html>