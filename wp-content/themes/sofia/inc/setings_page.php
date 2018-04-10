<h1>Theme Options</h1>
<form method="POST" action="">
	<?php
		settings_fields( 'Scout_settings_group' );
		do_settings_sections( "Scout_max" );
	 ?>
	
</form>