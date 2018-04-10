<footer>
	<div>Kontakt vänster</div>
	<div>action center</div>
	<div><?=
		esc_attr( get_option( 'facebook' ) )
		?></div>
	<div><?php the_kårnamn() ?></div>
	<div>Copy text höger</div>
</footer>

<?php
wp_footer();
?>
</body>
</html>