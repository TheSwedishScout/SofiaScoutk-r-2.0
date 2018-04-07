<?php
if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<ul id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</ul><!-- #primary-sidebar -->
<?php endif;?>