<footer>
	<div>Kontakt vänster</div>
	<div>action center</div>
	<div><?php
	if (!empty(get_option( 'facebook' ))){
		?>
		<a href="<?=esc_attr( get_option( 'facebook' ) )?>"> facebook</a> 
		<?php
		
	}else{echo "string";}
		?>
		<a href="<?=esc_attr( get_option( 'instagram' ) )?>"> facebook</a> 
		<?php

		
		?></div>
	<div><?php the_kårnamn() ?></div>
	<div>Copy text höger</div>
</footer>

<?php
wp_footer();
?>
</body>
</html>